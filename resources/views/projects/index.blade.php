@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-1">
            <h2 class="alert-heading">Projects:</h2>
        @foreach ($projects as $project)
            <div>
                    {{$project->id}}
            <a href="{{$project->path()}}" class="">
                  {{$project->title}}
                </a>

            </div>
        @endforeach
    </div>
  </div>
@endsection
