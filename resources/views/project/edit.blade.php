@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)

                 <li>{{ $error }}</li>   
                    
                @endforeach
            </ul>
        </div>

    @endif

    <h1>Edit Project</h1>

    {{ Form::model($project, ['route' => ['project.update', $project], 'method' => 'put']) }}

    <div class="form-group">
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', old('title'), ['class' => 'form-control', 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'required']) }}
    </div>

    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection
