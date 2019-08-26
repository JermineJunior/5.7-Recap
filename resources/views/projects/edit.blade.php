@extends('layouts.app')

@section('content')
  <div class="row">
      <div class="col-md-9 offset-md-2">
            <div class="card">
                    <div class="card-header">
                        Edit Project
                    </div>
                    <div class="card-body">
                    <form method="POST" action="/project/{{$project->id}}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                            <input class="form-control" type="text" name="title" value="{{$project->title}}">
                            </div>
                            <div class="form-group">
                                <label for="discription">Discription</label>
                                <textarea  class="form-control" name="discription" rows="3" >{{$project->discription}} </textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Update </button>
                        </form>
                    </div>
                </div>
        </div>
      </div>
  </div>
@endsection
