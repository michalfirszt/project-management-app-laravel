@extends('layouts.app')

@section('content')

    @include('flash::message')
    
    <div class="row">

        <div class="col-sm-4">

            <h1>{{ $project->title }}</h1>

            <button class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">
                Add task
            </button>
            <a href="{{ route('project.edit', $project) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('project.destroy', $project) }}" class="btn btn-danger confirm">Delete</a>

        </div>

        <div class="col-sm-8" style="border-left: 2px solid #000000">

            <p>{!! $project->description !!}</p>

        </div>

    </div>

    @if (count($project->tasks) > 0)
        
        <div>

        @foreach ($project->tasks as $task)

            <p>{{ $task->title }}</p>
        
        @endforeach

        </div>

    @endif

    <!-- modal -->

    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{ Form::open(['route' => ['task.store', $project], 'method' => 'post']) }}

                <div class="form-group">
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'required', 'placeholder' => 'Add task']) }}
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
        
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>

@endsection
