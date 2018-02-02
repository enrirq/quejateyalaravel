@extends('admin.backend.layout')

@section('container')

<div class="card">
  <div class="card-header">
    <h3 class="card-title"> Nueva  Prioridad</h3>

  </div>
  <div class="card-body">

    <form action="{{ route('admin.priorities.store')}}" method="post" name="formPriority" id="formPriority">
      <div class="form-group">
        <label for="name" class="control-label">Nombre <span class="text-danger">*</span> </label>
        <input type="text" name="name" id="name" value="" class="form-control" placeholder="Introduzca el nombre" requireed>
      </div>
      <div class="row">
        <div class="col-md-6">
        <label for="level" class="control-label" >Nivel<span class="text-danger">*</span> </label>
          <input type="text" name="level" id="level" value="" class="form-control" placeholder="Introduzca el nivel solo numeros">
        </div>
        <div class="col-md-6">
        <label for="color" class="control-label" >Color <span class="text-danger">*</span> </label>
          <input type="text" name="color" id="color" value="" class="form-control" placeholder="Introduzca el color">
        </div>
        <div class="col-md-6">
          <label for="published" class="control-label" >Publicado</label>
          <div class="form-group">
            <input type="radio" name="published" id="publishedTrue" value="1" checked>
            <label for="publishedTrue">Si</label>

            <input type="radio" name="published" id="publishedFalse" value="0">
            <label for="publishedFalse">No</label>
          </div>
        </div>
      </div>
      {{ csrf_field() }} <!--//esto es una medida de seguridad tanto en edit-->
    </form>
  </div>
  <div class="card-footer">
        <button  id="btnSave" class="btn btn-success">
          <i class="fa fa-save"></i> Guardar
        </button>
        <a href="{{route('admin.priorities.index')}}" class="btn btn-danger" id=btnCancel>
            <i class="fa fa-arrow-left"></i> Volver
        </a>
  </div>
</div>

@stop
<!--el siguiente codigo hace que al presionar el boton guardar asignado en btnsave aparesca un mensaje de alerta-->
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnSave').click(function(){
    //  alert('Se presiono el boton guardar');
    //  $('#btnCancel').text('Retornar');
    //  $('#btnCancel').attr('href',"#");
    //  $('#btnCancel').attr('title',"Volver") <!--ESto es para cambiar cualquier atributo-->
    //  alert($('#btnSave').text());
    $('#formPriority').submit(); //esto llama al tantos tantos que esta en http/controller/admin/categorycontroller
    })
  });
</script>
@stop
