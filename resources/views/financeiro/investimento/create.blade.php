 

    <!-- porque nao suporta o metodo POST se store é post-->   

 <form method="POST" action="{{ route('investimento.store')}}">
             <div class="form-group">
             {!! csrf_field() !!}                      

             @include('financeiro.investimento.form')

                 <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Registrar investimento</button>
                 </div>
             </div>
         <a href="#" id="ancora"></a>
</form>
                
     



