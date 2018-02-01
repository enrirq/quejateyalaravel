@extends('admin.backend.layout')

@section('container')

<div class="card">
  <div class="card-header">
    <h3 class="card-title"> Modificar Valoracion </h3>

  </div>
  <div class="card-body">

    <form action="{{ route('admin.valuations.update',[$valuation->id])}}" method="post" name="formValuation" id="formValuation">
      <div class="form-group">
        <label for="name" class="control-label">Nombre <span class="text-danger">*</span> </label>
        <input type="text" name="name" id="name" value="{{$valuation->name}}" class="form-control" placeholder="Introduzca el nombre" requireed>
      </div>
      <div class="row">
        <div class="col-md-6">
        <label for="position" class="control-label" >Posicion <span class="text-danger">*</span> </label>
          <input type="text" name="position" id="position" value="{{$valuation->position}}" class="form-control" placeholder="Introduzca la valoracion">
        </div>
        <div class="col-md-6">
          <label for="published" class="control-label" >Publicado</label>
          <div class="form-group">
            <input type="radio" name="published" id="publishedTrue" value="1" <?= $valuation->published == 1 ? 'checked':''; ?>>
            <label for="publishedTrue">Si</label>

            <input type="radio" name="published" id="publishedFalse" value="0" <?= $valuation->published == 0 ? 'checked':''; ?>>
            <label for="publishedFalse">No</label>
          </div>
        </div>
      </div>
      {{ method_field('PUT') }} <!-- esto hace de que podamos utilizar el put-->
      {{ csrf_field() }} <!--//esto es una medida de seguridad tanto en edit-->
    </form>
  </div>
  <div class="card-footer">
        <button  id="btnSave" class="btn btn-success">
          <i class="fa fa-save"></i> Guardar
        </button>
        <a href="{{route('admin.valuations.index')}}" class="btn btn-danger" id=btnCancel>
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
    $('#formValuation').submit(); //esto llama al tantos tantos que esta en http/controller/admin/categorycontroller
    })
  });
</script>
@stop
