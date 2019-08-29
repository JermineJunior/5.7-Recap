<?php

namespace App\Http\Controllers;
use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {
      $project->addTask(request()->all());

      return back();
    }
    public function update(Task $task)
    {
        $task->update([
            'completed'  => request()->has('completed')
        ]);

        return back();
    }
}
