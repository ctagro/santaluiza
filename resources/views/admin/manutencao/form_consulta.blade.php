
 
     <!-- Inicio do Formulario de despesa_conta --> 
  
           
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Dados da Consulta</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
          <!-- /.card-header -->
        <div class="card-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="date">Data Inicial :</label>
                <input type="date" name="date_inicial" id ="date_inicial"  class="form-control py-3" > 
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="date">Data Final :</label>
                <input type="date" name="date_final" id ="date_final"  class="form-control py-3" > 
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Tipo</label>
                    <select name="type"  id="type" class="form-control">
                      <option selected="selected" value=""></option>
                      <option value="D">Despesa</option>
                      <option value="R">Receita</option>
                      <option value="I">Investimento</option>
                    </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="origem">Origem</label>
                    <select name="origem_id"  id="origem_id" class="form-control">
                      <option selected="selected" value=""></option>
                        @foreach($origems as $origem)    
                            <option value="{{$origem->id}}">{{$origem->descricao}} </option>                  
                        @endforeach
                    </select>
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="descricao">Descrição :</label>
                <input type="text" name="descricao" id ="descricao"  class="form-control py-3" > 
                  </div>
                </div>
              </div>

   

            </div>
         </div> 
      </div>            
  