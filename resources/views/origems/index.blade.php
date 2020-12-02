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

@section('title', 'Listar')

    @extends('adminlte::page')

@section('content')

<div class='table-responsive'>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Origens
                <a class="float-right" href="{{url('origems/create')}}">Cadastrar novo origem</a>

                </div>
                <div class="card-body">
                @if(Session::has('mensagem_sucesso'))

                        <div class="alert alert-success"> {{ Session::get('mensagem_sucesso')}}</div>

                @endif

                  <table class="table">

                  <th>Ativo</th>
                  <th>Código</th>
                  <th>Descrição<optgroup></optgroup></th>


                    <tbody>

                    @foreach($origems as $origem)

                      <tr>

                        <td>{{$origem -> em_uso}}</td>
                        <td>{{$origem -> codigo}}</td>
                        <td>{{$origem -> descricao}}</td>


                        <!-- <td>{{$origem-> id}}</td> -->
                        <td >
                            <a href= "{{ route('origems.edit' ,[ 'origem' => $origem->id ])}}" class="btn btn-primary btn-sm">Editar</a>

                           <form id="delete-form"  method="POST" action="{{ route('origems.destroy' ,[ 'origem' => $origem->id ])}}", style = 'display: inline;'> 
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                          
                      <!--     <button type="submit" class="btn btn-danger btn-sm inline danger">Excluir</button>
                      -->
                     
                            </form>


                        </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                  

                </div>
            </div>
        </div>
    </div>
</div>
<p class="text-right"> <a href="{{ url('/home') }}" class="text-right">Voltar </a> </p>
</div>
@endsection
