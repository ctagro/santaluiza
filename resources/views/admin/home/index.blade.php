


@extends('adminlte::page')




@section('title', 'Ctl_Agro')

@section('content_header')
    <h3 class="text-dark text-center p-1">Controle Financeiro </h3>
@stop

@section('content')

  
    <div class="row justify-content-sm-center">

        <div class="col-md-4 col-sm-12">
        <a href="{{ route('despesa.index') }}" class="">
            <div class="card">
                <h5 class="mt-2 text-center">Registrar Despesas</h5>
                 <img class="card-img-top img-responsive img-thumbnail" src="{{ url('img/cards/despesas.jpeg')}}"  style="height: 200px;"alt="Espaço reservado para exibição de imagens" >
                <div class="card-body">
                    <h6 class="text-center">Fazenda Santa Luiza</h6>
                    <hr/>
                    <h6 class="card-subtitle text-center">Conta:  {{ auth()->user()->name }}</h6>
                </div>
            </div>
        </a>
            
        </div>

        <div class="col-md-4 col-sm-12">
            <a href="{{ route('receita.index') }}" class="">
                <div class="card">
                    <h5 class="mt-2 text-center">Registrar Receitas</h5>           
                        <img class="card-img-top img-responsive img-thumbnail" src="{{ url('img/cards/receitas.jpeg')}}"  style="height: 200px;" alt="Espaço para exibição de imagem" >              
                    <div class="card-body">
                        <h6 class="text-center">Fazenda Santa Luiza</h6>
                        <hr/>
                        <h6 class="card-subtitle text-center">Conta:  {{ auth()->user()->name }}</h6>
                    </div>
                </div>
             </a>
        </div>

        <div class="col-md-4 col-sm-12">
            <a href="{{ route('financeiro.fluxoDeCaixa') }}" class="">
            <div class="card">
                <h5 class="mt-2 text-center">Fluxo de Caixa</h5>
    
                    <img class="card-img-top img-responsive img-thumbnail" src="{{ url('img/cards/fluxo_de_caixa.jpeg')}}"  style="height: 200px;" alt="Espaço para exibição de imagem" >
                  
                <div class="card-body">
                    <h6 class="text-center">Fazenda Santa Luiza</h6>
                    <hr/>
                    <h6 class="card-subtitle text-center">Conta:  {{ auth()->user()->name }}</h6>
                </div>
            </div>
        </a>
        </div>

        <div class="col-md-4 col-sm-12">
            <a href="{{ route('despesa.index') }}" class="">
            <div class="card">
                <h5 class="mt-2 text-center">Contas a Pagar</h5>
         
                    <img class="card-img-top img-responsive img-thumbnail" src="{{ url('img/cards/contas_a_pagar.png')}}"  style="height: 200px;" alt="Espaço para exibição de imagem" >
               
                <div class="card-body">
                    <h6 class="text-center">Fazenda Santa Luiza</h6>
                    <hr/>
                    <h6 class="card-subtitle text-center">Conta:  {{ auth()->user()->name }}</h6>
                </div>
            </div>
        </a>    
        </div>

        <div class="col-md-4 col-sm-12">
            <a href="{{ route('despesa.index') }}" class="">
            <div class="card">
                <h5 class="mt-2 text-center">Contas a Receber</h5>
 
                    <img class="card-img-top img-responsive img-thumbnail" src="{{ url('img/cards/contas_a_receber.jpeg')}}"  style="height: 200px;" alt="Espaço para exibição de imagem" >
              
                <div class="card-body">
                    <h6 class="text-center">Fazenda Santa Luiza</h6>
                    <hr/>
                    <h6 class="card-subtitle text-center">Conta:  {{ auth()->user()->name }}</h6>
                </div>
            </div>
        </a>
        </div>

        <div class="col-md-4 col-sm-12">
            <a href="{{ route('despesa.index') }}" class="">
            <div class="card">
                <h5 class="mt-2 text-center">Fluxo de Caixa Futuro</h5>
   
                    <img class="card-img-top img-responsive img-thumbnail" src="{{ url('img/cards/fluxo_futuro.jpeg')}}"  style="height: 200px;" alt="Espaço para exibição de imagem" >
                <div class="card-body">
                    <h6 class="text-center">Fazenda Santa Luiza</h6>
                    <hr/>
                    <h6 class="card-subtitle text-center">Conta:  {{ auth()->user()->name }}</h6>
                </div>
            </div>
        </a>
        </div>

    </div>



@stop
