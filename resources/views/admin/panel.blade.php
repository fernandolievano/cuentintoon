@extends('layouts.admin')

@section('content')

@if(session('status'))
<br><header class="row justify-content-center">
  <div class="col-md-12 col-xs-12">
    <div class="alert alert-success">
      <strong>{{ session('status') }}</strong>
    </div>
  </div>
</header>
@endif

<div class="row justify-content-center">
  <div class="col-md-12 col-xs-12">
    <h1 class="display-5">Usuarios</h1>
  </div>

  <div class="col-md-10 col-xs-12">
    <table class="table table-striped table-hover">
      <thead class="bg-sblue-1 text-muted">
        <th>ID</th>
        <th>Username</th>
        <th>Roles</th>
        <th colspan="2"></th>
      </thead>
      <body>
        @foreach($usuarios as $usuario)
        <tr>
          <td>{{$usuario->id}}</td>
          <td>{{$usuario->username}}</td>
          <td>
            @if(count($usuario->roles) < 1)
              <strong>Este usuario no tiene roles</strong>
            @endif
            @foreach($usuario->roles as $rol)
            <strong>{{$rol->name.","}}</strong>
            @endforeach
          </td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">Roles</a>
          </td>
          <td>
            <form class="hidden" action="" method="post">
              @csrf <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-sm btn-danger" name="button">Quitar Roles</button>
            </form>
          </td>
        </tr>
        @endforeach
      </body>
    </table>
  </div>
</div>


<div class="row justify-content-center">
  <div class="col-md-12 col-xs-12">
    <h1 class="display-5">Roles</h1>
  </div>

  <div class="col-md-10 col-xs-12">
    <table class="table table-striped table-hover">
      <thead class="bg-sblue-1 text-muted">
        <th>Rol</th>
        <th>Slug</th>
        <th>Descripción</th>
        <th>Permisos</th>
        <th colspan="2"></th>
      </thead>
      <body>
        @foreach($roles as $rol)
        <tr>
          <td>{{$rol->name}}</td>
          <td>{{$rol->slug}}</td>
          <td>{{$rol->description}}</td>
          <td>
            @if(count($rol->permissions) < 1)
              <strong>Este rol no tiene permisos</strong>
            @endif
            @foreach($rol->permissions as $permiso)
            <strong>{{$permiso->name.","}}</strong>
            @endforeach
          </td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">Permisos</a>
          </td>
          <td>
            <form class="hidden" action="{{route('admin.delete.rol', $rol->id)}}" method="post">
              @csrf <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-sm btn-danger" name="button">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </body>
    </table>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-12 col-xs-12">
    <h1 class="display-5">Permisos</h1>
  </div>
  <div class="col-md-10 col-xs-12">
    <table class="table table-striped table-hover">
      <thead class="bg-sblue-1 text-muted">
        <th>Permiso</th>
        <th>Slug</th>
        <th>Descripción</th>
        <th></th>
      </thead>
      <body>
        @foreach($permisos as $permiso)
        <tr>
          <td>{{$permiso->name}}</td>
          <td>{{$permiso->slug}}</td>
          <td>{{$permiso->description}}</td>
          <td>
            <form class="hidden" action="{{route('admin.delete.permiso', $permiso->id)}}" method="post">
              @csrf <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-sm btn-danger" name="button">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </body>
    </table>
  </div>
</div>
@endsection
