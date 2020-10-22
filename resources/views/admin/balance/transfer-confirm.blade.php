@extends('adminlte::page')

@section('title', 'Confirmar Transferência')

@section('content_header')
    <h1 class="m-0 text-dark">Confirmar Transferência</h1>
@stop

@section('content')
    <div class="box">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-8 col-6">
                      
                            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>
                            <p><strong>Saldo: </strong>{{ number_format($balance->amount, 2 , ',', '.') }}</p>
                
                        <form method="POST" action="{{ route('transfer.store')}}">
                            {!! csrf_field() !!} 
                            
                            <input type="hidden" name="sender_id" value="{{ $sender->id }}">

                            <div class="form-group" >
                                <input type="text" name="value" placeholder="Valor" classe="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Transferir</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@stop