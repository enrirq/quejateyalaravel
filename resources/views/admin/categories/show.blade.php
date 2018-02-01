@extends('admin.backend.layout')

@section('container')

<div class="card">
  <div class="card-header">
    <h3 class="card-title"> Detalle Categoria </h3>

  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-md-3">
        <label class="control-label">Nombre</label>
      </div>
      <div class="col-md-9">
        <label class="badge badge-primary">{{$category->name}}</label>
      </div>
    </div>

      <div class="row">
        <div class="col-md-3">
          <label class="control-label">hashtag</label>
        </div>
        <div class="col-md-9">
          <label class="badge badge-primary">{{$category->hashtag}}</label>
        </div>
</div>
        <div class="row">
          <div class="col-md-3">
            <label class="control-label">Publicado</label>
          </div>
          <div class="col-md-9">
            @if($category->published == 1)
            <label class="badge badge-success">
              <i class="fa fa-check"></i>
            </label>
            @else
            <label class="badge badge-danger">
              <i class="fa fa-remove"></i>
            </label>
            @endif
          </div>
        </div>
        <div class="card-footer">
          <a href="{{route('admin.categories.index')}}" class="btn btn-danger" id=btnCancel>
            <i class="fa fa-arrow-left"></i> Volver
          </a>
        </div>
      </div>

      @stop
