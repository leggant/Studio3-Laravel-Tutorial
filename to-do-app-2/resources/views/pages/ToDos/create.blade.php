@extends('layouts.app')
@section('title')
To Dos App | Create New To Do
@endsection
@section('content')
    <section class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="w-50">
            <h1 class="display-4 text-white">To Dos</h1>
        </div>
        <form action="" method="post">
            <div class="input-group mb-3 w-100">
                <input type="text" name="title" placeholder="Enter New To Do...." class="form-control form-control-lg">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Add To Do</button>
                </div>
            </div>
        </form>
    </section>
@endsection