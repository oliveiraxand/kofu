<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', [
            'todos' => $todos,
        ]);
    }

    public function create()
    {
        return view('todos.create');
    }
    
    public function edit()
    {
        return view('todos.edit');
    }

    public function store(TodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success', 'Todo created successfully!');

        return to_route('todos.index');
        // return redirect()->route('todos.index');
    }
    
    public function show($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            session()->flash('error', 'Todo not found');
            return to_route('todos.index')->withErrors([
                'error' => 'Todo not found'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
    }
    
}
