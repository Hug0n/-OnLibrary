
$(document).ready(function () { 

    atualizaLivros(); 

    function atualizaLivros() {
        $.ajax({
            url: 'js/pag-livros/get_livros.php',
            success: function (data) {
                $('#div-livros').html(data);
            }
        });
    }
    atualizaPost();
});
