 

    <!-- porque nao suporta o metodo POST se store é post-->   

 <form method="POST" action="{{ route('manutencao.store')}}">
             <div class="form-group">
             {!! csrf_field() !!}                      

             @include('admin.manutencao.form')

                 <div class="form-group">
                      <button type="submit" class="btn btn-danger btn-block">Registrar a despesa</button>
                 </div>
             </div>
         <a href="#" id="ancora"></a>
</form>
                
     



