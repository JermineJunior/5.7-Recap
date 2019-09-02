<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
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
