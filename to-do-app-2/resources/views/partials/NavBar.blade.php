<nav class="navbar navbar-expand-md navbar-light navbar-laravel justify-content-between">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h1>{{ config('app.name', 'To Do App') }}</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('pages.home') }}" class="nav-link h5 btn-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pages.about') }}" class="nav-link h5 btn-link">About</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('todos.index') }}" class="nav-link h4 btn-link">Current Todos</a>
            </li>
            <li class="nav-item">
                    <a href="{{ route('todos.create') }}" class="nav-link h4 btn-link">New Todo</a>
            </li>
        </ul>
    </div>
</nav>