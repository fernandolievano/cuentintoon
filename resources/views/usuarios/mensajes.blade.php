@if (session('status'))

<div class="alert alert-success col-md-12 col-sm-12 col-xs-12 text-center" role="alert">
  {{ session('status') }}
</div>

@endif

@if (session('aprobado'))
<div class="container message-top">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">
        <h3 class="text-success text-center">¡Felicidades, aprobaste!</h3>
      </div>
      <div class="card-body">
        <strong class="text-center"> {{ session('aprobado') }} </strong>
      </div>
    </div>
  </div>
</div>
@endif

@if (session('reprobado'))
<div class="container message-top">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">
        <h3 class="text-danger text-center">Lo sentimos...</h3>
      </div>
      <div class="card-body">
        <strong class="text-center"> {{ session('reprobado') }} </strong>
      </div>
    </div>
  </div>
</div>
@endif