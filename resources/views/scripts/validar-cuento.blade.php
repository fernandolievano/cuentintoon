<!-- Script para validar -->
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 <script>
  $(document).ready(function () {
  $('#form').validate({ // initialize the plugin
      rules: {
          titulo: {
              required: true,
              minlength: 5,
          },
          autor: {
              required: true,
              minlength: 3

          },
          descripcion: {
              required: true,
              maxlength: 80

          },
          cover: {
              required: true,
              extension: "jpg|jpeg|png"
          },
      },
      messages: {
        titulo:{
          required: 'El campo título es obligatorio',
          minlength: 'El campo título debe tener al menos 5 caracteres'
        },
        autor:{
          required: 'El campo autor es obligatorio',
          minlength: 'El campo autor debe contener al menos 3 caracteres'
        },
        descripcion:{
          required: 'El campo descripción es obligatorio',
          maxlength: 'El campo descripción debe contener máximo 80 caracteres'
        },
        cover:{
          required: 'El campo foto de portada es obligatorio',
          extension: 'El formato de la imagen no es válido'
        }
      }
  });
});
</script>
