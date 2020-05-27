
var id_livro = 0;

alert ("livro.js ready");


$(document).ready(function () { //Verifica se o documento foi carregado. Caso sim, executa as funções abaixo:
    getInfoLivro();
    atualizaPost();

    alert ("ready - metódo doccument linha 11");
});


//associar o evento de clique
$('#btn_post').click(function () {
    //validar se o campo de texto possui pelo menos 1 caractere:
    if ($('#texto_post').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
        // alert($('#texto_post').val());


        var data = $('#form_post').serializeArray();
        data.push({
            name: "id_livro",
            value: id_livro
        });


        $.ajax({
            url: 'inclui_coment.php',
            method: 'post',
            data: $.param(data),
            success: function (data) {
                $('#texto_post').val('');
                atualizaPost(); //(atualizar os) posts assim que forem inseridos (Assíncrono)
                // console.log(data);
            }
        });
    }
});

//Adicionar Livros aos favoritos
$('#btn_favorito').click(function () {
    //validar se o campo de texto possui pelo menos 1 caractere:
    alert(id_livro);

    $.ajax({
        url: 'inclui_favorito.php',
        method: 'post',
        data: {id_livro: id_livro},
        success: function (data) {
            // Aqui posso mudar a estrutura do botão selecionando-o pela classe
            
            // ADICIONAR AOS FAVORITOS
            $('.btn_add_fav').click(function() {
                var id_usuario = $(this).data('id_usuario');

                $('#btn_seguir_' + id_usuario).hide();
                $('#btn_deixar_seguir_' + id_usuario).show();

                $.ajax({
                    url: 'seguir.php',
                    method: 'post',
                    data: {
                        seguir_id_usuario: id_usuario
                    },
                    success: function(data) {
                        // alert(data);
                        alert ("sucesshow!");

                    }
                });
            });
            
            // REMOVER DOS FAVORITOS
            $('.btn_remov_fav').click(function() {
                var id_usuario = $(this).data('id_usuario');

                $('#btn_seguir_' + id_usuario).show();
                $('#btn_deixar_seguir_' + id_usuario).hide();

                $.ajax({
                    url: 'deixar_seguir.php',
                    method: 'post',
                    data: {
                        deixar_seguir_id_usuario: id_usuario
                    },
                    success: function(data) {
                        alert('Registro removido com sucesso!');
                    }

                });
            });

        }
    });
});

function getInfoLivro() { //credo
    var id_livro_local = window.location.search.substring(1).split("=")[1]; //credo
    id_livro = id_livro_local; //credo

    // alert ("ready livrooooo");
    //  alert ( id_livro_local);
    // alert ( id_livro);



    $.ajax({
        url: '../server/controls/getLivro.php',
        method: 'post',
        data: { id_livro: id_livro }, //credo
        success: function (data) {
            let response = JSON.parse(data);
            if (response.success === 1) {
                let livro = response.livro;
                $('#nomeLivro').html(livro.nomeLivro);
                $('#autorTitulo').html(livro.autor);
                $('#descricao').html(livro.descricao);
                $('#author').html(`Autor: ${livro.autor}`);
                $('#lang').html(`Idioma: ${livro.idioma}`);
                $('#fdl').html(`Fora de linha: ${livro.foraDeLinha}`);
                $('#year').html(`Ano da edição: ${livro.ano}`);
                $('#pgNumber').html(`Número de Páginas: ${livro.quantidadePaginas}`);
                $('#edNumber').html(`Número da edição: ${livro.numeroEdicao}`);
                $('#category').html(`Categoria: ${livro.categoria}`);

            } else {
               // alert(response.msg);
               alert("erro ao recuperar");
            }
        }
    });

}

function atualizaPost() {
    //carregar (atualizar os) posts assim que forem inseridos (Assíncrono)

    $.ajax({
        url: '../get_coment.php',
        method: 'post',
        data: { id_livro: id_livro },
        success: function (data) {
            $('#posts').html(data);

            //Excluir Post
            $('.btn_excluir_coment').click(function () {
                var cod_coment = $(this).data('cod_comentario');
                // alert(cod_coment);
                $.ajax({
                    url: '../excluir_coment.php',
                    method: 'post',
                    data: {
                        cod_coment: cod_coment
                    },
                    success: function (data) {
                        alert("Comentário excluído");
                        atualizaPost();
                    }
                });
            });
        }
    });

    alert ("livro.js ready fim do arquivo");

}