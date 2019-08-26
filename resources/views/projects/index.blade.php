@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-6 offset-md-1">
            <h2 class="display-4">Projects:</h2>
           <table class="table table-dark border">
               <thead>
                  <th>#</th>
                  <th>Title</th>
               </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                    <td>{{$project->id}}</td>
                    <td><a href="{{$project->path()}}">{{$project->title}}</a></td>
                    </tr>
                @endforeach
            </tbody>
           </table>

    </div>
    <div class="col-md-4  offset-md-1 m-2">
            <div class="card">
                    <div class="card-header">
                        Create A Project
                    </div>
                    <div class="card-body">
                        <form method="post" action="/project">
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
