
$(document).ready(function () {

    atualizaLivros();
    function atualizaLivros() {
        $.ajax({
            url: 'js/pag-seguidores/get_seguidores.php',
            success: function (data) {
                $('#seguidores').html(data);
            }
        });
    }

});
