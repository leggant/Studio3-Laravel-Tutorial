<nav class="navbar navbar-expand-md navbar-light navbar-laravel justify-content-between">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h1 class="nav-title">{{ config('app.name', 'To Do App') }}</h1>
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
            @auth
            <li class="nav-item">
                <a href="{{ route('todos.index') }}" class="nav-link h4 btn-link text-white ">Current Todos</a>
            </li>
            <li class="nav-item">
                    <a href="{{ route('todos.create') }}" class="nav-link h4 btn-link text-white">New Todo</a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('home')}}">
                        Dashboard
                    </a>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a href="{{route('login')}}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link">Register</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>