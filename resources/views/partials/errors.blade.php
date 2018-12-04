<!-- Errores de validación backend -->
<div class="validate">

  @if(count($errors) > 0)

  <div class="alert alert-danger validate-error alert-dismissible fade show" role="alert">

    <ul style="list-style-type: none;">
      @foreach($errors->all() as $error)

      <li>{{$error}}</li>
      
      @endforeach
    </ul>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>

  </div>

    @endif

  </div>
        <!-- Fin errores  -->