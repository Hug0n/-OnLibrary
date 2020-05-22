
$(document).ready(function () {


    //associar o evento de clique
    $('#btn_inscrevase').click(function () {


        alert("cliquei!!!!!");

        $.ajax({
            url: 'pag-inscrevase.php',
            method: 'post',
            success: function () {
                alert("foi!!!!!");

            }
        });
    });
});

