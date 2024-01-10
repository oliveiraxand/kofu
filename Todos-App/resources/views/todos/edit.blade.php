@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
                <h1>Editar Tarefa</h1>
                <form method="post" action="{{ route('todos.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="todo_id" value="{{ $todo->id }}" />
                    <div class="form-group">
                        <label>Título</label>
                        <input type="title" name="title" class="form-control" placeholder="Título" value="{{ $todo->title }}" />
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="description" class="form-control" placeholder="Descrição" cols="5" rows="5">{{ $todo->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="is_completed" class="form-control">
                            <option disabled selected> Selecionar Opção</option>
                            <option value="1">Completa</option>
                            <option value="0">Incompleta</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
