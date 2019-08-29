@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-1 ">
     <div class="card p-4 m-2">
         <div class="card-header">
            <h1 class="display-4">
                    {{$project->title}}
            </h1>
         </div>

        <div class="card-body">
            <p class="lead">
                    {{$project->discription}}
            </p>
        </div>
        <div class="card-footer">
            <a href="{{$project->id}}/edit" class="btn btn-dark  mr-3 " type="button">Edit Project</a>
        </div>
        @foreach ($project->task as $task)
        <form action="/task/{{$task->id}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-check">
                <input
                class="form-check-input"
                type="checkbox"
                name="completed"
                onchange="this.form.submit()"
                {{$task->completed ? 'checked' : ''}} >
            <label for="completed" class="form-check-label {{$task->completed ? 'is-complete' : ''}}">{{$task->body}}</label>
        </form>
          </div>
       @endforeach
    </div>

    </div>
    <div class="col-md-3 offset-md-1 mt-3 mr-1">
        <div class="box">
            <div class="card-header">
               <h3>Add a Task </h3>
            </div>
        <form method="POST" action="/project/{{$project->id}}/task">
                @csrf
                <div class="form-group">
                <input type="hidden" name="project_id" value="{{$project->id}}">
                    <textarea
                    class="form-control m-2"
                    name="body"
                    rows="3"
                    placeholder="write a task"
                    required>
                    </textarea>
                    <button type="submit" class="btn btn-primary ml-2 pl-2">Add Task</button>
                </div>
                </form>
        </div>
    </div>
  </div>
</div>
@endsection
