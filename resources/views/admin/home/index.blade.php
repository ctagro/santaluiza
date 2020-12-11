


@extends('adminlte::page')




@section('title', 'Santa Luiza')

@section('content_header')
    <h3 class="text-dark text-center p-1">Controle Financeiro </h3>
    <h6 class="card-subtitle text-center">Conta:  {{ auth()->user()->name }}</h6>
@stop

@section('content')

  
    <div class="row justify-content-sm-center">

        <div class="col-md-4 col-sm-12">
        <a href="{{ route('despesa.index') }}" class="">
            <div class="card">
                <h5 class="mt-2 text-center">Registrar Despesas</h5>
                 <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/despesas.jpeg')}}"  style="height: 200px;"alt="Espaço reservado para exibição de imagens" >
                <div class="card-body">
           
                </div>
            </div>
        </a>
            
        </div>

        <div class="col-md-4 col-sm-12">
            <a href="{{ route('receita.index') }}" class="">
                <div class="card">
                    <h5 class="mt-2 text-center">Registrar Receitas</h5>           
                        <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/receitas.jpeg')}}"  style="height: 200px;" alt="Espaço reservado para exibição de imagem" >              
                    <div class="card-body">

                    </div>
                </div>
             </a>
        </div>

        <div class="col-md-4 col-sm-12">
            <a href="{{ route('investimento.index') }}" class="">
            <div class="card">
                <h5 class="mt-2 text-center">Registrar Investimentos</h5>
    
                    <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/fluxo_futuro.jpeg')}}"  style="height: 200px;" alt="Espaço reservado para exibição de imagem" >
                  
                <div class="card-body">
    
                </div>
            </div>
        </a>
        </div>
        
        <div class="col-md-4 col-sm-12">
            <a href="{{ route('financeiro.fluxoDeCaixa') }}" class="">
                <div class="card">
                    <h5 class="mt-2 text-center">Fluxo de Caixa</h5>
                     <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}"  style="height: 200px;"alt="Espaço reservado para exibição de imagens" >
                    <div class="card-body">
               
                    </div>
                </div>
            </a>

    </div>



@stop
