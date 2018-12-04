<!-- Nivelar height de columnas -->
<script>
/*col-4 misma altura*/
$(document).ready(function() {
    var heights = $(".col-sm-4").map(function() {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    $(".col-sm-4").height(maxHeight);
});

$(document).ready(function() {
    var heights = $(".card-content").map(function() {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    $(".card-content").height(maxHeight);
});

</script>
