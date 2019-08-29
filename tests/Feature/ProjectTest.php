<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectTest extends TestCase
{
   use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project()
    {
       $this->signIn();//Given we have an authenticated user
        $project = create('App\Project');
        $this->post('/project',$project->toArray()); //when he hit this endpoint

        $this->assertDatabaseHas('projects',$project->toArray()); //then the database should contain a project
    }
    /** @test */
    public function a_user_can_view_all_projects()
    {
        $this->signIn();
          $project = create('App\Project');
          $response = $this->get('/project');
          $response->assertSee($project->title);
          //for a specifec project
          $response =  $this->get($project->path())
              ->assertSee($project->title,$project->discription);

    }
    /** @test */
    public function a_user_can_view_tasks_associated_with_a_project()
    {
        $this->signIn();//Given we have a user
            $project = create('App\Project');//When he creates a project and view it
            $task = create('App\Task',[
                'project_id'=> $project->id,
                'body'=> 'some body',
                'completed'  => 0
                ]);

            $response =  $this->get($project->path())//Then he should be able to read task associated with it
                ->assertSee($task->body);
    }
    /** @test */
    public function an_authintiacted_user_can_add_tasks_to_a_project()
    {

        $this->signIn();
        $project = create('App\Project');
        $response = $this->post('/project/{{$project->id}}/task',[
            'project_id'=> 1,
            'body'=> 'some body',
            'completed'  => 0
            ]);
            $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$project->task);

    }

}
