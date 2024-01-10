@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <h1>Editar Tarefa</h1>
                <form>
                    <div class="form-group">
                        <label>Título</label>
                        <input type="title" name="title" class="form-control" placeholder="Título" />
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="description" class="form-control" placeholder="Descrição" cols="5" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
