@extends('layouts.app')

@section('content')

    @include('flash::message')    

    <h1>{{ $task->title }}</h1>

    <a href="{{ route('project.show', $task->project) }}" class="btn btn-primary">Back to project</a>

@endsection
