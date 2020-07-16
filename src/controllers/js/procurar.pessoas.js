$(document).ready(function () { //Verifica se o documento foi carregado. Caso sim, executa as funções abaixo:

    //associar o evento de clique
    $('#btn_procurar_pessoa').click(function () {
        //validar se o campo de texto possui pelo menos 1 caractere:
        if ($('#nome_pessoa').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não valida!
            // alert($('#nome_pessoa').val());
            $.ajax({
                url: 'js/home/procurar-pessoas/get_pessoas.php',
                method: 'post',
                data: $('#form_procurar_pessoas').serialize(),
                success: function (data) {
                    $('#pessoas').html(data);
                    
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

                    $('.btn_deixar_seguir').click(function () {
                        var id_usuario = $(this).data('id_usuario');

                        $('#btn_seguir_' + id_usuario).show();
                        $('#btn_deixar_seguir_' + id_usuario).hide();

                        $.ajax({
                            url: 'js/home/procurar-pessoas/deixar_seguir.php',
                            method: 'post',
                            data: {
                                deixar_seguir_id_usuario: id_usuario
                            },
                            success: function (data) {
                                alert('Registro removido com sucesso!');
                            }

                        });
                    });
                }
            });
        }
    });
});
