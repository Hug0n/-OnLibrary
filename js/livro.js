
var id_livro = 0;

$(document).ready(function () { //Verifica se o documento foi carregado. Caso sim, executa as funções abaixo:
    getInfoLivro();
    atualizaPost();
});


//associar o evento de clique
$('#btn_post').click(function () {
    //validar se o campo de texto possui pelo menos 1 caractere:
    if ($('#texto_post').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
        alert($('#texto_post').val());


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
                alert(data);
                console.log(data);
            }
        });
    }
});

function getInfoLivro() { //credo
    var id_livro_local = window.location.search.substring(1).split("=")[1]; //credo
    id_livro = id_livro_local; //credo

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
                $('#edNumber').html(`Número da edição: ${livro.quantidadePaginas}`);
                $('#category').html(`Categoria: ${livro.quantidadePaginas}`);

            } else {
                alert(response.msg);
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
        }
    });
}