<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Despesas</title>
     <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    
</body>
</html>

@section('title', 'Editar')

    @extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editando o origem: {{ $origem->numero }}
                    <a class="float-right" href="/origems">Listar origems</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">

@if(Session::has('mensagem_sucesso'))

            <div class="alert alert-success"> {{ Session::get('mensagem_sucesso')}}</div>

@endif

    <div class="row justify-content-center">
    <div class="col-8">

    <!-- porque nao suporta o metodo POST se store é post-->
        <form action="{{ route('origems.update' ,[ 'origem' => $origem->id ])}}" method="POST"  enctype="multipart/form-data">

        @method('PATCH')
        @include('origems.form')


        </form>
    </div>
</div>
</div>

@endsection

