<div class="modal fade" id="create-permiso">
  <div class="modal-dialog">
    {!! Form::open(['id' => 'nuevo-permiso', 'route' => 'admin.store.permiso']) !!}
    <div class="modal-content border-orange-1">
      <div class="modal-header bg-orange-2 text-light">
        <h1>Nuevo Permiso</h1>
        <button type="button" class="close float-right" data-dismiss="modal" name="button">
        <span>&times;</span>
      </div>

      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-md-11 col-xs-12">
            <div class="row">
              {!! Form::label('name', 'Permiso', []) !!}
              {!! Form::text('name', '', ['class' => 'form-control form-control-sm', 'placeholder' => 'Crear Cuento', 'required']) !!}
            </div><br>
            <div class="row">
              {!! Form::label('slug', 'Slug', []) !!}
              {!! Form::text('slug', '', ['class' => 'form-control form-control-sm', 'placeholder' => 'crear.cuento', 'required']) !!}
            </div><br>
            <div class="row">
              {!! Form::label('description', 'Descripción*', []) !!}
              {!! Form::textarea('description', '', ['class' => 'form-control form-control-sm', 'rows' => '3', 'placeholder' => 'Breve descripción']) !!}
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer bg-orange-2">
        {!! Form::submit('Nuevo Permiso', ['class' => 'btn btn-light btn-sm', 'form' => 'nuevo-permiso']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
