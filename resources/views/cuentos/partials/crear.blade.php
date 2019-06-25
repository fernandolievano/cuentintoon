        <form action="{{ route('cuentos.store') }}" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="modal-body">

            @include('partials.errors')

            <div class="container-fluid">
              <div class="row justify-content-center">
                <h3>Información del cuento</h3>
              </div>
              <br>
              <div class="row form-items">
                <div class="col-md-12 col-xs-12">
                  <label for="titulo" class="form-label">Título del cuento</label>
                  <input type="text" class="form-input form-control form-control-sm" placeholder="Título original del cuento" required>
                </div>
              </div>
              <div class="row form-items">
                <div class="col-md-12 col-xs-12">
                  <label for="nivel" class="form-label">Dificultad del cuento</label>
                </div>
                <div class="col-md-12 col-xs-12" data-toggle="tooltip" title="Indica a los lectores la complejidad de tu cuento">
                  <div class="form-check form-check-inline">
                    <input type="radio" name="nivel" id="nivel1" class="form-check-input">
                    <label for="nivel1" class="form-check-label">1</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="nivel" id="nivel2" class="form-check-input">
                    <label for="nivel2" class="form-check-label">2</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="nivel" id="nivel3" class="form-check-input">
                    <label for="nivel3" class="form-check-label">3</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="nivel" id="nivel4" class="form-check-input">
                    <label for="nivel4" class="form-check-label">4</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="nivel" id="nivel5" class="form-check-input">
                    <label for="nivel5" class="form-check-label">5</label>
                  </div>
                </div>
              </div>
              <div class="row form-items">
                <div class="col-md-12 col-xs-12">
                  <label for="autor" class="form-label">Autor</label>
                  <input type="text" class="form-control form-input form-control-sm" placeholder="Autor original del cuento" required>
                </div>
              </div>
              <div class="row form-items">
                <div class="col-md-12 col-xs-12">
                <label for="cover" class="form-label">Portada</label>
                <input type="file" name="cover" class="form-control-file" required>
                </div>
              </div>
              <div class="row form-items">
                <div class="col-md-12 col-xs-12">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea name="descripcion" cols="30" rows="3" class="form-input cuentacaracteres form-control form-control-sm" maxlength="80" placeholder="Dale a los lectores una breve descripción de tu cuento..." required></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn form-button" id="btn-validate">¡Crear Cuento!</button>
          </div>
        </form>