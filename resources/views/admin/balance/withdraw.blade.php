@extends('adminlte::page')

@section('title', 'Nova Retirada')

@section('content_header')
    <h1 class="m-0 text-dark">Fazer Retirada</h1>
@stop

@section('content')
    <div class="box">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-3 col-6">
                      
                        @include('admin.includes.alerts')
                
                        <form method="POST" action="{{ route('withdraw.store')}}">
                            <div class="form-group">
                                {!! csrf_field() !!}
                                <input type="text" name="value" placeholder="Valor Retirada" classe="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Retirada</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@stop