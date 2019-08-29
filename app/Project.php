<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function path()
    {
        return 'project/'. $this->id;
    }

    public function addTask($task)
    {
        $task = $this->task()->create($task);
        return $task;
    }
}
