<div class="modal fade" id="asignar-permiso">
  <div class="modal-dialog">
    {!! Form::open(['id' => 'rol-permiso', 'route' => 'admin.asignar.permiso']) !!}
    <div class="modal-content border-orange-1">
      <div class="modal-header bg-orange-2 text-light">
        <h1>Asignar Permiso</h1>
        <button type="button" class="close float-right" data-dismiss="modal" name="button">
        <span>&times;</span>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-md-11 col-xs-12">
            <div class="row">
              <label for="rol">Rol</label>
              <select class="form-control" name="rol">
                @foreach($roles as $rol)
                  <option value="{{$rol->id}}">{{$rol->name}}</option>
                @endforeach
              </select>
            </div><br>
            <div class="row">
              <label for="permiso">Permiso</label>
              <select class="form-control" name="permiso">
                @foreach($permisos as $permiso)
                  <option value="{{$permiso->id}}">{{$permiso->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-orange-2">
        <div class="row">
          <div class="col-md-11 col-xs-12">
            <button type="submit" class="btn btn-sm btn-dark" form="rol-permiso">Asignar</button>
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
