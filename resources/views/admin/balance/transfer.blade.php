@extends('adminlte::page')

@section('title', 'Transferência')

@section('content_header')
    <h1 class="m-0 text-dark">Fazer Transferência</h1>
@stop

@section('content')
    <div class="box">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-8 col-6">
                      
                
                        <form method="POST" action="{{ route('confirm.transfer')}}">
                            <div class="form-group" >
                                {!! csrf_field() !!}
                                <input type="text" name="sender" placeholder="Destinatário" classe="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Próxima etapa</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@stop