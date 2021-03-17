<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Http\FormRequest;


use App\Models\ToDo;

class ToDoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
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
        $rules = [
            'title' => 'required|string|unique:usertodos,title|min:2|max:191',
            'details'  => 'required|string|min:5|max:1000',
        ];
        $messages = [
            'title.unique' => 'Todo title should be unique', //syntax: field_name.rule
        ];
        $request->validate($rules,$messages);
        // add rules array + messages array
        // add validation
        // $validated = $request->validate([
        //     'title' => 'required|string|min:2|max:50',
        //     'details' => 'required|string|min:5|max:500'
        // ]);

        // $todo = ToDo::create([
        //     'user_id' => Auth::id(),
        //     'title' => $request->title,
        //     'details' => $request->details,
        //     'completed' => 0
        // ]);

        $todo = new ToDo;
        $todo->title = $request->title;
        $todo->details = $request->details;
        $todo->user_id = Auth::id();
        $todo->save();
        return redirect()->route('todos.index')->with('status','Created a new Todo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function showitem($id)
    {
        $todo = ToDo::find($id)->firstOr(function () {
            return view(todo.show)->with(['$error' => "An Error Occured."]);
        });
        return view('toDos.show')->with('toDo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $toDo, $id)
    {
        $todo = ToDo::findOrFail($id);
        return view('todos.edit',[
            'todo' => $todo,
        ]);
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
        $rules = [
            'title' => "required|string|unique:todos,title,{$id}|min:2|max:191",
            'details'  => "required|string|min:5|max:1000",
        ];
        $messages = [
            'title.unique' => 'Todo title should be unique', //syntax: field_name.rule
        ];
        $request->validate($rules,$messages);

        $toDo = ToDo::findOrFail($id);
        $toDo->title = $request->title;
        $toDo->details = $request->details;
        $toDo->completed = $request->completed;
        // $completed = $request->get('completed');

        // if($toDos->where('id', $id)->exists()) {
        //     $toDo = $toDos->find($id);
        //     $toDo->completed = $completed;
        //     $toDo->save();
        // }
        return redirect()->route('todos.show', $id)->with('status', 'Updated this to do');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $toDo, $id)
    {
        $toDos = ToDo::query();
        if($toDos->where('id', $id)->exists()){
            $todo = $toDos->find($id);
            $todo->delete();
        }
        return redirect()->route('todos.index')->with('status','Deleted the selected Todo!');
    }
}
