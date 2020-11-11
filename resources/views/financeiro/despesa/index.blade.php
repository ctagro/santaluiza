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
    <h1 class="ml-2  text-center">Registrar Despesas</h1>
</div>
@stop

@section('content')


    
   <!--         <div class="">
    
                    <div class="dataTables_length" id="example1_length">
                        <label>Linhas<select name="" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> </label>
            
            </div>
        -->

  
        <form method="POST" action="{{ route('despesa.store')}}">
            <div class="form-group">
                {!! csrf_field() !!}


                <div class='table-responsive'>

                <table id="example1" class="table table-sm table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th class="sorting_asc" tabindex="0" aria-controls="" rowspan="0" colspan="1"  aria-label="">Data</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Origem</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Despesa</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Valor</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @forelse($despesas as $despesa)

                            @if( $despesa->type == "D")
                                <tr>
                                    <td class="text-sm">{{ $despesa->date }}</td>  
                                    <td class="text-sm">{{ $despesa->origem->descricao }}</td>
                                    <td class="text-sm">{{ $despesa->descricao }}</td>
                                    <td class="text-sm">{{ number_format($despesa->valor, 2 , ',', '.')  }}</td>
                                </tr>
                            @endif
                            @empty
                        @endforelse                  
                    </tbody>
        
                </table>
                
            </div>

            <p class="text-right"> <a href="{{ url('/home') }}" class="text-right">Voltar </a> </p>
           
            <form method="POST" action="{{ route('despesa.store')}}">
                <div class="form-group">
                    {!! csrf_field() !!}
         
            <div class="form-group row">
                <label for="name">Data</label>
                <input type="date" class="form-control" value="<?php echo date('d/m/Y');?>" id="date" name='date' placeholder="<?php echo date('d/m/Y');?>" required>
                @if($errors->has('date'))
                        <h6 class="text-danger" >Digite a data</h6> 
                @endif
            </div>
            <div class="form-group row">
                <!--     <input type="date" name="date"  class="form-control py-3"> -->
                <label for="origem_id">Escolha a origem</label>
                <select name="origem_id" id="origem_id" class="form-control">
                    @foreach($origems as $origem)
                        @if($origem->em_uso =="S")
                            <option value="{{$origem->id}}" >{{$origem->descricao}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('origem_id'))
                    <h6 class="text-danger" >Digite a Descrição</h6> 
                @endif
            </div>
                    
                 <div class="form-group row">
                     <input type="txt" name="descricao"  class="form-control py-3" placeholder="Descrição">
                     @if($errors->has('descricao'))
                         <h6 class="text-danger" >Digite a Descrição</h6> 
                     @endif
                    </div>
                 <div class="form-group row">
                  <input type="number" name="valor"  class="form-control py-3" placeholder="Valor da despesa">
                    @if($errors->has('valor'))
                        <h6 class="text-danger" >Digite o valor</h6> 
                    @endif
                </div> 
            </div>
                </div> 

                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block">Registrar a despesa</button>
                </div>
            <a href="#" id="ancora"></a>
        </form>


<!--        <div class="row">
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

 