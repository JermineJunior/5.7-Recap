@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-1 ">
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
                <a href="{{$project->id}}/edit" class="btn btn-dark btn- ml-3 mr-3 " type="button">Edit Project</a>
                <form method="POST" action="/project/{{$project->id}}">
                   @method('DELETE')
                   @csrf
                   <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection
