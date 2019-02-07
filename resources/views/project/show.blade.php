@extends('layouts.app')

@section('content')

    @include('flash::message')
    
    <h1>{{ $project->title }}</h1>

    <p>{!! $project->description !!}</p>

    <div class="row">
        <div class="col-sm-6">
            <a href="{{ route('project.edit', $project) }}" class="btn btn-primary">Edit</a>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('project.destroy', $project) }}" class="btn btn-danger confirm">Delete</a>
        </div>
    </div>

@endsection
