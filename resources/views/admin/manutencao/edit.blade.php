
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Conta</title>
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

@section('title', 'Editar Despesas')

@section('content_header')  
<div class="row">     
     <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/despesas.jpeg')}}"  style="height: 50px; width: 50px;"alt="Imagem" >
    <h1 class="ml-2  text-center">Modificar Despesas</h1>
</div>
@stop

@section('content')
   

    <form action="{{ route('manutencao.update' ,[ 'despesa' => $despesa->id ])}}" method="POST"  enctype="multipart/form-data">

        @method('PATCH')

             <div class="form-group">
             {!! csrf_field() !!}                      

             @include('admin.manutencao.form')

                 <div class="form-group">
                      <button type="submit" class="btn btn-danger btn-block">Alterar a despesa</button>
                 </div>
             </div>

            </form>

             <form action="{{ route('manutencao.show' ,[ 'despesa' => $despesa->id ])}}" method="POST"  enctype="multipart/form-data">

              @method('POST')
            
                   <div class="form-group">
                   {!! csrf_field() !!}                      
            
                       <div class="form-group">
                            <button type="submit" class="btn btn-outline-danger" >Deletar...</button>
                       </div>
                   </div>
               </form>
            

<div class="text-right"> <a href="{{ url('admin/manutencao/index') }}" class="text-right">Voltar </a> </div>
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

 

