<?php

namespace App\Http\Controllers;
use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {

      $project->addTask(request()->validate([
        'body' => ['required'],
    ]));

      return back();
    }
    public function update(Task $task)
    {
       $call = request()->has('completed') ? 'complete' : 'incomplete';

       $task->$call;
        return back();
    }
}
