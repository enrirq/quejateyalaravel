@extends('admin.backend.layout')

@section('container')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <a href="{{route('admin.priorities.create')}}" class="btn btn-primary btn-lg">
            <i class="fa fa-plus"> </i> Crear
          </a>
        </div>
        <h3 class="card-title">Prioridades</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th>Nombre</th>
              <th>Nivel</th>
              <th>Color</th>
              <th>Publicado</th>
              <th width="180px">Opciones</th>
            </tr>
          </thead>
          <tbody>
                  @foreach($priorities as $priority)
                        <tr>
                          <td>{{$priority->name}}</td>
                          <td>{{$priority->level}}</td>
                          <td>{{$priority->color}}</td>
                          <td>
                                  @if($priority->published ==1)
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
                                  <a href="{{ route('admin.priorities.edit',[$priority->id]) }}" class="btn btn-success">
                                      <i class="fa fa-pencil"></i>
                                  </a>
                                  <a href="{{ route('admin.priorities.show',[$priority->id]) }}" class="btn btn-warning">
                                      <i class="fa fa-eye"></i>
                                  </a>
                                  <a href="{{ route('admin.priorities.delete',[$priority->id])}}" class="btn btn-danger">
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
