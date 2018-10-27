@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h3>Rol de Ususario</h3>
        </div>
        <div class="card-body">
          <form class="form-group" action="{{route('admin.asignar.rol')}}" method="post">
            @csrf
            <div class="row">
              @foreach($roles as $rol)
              <div class="col-md-12 col-xs-12">
                  <div class="alert alert-info">
                    <strong>{{$rol->name}}</strong>
                    <p>{{$rol->description}}</p>
                  </div>
              </div>
              @endforeach
            </div>
            <div class="row">
              <div class="col-md-7 col-xs-12">
                <select class="form-control" name="rol">
                  @foreach($roles as $rol)
                  <option value="{{$rol->id}}">{{$rol->name}}</option>
                  @endforeach
                </select>
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-7">
                <button type="submit" name="button" class="btn btn-sm form-button float-left">Asignar Rol</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><br><br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
