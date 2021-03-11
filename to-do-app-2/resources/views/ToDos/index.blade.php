@extends('layouts.app')

@section('title')
To Dos App | Current To Dos
@endsection

@section('content')
<section class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
    <div class="w-50 mb-3">
        <h1 class="display-4 text-white text-center mb-3">My Current To Dos</h1>
        @foreach($todos as $todo)
        <div class="bg-white d-flex ml-auto mb-4">
            <div class="p-4">@if($todo->completed == 0)
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4aaff4" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="9 6 15 12 9 18" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4aaff4" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="9 11 12 14 20 6" />
                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                </svg>
                @endif 
            </div>
            <div class="d-flex flex-column pt-3">
                <h3>{{$todo->title}}</h3>
                <p>{{$todo->details}}</p>
            </div>
            <div class="d-flex flex-column justify-content-center ml-auto mr-4">
                @if ($todo->completed == 0)
                <form action="{{route('todos.update', $todo->id ) }}" method="POST" >
                @method("PUT")
                @csrf
                <input type="text" hidden value="1" name="completed">
                    <button type="submit" class="btn btn-success btn-sm mr-auto ">Complete</button>
                </form>    
                @else
                <form action="{{route('todos.update', $todo->id )}}" method="post">
                @method("PUT")
                @csrf
                <input type="text" hidden value="0" name="completed">
                    <button type="submit" class="btn btn-success btn-sm">Reset</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection