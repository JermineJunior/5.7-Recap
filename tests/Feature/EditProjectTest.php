<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditProjectTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
   public function an_authinticated_user_can_create_a_project()
   {
       $this->signIn();//Given we have an authenticated user
       $project = create('App\Project');
       $this->post('/project',$project->toArray()); //when he hit this endpoint

       $this->assertDatabaseHas('projects',$project->toArray()); //then the database should contain a project
   }

   /** @test */
   public function an_authorized_user_can_delete_project()
   {
      $user = create('App\User');
      $this->actingAs($user);

      $project = create('App\Project',['user_id'=> $user->id]);

      $this->delete('/project/'.$project->id);
      $this->assertDatabaseMissing('projects',$project->toArray());

   }

   /** @test */
   public function an_authorized_user_can_update_project()
   {
    $user = create('App\User');
    $this->actingAs($user);

    $project = create('App\Project',['user_id'=> $user->id]);
    $response =  $this->patch('/project/'.$project->id)
        ->assertStatus(302);//wait what is this??
        

   }
}
