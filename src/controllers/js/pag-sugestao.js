$(document).ready(function () {
    $('#btn-incluir').click(function () {

        var txtSugestao = $('#txtSugestao').val();

        $.ajax({
            url: 'js/pag-sugestao/incluir_sugestao.php',
            method: 'post',
            data: { txtSugestao: txtSugestao },
            success: function (data) {
                alert("Sua sugestão foi incluída com sucesso e em breve será analisada! ;)");
            }
        });
    });
});