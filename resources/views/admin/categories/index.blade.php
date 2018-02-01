@extends('admin.backend.layout')

@section('container')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <a href="{{route('admin.categories.create')}}" class="btn btn-primary btn-lg">
            <i class="fa fa-plus"> </i> Crear
          </a>
        </div>
        <h3 class="card-title">Categorias</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th>Nombre</th>
              <th>Hashtag</th>
              <th>Publicado</th>
              <th width="180px">Opciones</th>
            </tr>
          </thead>
          <tbody>
                  @foreach($categories as $category)
                        <tr>
                          <td>{{$category->name}}</td>
                          <td>{{$category->hashtag}}</td>
                          <td>
                                  @if($category->published ==1)
                                  <a href="" class="btn btn-success">
                                    <i class="fa fa-check">
                                    </i>
                                  </a>
                                    @else
                                  <a href="" class="btn btn-danger">
                                    <i class="fa fa-remove">
                                    </i>
                                  </a>
                                  @endif
                          </td>
                          <td>
                                  <a href="{{ route('admin.categories.edit',[$category->id]) }}" class="btn btn-success">
                                      <i class="fa fa-pencil"></i>
                                  </a>
                                  <a href="{{ route('admin.categories.show',[$category->id]) }}" class="btn btn-warning">
                                      <i class="fa fa-eye"></i>
                                  </a>
                                  <a href="{{ route('admin.categories.delete',[$category->id])}}" class="btn btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>

                          </td>
                        </tr>
                  @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
