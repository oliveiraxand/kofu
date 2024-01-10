@extends('layouts.app')
@section('content')
@section('styles')
<style>
    #outer
    {
        width:100%;
        text-align: center;
    }
    .inner
    {
        display: inline-block;
    }
</style>
@endsection

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                      {{ Session::get('alert-success') }}
                    </div>
                    @endif

                    @if (Session::has('alert-info'))
                    <div class="alert alert-info" role="alert">
                      {{ Session::get('alert-info')  }}
                    </div>
                    @endif

                    @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                      {{ Session::get('error')  }}
                    </div>
                    @endif

                    @if (Session::has('alert-danger'))
                    <div class="alert alert-danger" role="alert">
                      {{ Session::get('alert-danger')  }}
                    </div>
                    @endif

                    <a class="inner btn btn-sm btn-success" href="{{ route('todos.create')}}">Criar Tarefa</a>
                    @if (count($todos)  > 0)
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Completa</th>
                            <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>{{ $todo->title }} </td>
                                    <td>{{ $todo->description }} </td>
                                    <td>
                                    @if ($todo->is_completed == 1)
                                        <a class="btn btn-sm btn-success" href="#">Completed</a>
                                    @else
                                        <a class="btn btn-sm btn-secondary" href="#">Incomplete</a>
                                    @endif
                                    </td>

                                    <td id="outer">
                                        <a class="inner btn btn-sm btn-success" href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                                        <a class="inner btn btn-sm btn-info" href="{{ route('todos.show', $todo->id) }}">View</a>
                                        <form method="post" action="{{ route('todos.destroy') }}" class="inner" >
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h4>No todos are created yet</h4>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
