@extends('layouts.app')

<!-- @section('title')
To Dos App | Create New To Do
@endsection -->

@section('content')
    <section class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
        <div class="w-50 mb-3">
            <h1 class="display-4 text-white text-center">To Dos</h1>
        </div>
        <form action="{{route('todos.store')}}" method="post">
        @csrf
            <div class="input-group mb-3 w-100">
                <input type="text" name="title" placeholder="Enter New To Do Title" class="form-control form-control-lg">
            </div>
            <div class="input-group mb-3 w-100">
                <textarea name="details" class="form-control" cols="30" rows="10" placeholder="Enter Extra Details..."></textarea>
            </div>
            <div class="input-group mb-3 w-100 input-group-append">
                <button class="btn btn-success btn-lg btn-block" type="submit">Add To Do</button>
            </div>
        </form>
    </section>
@endsection