
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

    $('#btn_procurar_livro').click(function () {
        if ($('#nome_livro').val().length > 0) {
            // alert($('#nome_livro').val());
            $.ajax({
                url: 'js/pag-livros/procurar-livros/get_procurar_livros.php',
                method: 'post',
                data: $('#form_procurar_livros').serialize(),
                success: function (data) {
                    // alert ('oi')
                    $('#div-livros').html(data);
                    $('#nome_livro').val('');

                }
            });
        } else {
            atualizaLivros();
        }
    });

    atualizaPost();
});
