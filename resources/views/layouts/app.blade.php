<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project management app laravel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
</head>
<body>
    
    <main class="container-fluid px-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="{{ route('project.index') }}">
                Project
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mainNav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('project.create') }}">Create project</a>
                    </li>
                </ul>
            </div>

        </nav>

        <div class="container" style="margin-top: 70px;margin-bottom: 20px;">

            @yield('content')

        </div>

    </main>

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>
