<div class="modal fade" id="crear">
  <div class="modal-dialog modal-lg">
    <div class="modal-content form-container">

      <div class="modal-header">
        <h1 class="display-4 form-header"><span class="dark-letter">C</span>rear Cuen<span class="dark-letter">t</span>o</h1>
        <button type="button" class="close float-right" data-dismiss="modal" name="button">
        <span>&times;</span>
      </div>

      @role('escritor')

        @include('cuentos.partials.crear')
        
      @else

        @include('cuentos.partials.crear-validate')

      @endrole

    </div>
  </div>
</div>



@section('scripts')
  <!-- Script para alert -->
  <script type="text/javascript">
    $('.alert').alert()
  </script>
  
  @include('scripts.validar-cuento')
  @include('scripts.caracteres-cuento')

@endsection