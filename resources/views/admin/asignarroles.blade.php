<div class="modal fade" id="asignar-rol">
  <div class="modal-dialog">
    <div class="modal-content border-orange-1">
      <div class="modal-header bg-orange-2 text-light">
        <h1>Asignar Rol</h1>
      </div>
      {!! Form::open(['id' => 'usuario-rol']) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-11 col-xs-11">
            <label for="user">Usuario</label>
            <select class="form-control form-control-sm" name="user">
              @foreach($usuarios as $usuario)
                <option value="{{$usuario->id}}">{{$usuario->username}}</option>
              @endforeach
            </select>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-11 col-xs-11">
            <label for="rol">Rol</label>
            <select class="form-control form-control-sm" name="rol">
              @foreach($roles as $rol)
                <option value="{{$rol->id}}">{{$rol->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-orange-2">
        <div class="row">
          <div class="col-md-11">
            <button type="submit" name="usuario-rol" form="usuario-rol">Asignar</button>
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
