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
        
        <div class="row mt-5">

            <div class="col-sm-12">
                <h3>Tasks</h3>
            </div>

        @foreach ($project->tasks as $task)

            <div class="col-md-3 col-sm-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title {{ $task->closed ? 'closed' : ''}}">
                            {{ $task->title }}
                        </h5>
                        <a href="{{ route('task.show', $task) }}" class="card-link">Show</a>
                        <a href="{{ route('task.toggle', $task) }}" class="card-link">
                            {{ $task->closed ? 'Open' : 'Close' }}
                        </a>
                    </div>
                </div>
            </div>
        
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
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'required', 'placeholder' => 'Name']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('description', 'Description:') }}
                    {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'required', 'placeholder' => 'Description']) }}
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
