<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
   use RefreshDatabase;


    /* public function an_unauthinticated_user_can_not_create_projects()
    {
       $this->expectException('Illuminate\Auth\AuthenticationException');

         somthing is wrong here
       $this->post('/project/1',[]);
    } */
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
          $response =  $this->get($project->path());
          $response->assertSee($project->title,$project->discription);

    }

}
