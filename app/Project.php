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

    public function addTask($body)
    {
       $task = $this->task()->create($body);
         return $task;
    }
}
