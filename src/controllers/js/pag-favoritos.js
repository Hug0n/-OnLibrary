$(document).ready(function () {

    var id_favorito_local = window.location.search.substring(1).split("=")[1]; //credo
    id_favorito = id_favorito_local;

    // atualizaLivros(); 

    function atualizaLivros() {

        $.ajax({
            url: 'js/pag-favoritos/get_favoritos.php',
            method: 'post',
            data: { id_favorito: id_favorito },
            success: function (data) {
                $('#div-livros').html(data);


                // REMOVER DOS FAVORITOS
                $('.btn_excluir').click(function () {
                    var id_livro = $(this).data('id_livro');

                    $.ajax({
                        url: '/js/pag-favoritos/excluir-pag-fav.php',
                        method: 'post',
                        data: { id_livro: id_livro, id_favorito: id_favorito },
                        success: function (data) {
                            // Aqui posso mudar a estrutura do botão selecionando-o pela classe

                            atualizaLivros();

                        }
                    });
                });
            }
        });
    }
    atualizaLivros();
});
