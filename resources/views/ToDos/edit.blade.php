@extends('layouts.app')

@section('title')
To Dos App | Edit To Do
@endsection

@section('content')
    <section class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
        <div class="w-50 mb-3">
            <h1 class="display-4 text-white text-center">Edit To Dos /get the title from the http params</h1>
        </div>
        <form action="" method="post">
        @csrf
            <div class="input-group mb-3 w-100">
                <input type="text" name="title" placeholder="Old Title Is?" class="form-control form-control-lg">
            </div>
            <div class="input-group mb-3 w-100">
                <textarea name="details" class="form-control" cols="30" rows="10" placeholder="Enter Extra Details..."></textarea>
            </div>
            <div class="input-group mb-3 w-100 input-group-append">
                <button class="btn btn-success btn-lg btn-block" type="submit">Save Changes</button>
            </div>
        </form>
    </section>
@endsection

<!-- @extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit Todo</h3>
    <form action="{{route('todos.update',$todo->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Todo Title</label>
            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ? : $todo->title }}" placeholder="Enter Title">
            @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('title')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="body">Todo Description</label>
            <textarea name="body" id="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Enter Todo Description">{{ old('body') ? : $todo->body }}</textarea>
            @if($errors->has('body')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('body')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection -->