<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fluxo de Caixa Futuro</title>
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

@section('title', 'Receita')

@section('content_header')
<div class="row">     
    <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}"  style="height: 50px; width: 50px;"alt="Imagem" >
   <h1 class="ml-2  text-center">Fluxo de Caixa</h1>
</div>
@stop

@section('content')



        <div class='table-responsive'>

            <table id="fluxo" class="table table-sm table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="Fluxo">
                <thead>
                    <tr > 
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Data</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tipo</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Área</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Descrição</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Valor</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                <!--     <th class="text-sm" ></th>
                    <th class="text-sm" > </th> 
                    <td class="text-sm">Saldo da conta</td> -->
                    <?php $saldo = 0 ?>
                   
              <!--      <td class="text-sm"> </td>

                    <td class="text-sm" >{{ number_format($saldo, 2 , ',', '.')  }}</td> -->
     
                    @forelse($despesas as $despesa)
                        <tr>
                     
                            <th class="text-sm" >{{ $despesa->date }}</th>
                            <th class="text-sm" >{{ $despesa->type }}</th>
                            <th class="text-sm" >{{ $despesa->origem->codigo }}</th>
                            <td class="text-sm">{{ $despesa->descricao }}</td>
                            @if( $despesa->type == "D" OR $despesa->type == "I")
                                 <td class="text-sm">{{ number_format((-1 * $despesa->valor), 2 , ',', '.')  }}</td>
                                 <?php $saldo = $saldo - $despesa->valor ?>
                            @else
                                 <td class="text-sm" >{{ number_format($despesa->valor, 2 , ',', '.')  }}</td>
                                 <?php $saldo = $saldo + $despesa->valor ?>
                            @endif
                            <td class="text-sm" >{{ number_format($saldo, 2 , ',', '.')  }}</td>
                         
                        </tr>
                        @empty
                    @endforelse                    
                </tbody>
            </table>
            <a href="#" id="ancora"></a>

            <p class="text-right"> <a href="{{ url('/home') }}" class="text-right">Voltar </a> </p>
        </div>
    <!--   

        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>

            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example1_previous">
                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        </li><li class="paginate_button page-item ">
                            <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                        </li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                        </li>
                        <li class="paginate_button page-item next" id="example1_next">
                            <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                        </li>
                    </ul>
                 </div>
            </div>
        -->

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

 