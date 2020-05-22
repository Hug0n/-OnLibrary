$(document).ready(function () {



    $('#btn-cadastrar').click(function () {
                alert('sucess')

        $.ajax({
            url: 'cadastrar-user.php',
            method: 'post',
            data: $('#formCadastro').serialize(),
            success: function (data) {

                //após o elemento 'botão_seguir' existir, iremos executar o script à seguir:
                $('.btn_seguir').click(function () {
                    var id_usuario = $(this).data('id_usuario');

                    $('#btn_seguir_' + id_usuario).hide();
                    $('#btn_deixar_seguir_' + id_usuario).show();

                    $.ajax({
                        url: 'js/home/procurar-pessoas/seguir.php',
                        method: 'post',
                        data: {
                            seguir_id_usuario: id_usuario
                        },
                        success: function (data) {
                        }
                    });
                });

            }
        });

        /////////////////////////////////////////////

        // var campo_vazio;
        // //NOME
        // if ($('#nome').val() == '') {
        //     $('#nome').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#nome').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //SOBRENOME
        // if ($('#sobrenome').val() == '') {
        //     $('#sobrenome').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#sobrenome').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //DATA DE NASCIMENTO
        // if ($('#nascimento').val() == '') {
        //     $('#nascimento').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#nascimento').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //SEXO
        // if ($('#sexo').val() == '') {
        //     $('#sexo').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#sexo').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //E-MAIL
        // if ($('#email').val() == '') {
        //     $('#email').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#email').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //CIDADE
        // if ($('#cidade').val() == '') {
        //     $('#cidade').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#cidade').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //UF
        // if ($('#uf').val() == '') {
        //     $('#uf').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#uf').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //RUA
        // if ($('#rua').val() == '') {
        //     $('#rua').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#rua').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //BAIRRO
        // if ($('#bairro').val() == '') {
        //     $('#bairro').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#bairro').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //COMPLEMENTO
        // if ($('#complemento').val() == '') {
        //     $('#complemento').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#complemento').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //TELEFONE
        // if ($('#telefone').val() == '') {
        //     $('#telefone').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#telefone').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // //CELULAR
        // if ($('#celular').val() == '') {
        //     $('#celular').css({
        //         'border-color': '#A94442'
        //     });
        //     campo_vazio = true;
        // } else {
        //     $('#celular').css({
        //         'border-color': '#CCC'
        //     });
        // }

        // if (campo_vazio) {
        //     return false;
        //     //faz a página subir (facilita pra achar o campo vazio)  jQuery('html, body').animate({scrollTop: 0}, 300);
        // }



    });
});
