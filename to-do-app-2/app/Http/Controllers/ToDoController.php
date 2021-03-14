<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


use App\Models\ToDo;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoslist = ToDo::latest()->get();
        return view('ToDos.index')->with('todos', $todoslist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ToDos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:2|max:50',
            'details' => 'required|string|min:5|max:500'
        ]);

        $todo = ToDo::create([
            'title' => $request->title,
            'details' => $request->details,
            'completed' => 0
        ]);
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $toDos = ToDo::query();
        if($request->get('completed') && $toDos->where('id', $id)->exists()) {
            $toDo = $toDos->find($id);
            if($toDo->completed == 0){
                $toDo->completed = 1;
                $toDo->save();
            }
        }
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $toDo)
    {
        //
    }
}
