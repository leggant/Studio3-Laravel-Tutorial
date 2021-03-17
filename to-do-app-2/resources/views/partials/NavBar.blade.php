<nav class="navbar navbar-expand-md navbar-light navbar-laravel justify-content-between">
    <div class="container">
        <a class="navbar-brand" href="{{ route('todos.index') }}">
            <h1 class="nav-title text-white">{{ config('app.name', 'To Do App') }}</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                    <a class="dropdown-item nav-link h4 btn-link" href="{{route('home')}}">
                        Dashboard
                    </a>
                    <a class="dropdown-item nav-link h4 btn-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a href="{{route('login')}}" class="nav-link h4 btn-link text-white">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link h4 btn-link text-white">Register</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>