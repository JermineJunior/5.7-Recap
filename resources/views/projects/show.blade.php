@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-1 ">
     <div class="card p-4">
        <h1 class="display-4">
                {{$project->title}}
        </h1>
        <p class="lead">
            {{$project->discription}}
        </p>
    </div>
    </div>
</div>
@endsection
