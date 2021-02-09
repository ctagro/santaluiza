
 
     <!-- Inicio do Formulario de despesa_conta --> 
  
           


                <div class="form-group row">
                    <!--    <label for="origem_id">Escolha a origem</label> -->
                        <select name="user_id"  id="user_id" class="form-control">
                            @foreach($users as $user)
                               
                                    <option value="{{$user->id}}" {{ $user->id == $despesa->user_id ? 'selected' : ''}}>{{$user->name}} </option>
                             
                            @endforeach
                        </select>
                        @if($errors->has('user_id'))
                            <h6 class="text-danger" >Digite o Usuário</h6> 
                        @endif
                    </div>

            @if(!Request::is('*/edit'))
               
                <input type="date" name="date"  value="{{old('$date(d/m/y)') ?? $despesa->date }}"  class="form-control py-3" placeholder="$data">
                @if($errors->has('date'))
                        <h6 class="text-danger" >Digite a data</h6> 
                @endif

            @else
                <?php $data = $despesa->date ?>
            <label for="date">Data : {{$data}}</label>
                <input type="date" name="date" id ="date" value="{{old('$date(d/m/Y)') ?? $despesa->date}}"  class="form-control py-3" placeholder="$data">             
            @endif

            </div>

            <div class="form-group row">
                <input type="txt" name="type" value="{{old('type') ?? $despesa->type }}" class="form-control py-3" placeholder="Tipo">
                @if($errors->has('descricao'))
                    <h6 class="text-danger" >Digite a Descrição</h6> 
                @endif
            </div>

<div class="form-group row">
<!--    <label for="origem_id">Escolha a origem</label> -->
    <select name="origem_id"  id="origem_id" class="form-control">
        @foreach($origems as $origem)
            @if($origem->em_uso =="S")
                <option value="{{$origem->id}}" {{ $origem->id == $despesa->origem_id ? 'selected' : ''}}>{{$origem->descricao}} </option>
            @endif
        @endforeach
    </select>
    @if($errors->has('origem_id'))
        <h6 class="text-danger" >Digite a Origem</h6> 
    @endif
</div>
<div class="form-group row">
    <input type="txt" name="descricao" value="{{old('descricao') ?? $despesa->descricao }}" class="form-control py-3" placeholder="Descrição">
    @if($errors->has('descricao'))
        <h6 class="text-danger" >Digite a Descrição</h6> 
    @endif
</div>

<div class="form-group row">
  <input type="number" class="floatNumberField form-control py-3" name="valor" value="{{old('valor') ?? $despesa->valor }}"  placeholder="0.00" step="0.01" >
    @if($errors->has('valor'))
        <h6 class="text-danger" >Digite o valor</h6> 
    @endif
</div> 

<!-- Fim do Formulario de despesa_conta --> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>

