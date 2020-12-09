 

    <!-- porque nao suporta o metodo POST se store é post-->   

 <form method="POST" action="{{ route('receita.store')}}">
             <div class="form-group">
             {!! csrf_field() !!}                      

             @include('financeiro.receita.form')

                 <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Registrar a receita</button>
                 </div>
             </div>
         <a href="#" id="ancora"></a>
</form>
                
     



