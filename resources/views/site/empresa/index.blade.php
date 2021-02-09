@extends('layouts.site')

@section('content')
    <!-- Dados da empresa -->
    <div id="empresa-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="main-title">Nosso dados</h3>
          </div>
        <div class="row">
          <div class="col-md-3 col-xs-6 circle-box">
            <div id="circleA"></div>
            <p>Projetos entregues</p>
          </div>
          <div class="col-md-3 col-xs-6 circle-box">
            <div id="circleB"></div>
            <p>Clientes Felizes</p>
          </div>
          <div class="col-md-3 col-xs-6 circle-box">
            <div id="circleC"></div>
            <p>Colaboradores</p>
          </div>  
          <div class="col-md-3 col-xs-6 circle-box">
            <div id="circleD"></div>
            <p>Cafézinhos</p>
          </div>
        </div>
      </div>
    </div>
    <hr size = 10>
@endsection
