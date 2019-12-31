@extends('layouts.app')

@section('content')
  <div class="row flex">
    <div class="col-md-6 offset-md-1 one">
            <h2 class="display-4 p-6">Projects:</h2>

                @foreach ($projects as $project)
                   <div class="project">
                        <h2 class="project-title">
                          <a href="{{$project->path()}}">{{$project->title}}</a>
                        </h2>
                        <br>
                        <p class="discription">
                            {{$project->discription}}
                        </p>
                   </div>
                @endforeach


    </div>
    <div class="col-md-4  offset-md-1 m-2 two">
            <div class="card">
                    <div class="card-header">
                        Create A Project
                    </div>
                    <div class="card-body" id="form">
                        <form method="post" action="/project"   >
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input  class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label for="discription">Discription</label>
                                <textarea  class="form-control" name="discription" rows="3"></textarea>
                            </div>
                            <button class="btn btn-dark" type="submit">Post</button>
                        </form>
                    </div>
                </div>

             {{--   @include('partials._errors') --}}
        </div>
  </div>
@endsection
