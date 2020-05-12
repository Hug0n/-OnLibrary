
$(document).ready(function () { //Verifica se o documento foi carregado. Caso sim, executa as funções abaixo:
    // console.log('opa!!!!')

    //associar o evento de clique
    $('#btn_post').click(function () {
        // validar se o campo de texto possui pelo menos 1 caractere:
        if ($('#texto_post').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
            // alert($('#texto_post').val());
            $.ajax({
                url: 'js/home/inclui_post.php',
                method: 'post',
                data: $('#form_post').serialize(),
                success: function (data) {
                    $('#texto_post').val(''); //esvaziar o post
                    atualizaPost(); //(atualizar os) posts assim que forem inseridos (Assíncrono)
                }
            });
        }

    });

    // });

    function atualizaPost() {
        //carregar (atualizar os) posts assim que forem inseridos (Assíncrono)

        $.ajax({
            url: '/home.post.php',
            success: function (data) {
                $('#posts').html(data);

                // Excluir Post
                $('.btn_excluir').click(function () {
                    var id_post = $(this).data('id_post');

                    $.ajax({
                        url: 'js/home/excluir_post.php',
                        method: 'post',
                        data: {
                            id_post: id_post
                        },
                        success: function (data) {
                            alert("Post excluído");
                            atualizaPost();
                        }
                    });
                });


                // Curtir Post
                $('.btn_curtir').click(function () {
                    var id_post = $(this).data('id_post');

                    $.ajax({
                        url: 'js/home/curtir_post.php',
                        method: 'post',
                        data: {
                            id_post: id_post
                        },
                        success: function (data) {
                            // alert("Curtida incluída");
                            atualizaPost();

                        }
                    });
                });

                // DESCurtir Post
                $('.btn_descurtir').click(function () {
                    var id_post = $(this).data('id_post');

                    $.ajax({
                        url: 'js/home/excluir_curtida.php',
                        method: 'post',
                        data: {
                            id_post: id_post
                        },
                        success: function (data) {
                            // alert("Post descurtido!");
                            atualizaPost();
                        }
                    });
                });
            }
        });
    }
    atualizaPost();


});







		//Colocar como vazio o campo input, após submeter as informações.



		// Função que atualizará a div de tweets no momento de carregamento da página (document).ready

		//Carregar os tweets
		//Semelhante a função do INNERHTML do javascript // Estamos atribuindo como se fosse um filho da DIV
