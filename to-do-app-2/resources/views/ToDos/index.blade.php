@extends('layouts.app')

@section('title')
To Dos App | Current To Dos
@endsection

@section('content')
<section class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
    <div class="w-50 mb-3">
        <h1 class="display-4 text-white text-center mb-3">My Current To Dos</h1>
        @foreach($todos as $todo)
        <div class="bg-white d-flex justify-content-center align-items-center pt-3 flex-column mb-4">
            <h3>{{$todo->title}}</h3>
            <p>{{$todo->details}}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection