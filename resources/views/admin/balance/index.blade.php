@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Saldo</h1>

@stop

@section('content')
    <div class="row">
        <div class="col-12">
        
            <div class="card">
                <div class="card-body">
                <div class="col-lg-3 col-6">
                @include('admin.includes.alerts')
                <a href="{{route('balance.deposit')}}" class="btn btn-primary"><i class="fas fa-cart-plus"></i>
                Recarregar</a>
             
                @if($amount > 0)
                    <a href="{{route('balance.transfer')}}" class="btn btn-danger"><i class="fas fa-cart-arrow-down"></i>
                    Sacar</a>
                @endif

                @if($amount > 0)
                    <a href="{{route('balance.transfer')}}" class="btn btn-info">
                      <i class="fas fa-cart-arrow-down" arial-hidden = "true"></i>
                    Transferir</a>
                @endif

                <h5></h5>
                
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>R$ {{number_format($amount, 2 , ',', '.')}}</h3>

              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('admin.historic') }}" class="small-box-footer">Historic <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                </div>
            </div>
        </div>
    </div>
@stop
