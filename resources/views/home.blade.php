@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-primary">You are logged in as {{auth()->user()->name}}</div><hr>

            </div>
            </div>

            <div class="card p-3 m-4">
                    <div class="lead">Activites:</div>

                    <div class="card-body">
                        No records in the database
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
