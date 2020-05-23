$(document).ready(function () {

    $('#btn-cadastrar').click(function () {

        var campo_vazio;
        //NOME
        if ($('#nome').val() == '') {
            $('#nome').css({
                'border': '2px solid #A94442'

                // 'border-color': '#A94442'
            });
            campo_vazio = true;
        } else {
            $('#nome').css({
                'border-color': '#CCC'
            });
        }

        //SOBRENOME
        if ($('#sobrenome').val() == '') {
            $('#sobrenome').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#sobrenome').css({
                'border-color': '#CCC'
            });
        }

        //DATA DE NASCIMENTO
        if ($('#nascimento').val() == '') {
            $('#nascimento').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#nascimento').css({
                'border-color': '#CCC'
            });
        }

        //SEXO
        if (!$("input[name='genero']:checked").length) {
            $('#genero').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#genero').css({
                'border-color': '#CCC'
            });
        }

        //E-MAIL
        if ($('#senha').val() == '') {
            $('#senha').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#senha').css({
                'border-color': '#CCC'
            });
        }

        //SENHA
        if ($('#email').val() == '') {
            $('#email').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#email').css({
                'border-color': '#CCC'
            });
        }

        //CIDADE
        if ($('#cidade').val() == '') {
            $('#cidade').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#cidade').css({
                'border-color': '#CCC'
            });
        }

        //UF
        if ($('#uf').val() == '') {
            $('#uf').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#uf').css({
                'border-color': '#CCC'
            });
        }

        //RUA
        if ($('#rua').val() == '') {
            $('#rua').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#rua').css({
                'border-color': '#CCC'
            });
        }

        //BAIRRO
        if ($('#bairro').val() == '') {
            $('#bairro').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#bairro').css({
                'border-color': '#CCC'
            });
        }

        //COMPLEMENTO
        if ($('#complemento').val() == '') {
            $('#complemento').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#complemento').css({
                'border-color': '#CCC'
            });
        }

        //TELEFONE
        if ($('#telefone').val() == '') {
            $('#telefone').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#telefone').css({
                'border-color': '#CCC'
            });
        }

        //CELULAR
        if ($('#celular').val() == '') {
            $('#celular').css({
                'border': '2px solid #A94442'
            });
            campo_vazio = true;
        } else {
            $('#celular').css({
                'border-color': '#CCC'
            });
        }

        if (campo_vazio) {
            return false;
            //faz a página subir (facilita pra achar o campo vazio)  jQuery('html, body').animate({scrollTop: 0}, 300);
        }



    });
});
