<!-- Script para validar -->
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 <script>
  $(document).ready(function () {
  $('#form').validate({ // initialize the plugin
      rules: {
          titulo: {
              required: true,
              minlength: 5
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
  });
});
</script>
