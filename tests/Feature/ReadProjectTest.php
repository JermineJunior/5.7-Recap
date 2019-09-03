<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ProjectTest extends TestCase
{
   use RefreshDatabase;


    /** @test */
    public function an_unauthorized_user_cant_view_projects()
    {
        $this->signIn();
        $user = create('App\User');
        $project = create('App\Project');
        $response = $this->get('/project/'. $project->id)
            ->assertSee('This action is unauthorized.');

    }
   
    /** @test */
    public function an_unauthorized_user_cant_view_tasks_associated_with_a_project()
    {
            $this->signIn();//Given we have a user
            $user = create('App\User');
            $project = create('App\Project',['user_id'=> $user->id]);//When he creates a project and view it
            $task = create('App\Task',[
                'project_id'=> $project->id,
                'body'=> 'some body',
                'completed'  => 0
                ]);

            $response =  $this->get($project->path())//Then he should be able to read task associated with it
                ->assertSee('This action is unauthorized.');
    }
    /** @test */
    public function an_authorized_user_can_add_tasks_to_a_project()
    {
        $this->signIn();
        $user = create('App\User');
        $project = create('App\Project',['user_id'=> $user->id]);
        $project->addTask(['body' =>  'some body']);

        $this->assertDatabaseHas('tasks',['body' => 'some body']);
    }


}
