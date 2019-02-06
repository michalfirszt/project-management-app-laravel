@extends('layouts.app')

@section('content')

    @if (count($projects) > 0)

    @include('flash::message')

    <h1>Project List</h1>
        
    <div class="row">

        @foreach ($projects as $project)
        
        <div class="col-md-4 col-sm-12" style="margin-bottom: 50px;">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $project->title }}
                    </h5>
                    <p class="card-text">{!! $project->description !!}</p>
                </div>
            </div>
        </div>

        @endforeach

    </div>

    @else
        
        <h1>No projects</h1>

    @endif

@endsection
