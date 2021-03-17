@extends('layouts.app')

@section('title')
To Dos App | Current To Do
@endsection

@section('content')
    <section class="to-do-item-show ml-auto mr-auto mt-5">
        <div>
            <h1 class="text-center item-title">{{ $toDo->title }}</h1>
        </div>
        <div class="mb-3">
            <h3 class="text-white text-center">{{ $toDo->details }}</h3>
        </div>
        <div class="mt-5 item-buttons">
            <a class="btn btn-lg btn-dark" id="edit-button-toggle">Edit This Item</a>
            <form action="{{ route('todos.delete', $toDo->id ) }}" method="post" id="delete-form">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-lg btn-dark" id="edit-button-toggle">
                Delete This Item
                </button>
            </form>
        </div>
        
        <form action="{{route('todos.store')}}" method="post" id="edit-form" class="mt-3">
        @csrf
            <div class="input-group mb-3 w-100">
                <input type="text" name="title" placeholder='{{ $toDo->title }}' class="form-control form-control-lg">
            </div>
            <div class="input-group mb-3 w-100">
                <textarea name="details" class="form-control" cols="30" rows="10" placeholder='{{ $toDo->details }}'></textarea>
            </div>
            <div class="input-group mb-3 w-100 input-group-append">
                <button class="btn btn-success btn-lg btn-block" type="submit">Save Changes</button>
            </div>
        </form>
    </section>
    <script defer>
        let form = document.getElementById("edit-form");
        let xdelete = document.getElementById("delete-form");
        document.onload = form.style.display = 'none'
        document.onload = xdelete.style.display = 'inline-block'
        toggleBtn = document.getElementById("edit-button-toggle");
        toggleBtn.addEventListener("click", function() {
            if(form.style.display === 'none') {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        })
        </script>
@endsection