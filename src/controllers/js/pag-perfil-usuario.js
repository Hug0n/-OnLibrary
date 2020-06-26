
var id_livro = 0;

// alert("livro.js ready");


$(document).ready(function () {

    var livro; //objeto livro
    var imagemUsuario;

    getInfoUsuario();
    // atualizaComent();


    //associar o evento de clique
    $('#btn_post_mensagem').click(function () {

        if ($('#texto_mensagem').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
            // alert($('#texto_mensagem').val());

            var data = $('#form_post').serializeArray();
            data.push({
                name: "id_usuario",
                value: id_usuario
            });

            $.ajax({
                url: 'js/pag-perfil-usuario/inclui_mensagem.php',
                method: 'post',
                data: $.param(data),
                success: function (data) {
                    $('#texto_mensagem').val('');
                    atualizaMensagem();
                }
            });
        }
    });



    function getInfoUsuario() {
        var id_usuario_local = window.location.search.substring(1).split("=")[1];
        id_usuario = id_usuario_local;

        $.ajax({
            url: 'js/pag-perfil-usuario/getUsuario.php',
            method: 'post',
            data: { id_usuario: id_usuario },
            success: function (data) {

                var response = JSON.parse(data);
                // Takes a well-formed JSON string and returns the resulting JavaScript value.
                // Parse the data with JSON.parse(), and the data becomes a JavaScript object.


                // alert(Object.values(data));

                // var response = $.parseJSON(data);
                // As of jQuery 3.0, $.parseJSON is deprecated. To parse JSON strings use the native JSON.parse method instead.


                // alert(Object.values(response));
                console.log(Object.values(response));

                $('#nomeUsuario').html(response.nomeUsuario);
                $('#sobrenome').html(response.sobrenome);
                $('#dataNasc').html(response.dataNasc);
                $('#sexo').html(`Autor: ${response.sexo}`);
                $('#email').html(`Idioma: ${response.email}`);
                $('#cidade').html(`${response.cidade},`);
                $('#uf').html(`${response.uf}`);
                $('#rua').html(response.rua);
                $('#bairro').html(response.bairro);
                $('#complemento').html(response.complemento);

                $('#telefone').html(response.telefone);
                $('#celular').html(response.celular);



                var imagemUsuario = response.imagemUsuario;

                // atualizaBotoes();


                $.ajax({

                    url: 'js/pag-perfil-usuario/imagem-usuario.php',
                    method: 'post',
                    data: { imagemUsuario: imagemUsuario },
                    success: function (data) {
                        $('#imagemUsuario').html(data);
                    }

                });


                // } else {
                //     alert(response.msg);
                // }
            }
        });

    }


    function atualizaPost() {

        $.ajax({
            url: 'js/pag-perfil-usuario/get_posts_perfil.php',
            method: 'post',
            data: { id_usuario: id_usuario },
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

    atualizaPost()

    
    function atualizaComent() {

        $.ajax({
            url: 'js/pag-perfil-usuario/get_coments_perfil.php',
            method: 'post',
            data: { id_usuario: id_usuario },
            success: function (data) {
                $('#coments').html(data);

                // Excluir Post
                $('.btn_excluir_coment').click(function () {
                    var cod_coment = $(this).data('cod_comentario');

                    $.ajax({
                        url: 'js/livro/excluir_coment.php',
                        method: 'post',
                        data: {
                            cod_coment: cod_coment
                        },
                        success: function (data) {
                            atualizaComent();
                            alert("Comentário excluído");

                        }
                    });
                });
            }
        });
    }
    atualizaComent()



    function atualizaMensagem() {

        $.ajax({
            url: 'js/pag-perfil-usuario/get_mensagens_perfil.php',
            method: 'post',
            data: { id_usuario: id_usuario },
            success: function (data) {
                $('#mensagens').html(data);

                // Excluir Post
                $('.btn_excluir_msg').click(function () {
                    var cod_mensagem = $(this).data('id_mensagem');

                    $.ajax({
                        url: 'js/pag-perfil-usuario/excluir_mensagem.php',
                        method: 'post',
                        data: {
                            cod_mensagem: cod_mensagem
                        },
                        success: function (data) {
                            atualizaComent();
                            alert("Mensagem excluída");
                            atualizaMensagem()

                        }
                    });
                });
            }
        });
    }
    atualizaMensagem()


});

