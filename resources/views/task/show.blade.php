@extends('layouts.app')

@section('content')

    @include('flash::message')    

    <div class="row">

        <div class="col-sm-4 mb-5">

            <h1>{{ $task->title }}</h1>

            <a href="{{ route('task.edit', $task) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('task.destroy', $task) }}" class="btn btn-danger confirm">Delete</a>

        </div>

        <div class="col-sm-8" style="border-left: 2px solid #000000">
        
            <p>
                {{ $task->description }}
            </p>
        
        </div>

    </div>

    <a href="{{ route('project.show', $task->project) }}" class="btn btn-primary">Back to project</a>

@endsection
