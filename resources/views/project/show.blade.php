@extends('layouts.app')

@section('content')

    @include('flash::message')
    
    <h1>{{ $project->title }}</h1>

    <p>{!! $project->description !!}</p>

@endsection
