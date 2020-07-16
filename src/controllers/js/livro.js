
var id_livro = 0;

// alert("livro.js ready");


$(document).ready(function () {

    var livro; //objeto livro
    var imagemLivro;

    getInfoLivro();
    atualizaComent();


    //associar o evento de clique
    $('#btn_post').click(function () {

        if ($('#texto_post').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
            // alert($('#texto_post').val());

            var data = $('#form_post').serializeArray();
            data.push({
                name: "id_livro",
                value: id_livro
            });

            $.ajax({
                url: 'js/livro/inclui_coment.php',
                method: 'post',
                data: $.param(data),
                success: function (data) {
                    $('#texto_post').val('');
                    atualizaComent();
                }
            });
        }
    });

    // getFavoritos aqui, dps chamo os buttons

    function atualizaBotoes() {

        // var livros = JSON.parse(livro);
        // alert(livros);
        // alert(Object.values(livros));

        $.ajax({
            url: '/js/livro/livro-favorito/livro-botoes.php',
            method: 'post',
            data: { id_livro: id_livro },
            success: function (data) {
                $('#botoes-livro').html(data);
                // alert(Object.values(livro));

                $('#btn_addfavorito').click(function () {

                    $.ajax({

                        url: '/js/livro/livro-favorito/inclui_favorito.php',
                        method: 'post',
                        data: { id_livro: id_livro },
                        success: function (data) {
                            // Aqui posso mudar a estrutura do botão selecionando-o pela classe

                            // ADICIONAR AOS FAVORITOS
                            $('#btn_addfavorito').hide();
                            $('#btn_removerfavorito').show();
                        }
                    });
                });

                // REMOVER DOS FAVORITOS
                $('#btn_removerfavorito').click(function () {

                    $.ajax({
                        url: '/js/livro/livro-favorito/excluir_favorito.php',
                        method: 'post',
                        data: { id_livro: id_livro },
                        success: function (data) {
                            // Aqui posso mudar a estrutura do botão selecionando-o pela classe

                            // ADICIONAR AOS FAVORITOS
                            $('#btn_removerfavorito').hide();
                            $('#btn_addfavorito').show();
                        }
                    });
                });
            }
        });
    }

    function getInfoLivro() { //credo
        var id_livro_local = window.location.search.substring(1).split("=")[1]; //credo
        id_livro = id_livro_local; //credo

        // alert ("ready livrooooo");
        //  alert ( id_livro_local);
        // alert ( id_livro);

        $.ajax({
            url: 'js/livro/getLivro.php',
            method: 'post',
            data: { id_livro: id_livro }, //credo
            success: function (data) {
                // alert(id_livro)

                // var objteste = { fdfdfoo: "bar", baz: 42 };
                // console.log(Object.values(objteste));

                var response = JSON.parse(data);
                // Takes a well-formed JSON string and returns the resulting JavaScript value.
                // Parse the data with JSON.parse(), and the data becomes a JavaScript object.


                // alert(Object.values(data));

                // var response = $.parseJSON(data);
                // As of jQuery 3.0, $.parseJSON is deprecated. To parse JSON strings use the native JSON.parse method instead.


                // alert(Object.values(response));
                // console.log(Object.values(response));


                if (response.success == 1) {
                    // alert("entrou aqui NO LIVROwwwwwwwwwwwwwwww!!!!")

                    // livro = response.livro;

                    $('#nomeLivro').html(response.nomeLivro);
                    $('#autorTitulo').html(response.autor);
                    $('#descricao').html(response.descricao);
                    $('#author').html(`Autor: ${response.autor}`);
                    $('#lang').html(`Idioma: ${response.idioma}`);
                    $('#fdl').html(`Fora de linha: ${response.foraDeLinha}`);
                    $('#year').html(`Ano da edição: ${response.ano}`);
                    $('#pgNumber').html(`Número de Páginas: ${response.quantidadePaginas}`);
                    $('#edNumber').html(`Número da edição: ${response.numeroEdicao}`);
                    $('#category').html(`Categoria: ${response.categoria}`);

                    var imagemLivro = response.imagemLivro;

                    atualizaBotoes();


                    $.ajax({

                        url: 'js/livro/imagem-livro.php',
                        method: 'post',
                        data: { imagemLivro: imagemLivro }, //credo
                        success: function (data) {
                            $('#imagemLivro').html(data);
                        }

                    });


                } else {
                    alert(response.msg);
                }
            }
        });

    }


    function atualizaComent() {

        $.ajax({
            url: 'js/livro/get_coment.php',
            method: 'post',
            data: { id_livro: id_livro },
            success: function (data) {
                $('#posts').html(data);

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


});

