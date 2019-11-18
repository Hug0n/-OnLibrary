<?php

session_start();

$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

$erro_cadastro = isset($_GET['erro_cadastro']) ? $_GET['erro_cadastro'] : 0;


?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <title>Sugestão</title>

    <!-- ícone da aba -->
    <link rel="icon" href="imagens/contato.png">

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/inscrevase.css">

    <script>
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
    </script>

</head>

<body class="back-color">

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top color-nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="img-logo"></span>
                <span class="titulo span-test">OnLibrary</span>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="pag-principal.php">Voltar</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <h3 class="centro">Sugestão</h3>

    <div class="container container-visual" >
        <!-- INÍCIO CONTAINER !-->
        <br />
        <form method="POST" id="formSugestao">

            <div class="row" >
                <!-- ROW 1 - 1° coluna - Início !-->
                <div class="col-md-10 form-group" >
                    <h4 > Você pode sempre aumentar a qualidade dos serviços do OnLibrary dando sugestões! Todas são bem vindas!<br></h4>
                    <hr>


                    <span class="span-test"> Caso seja uma sugestão de livro escreva no formato abaixo:<br>
                        Nome do Livro:<br>
                        Autor:<br>
                        Comentário sobre o livro:</br><textarea id="txtSugestao" rows="10" cols="70"></textarea>
                        <?php
                        if ($erro_email) {
                            echo '<font style="color:#FF0000"> E-mail já existe! </font>';
                            $erro_cadastro = 3;
                        }
                        ?>
                    </span>

                </div>
            </div>
            <!-- ROW 1 - 1° coluna - FIM !-->

            </br>
            <button type="submit" class="btn btn-primary foorm-control-1 " id="btn-incluir">Enviar</button>
            </br>
            <?php
            //echo $erro_cadastro;
            if ($erro_cadastro == 1) {
                echo '<font style="color:#FF0000"> Cadastro não foi salvo com sucesso! Tente novamente. </font>';
            } else if ($erro_cadastro == 0) {
                // echo '<font style="color:#FF0000"> Cadastro salvo com sucesso! </font>';
            } else {
                echo '<font style="color:#FF0000"> </font>';
            }
            $erro_cadastro = 3;
            ?>
            </br>
        </form>
    </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>