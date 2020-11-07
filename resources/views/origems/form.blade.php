
 
 <div class='table-responsive'>

            <input type="hidden" name="id" value="{{$origem->id }}" class="form-control py-3">
 
            <div class="form-group">
                <label for="codigo">Código da Área</label>
                <input type="text" name="codigo" value="{{old('codigo') ?? $origem->codigo }}" class="form-control">
                @if($errors->has('codigo'))
                        <h6 class="text-danger" >Digite codigo da Área</h6> 
                @endif
            </div>


            <div class="form-group">

                <label for="descricao">Descricao</label>
                <input type="text" name="descricao" value="{{old('descricao') ?? $origem->descricao }}" class="form-control">
                @if($errors->has('descricao'))
                        <h6 class="text-danger" >Digite a Descrição</h6> 
                @endif
            </div>

            <div class="form-group">
                <label for="descricao" >Em uso (S / N)</label>
                <input type="text" name="em_uso" value="{{old('em_uso') ?? $origem->em_uso }}" class="form-control">
                @if($errors->has('em_uso'))
                        <h6 class="text-danger" >Escolha a opção S ou N</h6> 
                @endif
                </div>


            @csrf
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <p class="text-right"> <a href="{{ url('/home') }}" class="text-right">Voltar </a> </p>
        </div>

     </div>

</div>

</div>


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


