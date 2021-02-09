<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manutenção</title>
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
    <h1 class="ml-2  text-center">Manutenção...</h1>
</div>
@stop

@section('content')



<!-- Inicio da Tabela dos registros -->

                <div class='table-responsive'>

                <table id="example1" class="table table-sm table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                    
                            <th class="sorting_asc" tabindex="0" aria-controls="" rowspan="0" colspan="1"  aria-label="">Data</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Usuário</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tipo</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Origem</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Descrição</th> 
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Valor</th> 
                      
                

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th>
                        </tr>
                    </thead>
                
                    <tbody>

                        <?php $somatorio = 0 ?>

                        @forelse($despesas as $despesa)

                           
                                <tr>
                                    <td>
                                        <a href= "{{ route('manutencao.edit' ,[ 'despesa' => $despesa->id ])}}" >{{ $despesa->date }}</a>
                                     </td>
                                    <td>
                                        <a href= "{{ route('manutencao.edit' ,[ 'despesa' => $despesa->id ])}}" >{{ $despesa->user->name }}</a>
                                     </td>
                                     <td>
                                        <a href= "{{ route('manutencao.edit' ,[ 'despesa' => $despesa->id ])}}" >{{ $despesa->type }}</a>
                                     </td>
                                 
                                    <td>
                                        <a href= "{{ route('manutencao.edit' ,[ 'despesa' => $despesa->id ])}}" >{{ $despesa->origem->descricao }}</a>
                                    </td>
                                    <td>
                                        <a href= "{{ route('manutencao.edit' ,[ 'despesa' => $despesa->id ])}}" >{{ $despesa->descricao }}</a>
                                    </td>
                                 
                                    @if( $despesa->type == "D" OR $despesa->type == "I")
                                        <td> 
                                            <a href= "{{ route('manutencao.edit' ,[ 'despesa' => $despesa->id ])}}" >{{ number_format((-1 * $despesa->valor), 2 , ',', '.') }}</a>

                                        </td>
                                        <?php $somatorio = $somatorio - $despesa->valor ?>
                                    @else
                                        <td> 
                                            <a href= "{{ route('manutencao.edit' ,[ 'despesa' => $despesa->id ])}}" >{{ number_format($despesa->valor, 2 , ',', '.')  }}</a>   
                                        </td>
                                        <?php $somatorio = $somatorio + $despesa->valor ?>
                                    @endif
                                    </td>
                                  
                                </tr>
                               
                            @empty
                        @endforelse  
                            <td>{{ $despesa->date }}</td>
                            <td>Somatório</td>
                            <td></td>  <td></td> <td></td>


                        <td><p>{{ number_format($somatorio, 2 , ',', '.')  }}</p></td>                
                    </tbody>
        
                </table>

                @if(isset($despesa->date))
                    <?php $despesa->date = Null ?>
                    <?php $despesa->origem_id = Null ?>
                    <?php $despesa->descricao = Null ?>
                    <?php $despesa->valor = Null ?>
                @endif
                
            </div>

<!-- Fim da Tabela dos registros -->
             
    <!-- Inicio do Formulario de despesa_conta --> 

      
           
<!-- Fim do Formulario de despesa_conta --> 

<p class="text-right"> <a href="{{ url('/home') }}" class="text-right">Voltar </a> </p>

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

 