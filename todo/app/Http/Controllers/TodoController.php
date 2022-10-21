<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view ('todos.index' , [
            'todos' => $todos,
            'is_completed' => 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        Todo::create([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        $request->session()->flash('alert-success', 'Todo Created Successfully');
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view ('todos.show' , ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view ('todos.edit' , ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request)
    {
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }

        $todo->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_completed'=>$request->is_completed
        ]);

        $request->session()->flash('alert-success', 'Todo Updated Successfully');
        return redirect()->route('todo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return redirect()->route('todo.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }


        $todo->delete();
        $request->session()->flash('alert-success', 'Todo Deleted Successfully');
        return redirect()->route('todo.index');
    }
}
