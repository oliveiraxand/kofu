@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
                    
                    <p><b>Your Todo title is: </b> {{$todo->title}}</p>
                    <p><b>Your Todo title is: </b> {{$todo->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
