@extends('adminlte::page')

@section('title', 'Histórico de Transações')

@section('content_header')
    <h1 class="m-0 text-dark">Histórico de Transações</h1>
@stop

@section('content')
    <div class="box">
        <div class="col-12">
     
       
        <div class="card">
        <div class="card-body">        
        <div class="col-lg-3 col8">
        <form action="{{ route('historic.search') }}" method="POST"  class="form form-inline">
            {!! csrf_field() !!}     
            <input type="text" class="form-control"  placeholder="Enter ID" name="id">
            <input type="date" class="form-control" placeholder="Enter com a Data" name="date">
            <select name="type" class="form-control">                 
                <option value="">--transação--</option>
                @foreach($types as $key => $type)
                    <option value="{{ $key }}">{{ $type}}</option>
                @endforeach
            </select>
                   
            <button type="submit" class="btn btn-primary">Pesquisar</button>
           
        </form> 
             
        <h5></h5>                 
            

        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Data</th>
                <th scope="col">Transação</th>
                <th scope="col">Valor</th>
                <th scope="col">Saldo</th>
                <th scope="col">Sender</th>

            </tr>
        </thead>
  <tbody>
      @forelse($historics as $historic)
        <tr>
        <td>{{ $historic->id }}</td>   
        <th scope="row">{{ $historic->date }}</th>
        <td>{{ $historic->type($historic->type) }}</td>
        <td>{{ number_format($historic->amount, 2 , ',', '.')  }}</td>
        <td>{{number_format($historic->total_after, 2 , ',', '.')   }}</td>
        <td>
            @if($historic->user_id_transaction)
                {{ $historic->userSender->name }}
            @else
              -
            @endif
                </td>
            </tr>
                @empty
                @endforelse
        
        </tbody>
        </table>

        <!-- paginaçao da tabela na view  -->
         <!-- Só existe a variável dataForm se utilizar a pesquisa
              , ou seja, o metodo 'searchHistoric' do controller
              O appends() é para manter a consulta na mudança de 
              pagina. É necessario que o metodo seja Any na rota
        -->
        
        @if (isset($dataForm)) 
            {!!  $historics->appends($dataForm)->links() !!}
        @else
            {!!  $historics->links()!!}
        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop