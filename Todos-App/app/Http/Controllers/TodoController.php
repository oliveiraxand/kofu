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

    public function store(TodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success', 'Tarefa criada com sucesso!');

        return to_route('todos.index');
        // return redirect()->route('todos.index');
    }
    
    public function show($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            session()->flash('error', 'Tarefa não encontrada');
            return to_route('todos.index')->withErrors([
                'error' => 'Tarefa não encontrada'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            session()->flash('error', 'Tarefa não encontrada');
            return to_route('todos.index')->withErrors([
                'error' => 'Tarefa não encontrada'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    
    }

    public function update(TodoRequest $request)
    {
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            session()->flash('error', 'Tarefa não encontrada');
            return to_route('todos.index')->withErrors([
                'error' => 'Tarefa não encontrada'
            ]);
        }

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed,
        ]);

        $request->session()->flash('alert-info', 'Tarefa atualizada com sucesso!');

        return to_route('todos.index');
    }

    public function iscompleted(Request $request)
    {
    $todoId = $request->input('todo_id');
    $todo = Todo::find($todoId);

    if (!$todo) {
        session()->flash('error', 'Tarefa não encontrada');
        return redirect()->route('todos.index')->withErrors([
            'error' => 'Tarefa não encontrada'
        ]);
    }

    $todo->update([
        'is_completed' => 1,
    ]);

    $request->session()->flash('alert-info', 'Tarefa Completa! Parabéns');

    return redirect()->route('todos.index');
    }

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            session()->flash('error', 'Tarefa não encontrada');
            return to_route('todos.index')->withErrors([
                'error' => 'Tarefa não encontrada'
            ]);
        }
        $todo->delete();
        session()->flash('alert-danger', 'Tarefa deletada com sucesso!');
        return to_route('todos.index');
    }

    
}