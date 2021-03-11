@extends('layouts.app')

@section('content')
    <section class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="jumbotron bg-transparent w-50">
            <h1 class="display-4 text-white">To Do App</h1>
            <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde quos aliquid saepe accusantium. Esse voluptate odio molestiae architecto inventore modi iure quisquam dolores corrupti, eligendi quibusdam maxime at voluptatum rem!.</p>
            <hr class="my-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Oolestiae unde!.</p>
                <p class="lead">
                    <a class="btn btn-success btn-lg bold d-flex align-items-center justify-content-center w-50" href="{{route('todos.create')}}" role="button">Add Your First To Do!
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox ml-auto" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <polyline points="9 11 12 14 20 6" />
  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
</svg>
                    </a>
                </p>
        </div>
    </section>
@endsection