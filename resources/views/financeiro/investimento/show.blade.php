
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

@extends('adminlte::page')

@section('title', 'Despesas')

@section('content_header')  
<div class="row">     
     <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/despesas.jpeg')}}"  style="height: 50px; width: 50px;"alt="Imagem" >
    <h1 class="ml-2  text-center">Excluir Registro</h1>
</div>
@stop

@section('content')
   


   <!-- Fim do Formulario de despesa_conta --> 



<div class="container">
  <div class="row">
    <div class="bolder">Data:</div>
  </div>
  <div class="row">
    <div class="form-control">{{$despesa->date }}</div>
  </div>
  <div class="row">
    <div class="bg-light">Origem:</div>
  </div>
  <div class="row">
    <div class="form-control">{{ $despesa->origem->descricao }}</div>
  </div>
  <div class="row">
    <div class="bg-light">Descricao:</div>
  </div>
  <div class="row">
      <div class="form-control">{{$despesa->descricao }}</div>
   </div>
  <div class="row">
      <div class="bg-light">Valor:</div>
  </div>
  <div class="row">
    <div class="form-control">{{number_format($despesa->valor, 2 , ',', '.') }}</div>
  </div>
</div>
      
      <!-- Fim do Formulario de despesa_conta --> 

                 <div class="form-group">

                  <p></p>


                  {!! Form::open(['method' => 'DELETE', "{{route('despesa.update' ,[ 'despesa' => $despesa->id ])}}", 'style' => 'display: inline;'])!!}

                  <button type="submit" class="btn btn-danger btn-block">Confirma Exclusão</button>

              {!! Form::close()!!}
             

              <div class="text-right"> <a href="{{ url('financeiro/despesa/index') }}" class="text-right">Voltar </a> </div>
             </div>
            </div>
         <a href="#" id="ancora"></a>

                
     

</body>

<!-- ./wrapper -->
<!-- jQuery -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
    window.location.href='#ancora';
</script>
<!-- page script -->

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

@stop

 

