@extends('admin.backend.layout')

@section('container')

<div class="card">
  <div class="card-header">
    <h3 class="card-title"> Modificar Comentario </h3>

  </div>
  <div class="card-body">

    <form action="{{ route('admin.comments.update',[$comment->id])}}" method="post" name="formComment" id="formComment">
      <div class="row">
        <div class="col-md-6">
        <label for="description" class="control-label" >descripcion <span class="text-danger">*</span> </label>
          <input type="text" name="description" id="description" value="{{$comment->description}}" class="form-control" placeholder="Modifique comentario">
        </div>
        <div class="col-md-6">
          <label for="published" class="control-label" >Publicado</label>
          <div class="form-group">
            <input type="radio" name="published" id="publishedTrue" value="1" <?= $comment->published == 1 ? 'checked':''; ?>>
            <label for="publishedTrue">Si</label>

            <input type="radio" name="published" id="publishedFalse" value="0" <?= $comment->published == 0 ? 'checked':''; ?>>
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
        <a href="{{route('admin.comments.index')}}" class="btn btn-danger" id=btnCancel>
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
    $('#formComment').submit(); //esto llama al tantos tantos que esta en http/controller/admin/categorycontroller
    })
  });
</script>
@stop
