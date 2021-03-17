@extends('layouts.app')

@section('title')
To Dos App | Current To Dos
@endsection

@section('content')
<section class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
    <div class="w-50 mb-3">
        <h1 class="display-4 text-white text-center mb-5">My Current To Dos</h1>
        @forelse($todos as $todo)
        <div class="bg-white d-flex ml-auto mb-4">
            <div class="p-2 d-flex align-items-center">
            @if($todo->completed == 0)
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4aaff4" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="9 6 15 12 9 18" />
                </svg>
            @else
                <form action="{{route('todos.delete', $todo->id ) }}" method="post">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-sm mr-auto ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="36" height="36" viewBox="0 0 24 24" stroke-width="2.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 12l5 5l10 -10" />
                    <path d="M2 12l5 5m5 -5l5 -5" />
                    </svg>
                </button>
                </form>
            @endif 
            </div>
            <div class="d-flex flex-column pt-3">
                <h3><a href="{{ route('todo.show', $todo->id) }}">{{ $todo->title }}</a></h3>
                <p>{{ $todo->details }}</p>
            </div>
            <div class="d-flex flex-column justify-content-center ml-auto mr-4">
            @if ($todo->completed == 0)
            <div class="d-flex">
                <form action="{{route('todos.update', $todo->id ) }}" method="POST" >
                    @method("PUT")
                    @csrf
                    <input type="text" hidden value="1" name="completed">
                    <button type="submit" class="btn btn-success btn-sm mr-auto ">Complete</button>
                </form>
                <form action="{{route('todos.delete', $todo->id ) }}" method="POST" >
                    @method("DELETE")
                    @csrf
                    <input type="text" hidden value="1" name="completed">
                    <button type="submit" class="btn btn-warning btn-sm ml-2">Delete</button>
                </form>
            </div>
            @endif 
            @if ($todo->completed == 1)
            <div class="d-flex">
                <form action="{{route('todos.update', $todo->id ) }}" method="POST" >
                    @method("PUT")
                    @csrf
                    <input type="text" hidden value="0" name="completed">
                    <button type="submit" class="btn btn-success btn-sm mr-auto ">Reset</button>
                </form>
                <form action="{{route('todos.delete', $todo->id ) }}" method="POST" >
                    @method("DELETE")
                    @csrf
                    <input type="text" hidden value="1" name="completed">
                    <button type="submit" class="btn btn-warning btn-sm ml-2">Delete</button>
                </form>
            </div>
            @endif
            </div>    
        </div>
        @empty
        <div class="d-flex flex-column justify-content-center">
            <h3 class="display-5 text-white text-center mt-3 mb-3">Nothing To Do....</h3>
            <a class="btn btn-success btn-lg bold d-flex align-items-center justify-content-center w-50 ml-auto mr-auto" href="{{route('todos.create')}}" role="button">Add Your First To Do!
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox ml-auto" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <polyline points="9 11 12 14 20 6" />
                        <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                    </svg>
            </a>
        </div>
        @endforelse
    </div>
</section>
@endsection