@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 offset-md-1">
            <div class="project show">
                <div>
                    <h2 class="project-title">
                        <a href="{{$project->path()}}">{{$project->title}}</a>
                    </h2>
                     <br>
                        <p class="discription">
                            {{$project->discription}}
                        </p>
                </div>
                <div class="pt-4">
                    <p>Edit</p>
                </div>
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
    
@endsection
