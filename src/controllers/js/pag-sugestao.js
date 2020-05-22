$(document).ready(function() {
    $('#btn-incluir').click(function() {

        var campo_vazio;
        
        //sugestão
        if ($('#txtSugestao').val() == '') {
            $('#txtSugestao').css({
                'border-color': '#A94442'
            });
            campo_vazio = true;
        } else {
            $('#txtSugestao').css({
                'border-color': '#CCC'
            });
        }

        if (campo_vazio) {
            return false;
            //faz a página subir (facilita pra achar o campo vazio)  jQuery('html, body').animate({scrollTop: 0}, 300);
        }else{
            var txtSugestao = $('#txtSugestao').val();
            
            $.ajax({
                url: 'incluir_sugestao.php',
                method: 'post',
                data: {txtSugestao: txtSugestao},
                success: function(data) {
                    $('#txtSugestao').val('');
                    alert("incluído");
                }
            });
        }


    });
});