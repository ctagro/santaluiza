@extends('adminlte::page')

@section('title', 'Histórico de Transações')

@section('content_header')
    <h1 class="m-0 text-dark">Histórico de Transações</h1>
@stop

@section('content')

   
                  
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr >  <!-- role="row" -->
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Data</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Transação</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Valor</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Saldo</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Sender</th>
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
 


   <!--     <div class="row"><div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
        </div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous">
            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
        </li>
        <li class="paginate_button page-item active">
            <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
        </li>
        <li class="paginate_button page-item ">
            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
        </li><li class="paginate_button page-item ">
            <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>

          </div> -->

          @if (isset($dataForm)) 
          {!!  $historics->appends($dataForm)->links() !!}
      @else
          {!!  $historics->links()!!}
      @endif    

            <!-- paginaçao da tabela na view  -->
         <!-- Só existe a variável dataForm se utilizar a pesquisa
              , ou seja, o metodo 'searchHistoric' do controller
              O appends() é para manter a consulta na mudança de 
              pagina. É necessario que o metodo seja Any na rota
        -->
              
@stop