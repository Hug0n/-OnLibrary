<?php

session_start();

if (!isset($_SESSION['email'])) { //Se o indíce do SESSION não existir(ou seja, caso o usuário NÃO passe pelo processo de autenticação no if da linha 37 do validar_acesso.php), será encaminhado para a página inicial de erro.
    header('Location: index.php?erro=1');
}

require_once('class.db.php');

$objDB = new db();
$link = $objDB->conecta_mysql();
$id_usuario = $_SESSION['id_usuario'];

//--qtd de favoritos
$sql = "SELECT COUNT(*) AS qtde_favoritos FROM livro_favorito WHERE id_usuario_favorito  = $id_usuario";

$resultado_id = mysqli_query($link, $sql);

$qtde_favoritos = 0;

if ($resultado_id) {
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

    $qtde_favoritos = $registro['qtde_favoritos'];
} else {
    echo 'Erro ao executar a Query qtd_tweets';
}

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <title>OnLibrary</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- CSS da página -->
    <link rel="stylesheet" type="text/css" href="css/home.css">

    <!-- Javascript-->
    <script type="text/javascript">
        $(document).ready(function() { //Verifica se o documento foi carregado. Caso sim, executa as funções abaixo:

            //associar o evento de clique
            $('#btn_post').click(function() {
                //validar se o campo de texto possui pelo menos 1 caractere:
                if ($('#texto_post').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
                    //alert($('#texto_post').val());
                    $.ajax({
                        url: 'inclui_post.php',
                        method: 'post',
                        data: $('#form_post').serialize(),
                        success: function(data) {
                            $('#texto_post').val('');
                            atualizaPost(); //(atualizar os) posts assim que forem inseridos (Assíncrono)
                        }
                    });
                }
            });

            function atualizaPost() {
                //carregar (atualizar os) posts assim que forem inseridos (Assíncrono)

                $.ajax({
                    url: 'get_favorito.php',
                    success: function(data) {
                        $('#posts').html(data);

                        //Excluir Post
                        $('.btn_excluir').click(function() {
                            var id_post = $(this).data('id_post');

                            $.ajax({
                                url: 'excluir_post.php',
                                method: 'post',
                                data: {
                                    id_post: id_post
                                },
                                success: function(data) {
                                    alert("Post excluído");
                                    atualizaPost();

                                }
                            });
                        });
                    }
                });
            }
            atualizaPost();
        });

    </script>


</head>

<body class="back-color">

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top color-nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" method="post">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="imagens/livro-aberto1.png" class="img-logo" />
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php">Voltar para Home</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>


    <div>
        <div class="col-md-4">
            <div class="panel panel-default container-visual">
                <div class="panel-body container-caixa-1">
                    <h5 style="text-align: center">Aqui você encontra os seus melhores livros, <?= $_SESSION['nome'] ?></h5>

                    <hr>
                    <div class="col-md-3 caixa-meus-livros" style="text-align: center">
                        <span style="text-align: center"> FAVORITOS </span></br> <?= $qtde_favoritos ?>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-5 ">
            <div class="panel panel-default container-visual">
                <div class="panel-body">
                    <h4 style="text-align: center "> Meus Favoritos </h4>
                </div>
            </div>

            <div id="posts" class="list-group">

            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default container-visual">
                <div class="panel-body">
                    <h4><a href="pag-principal.php"> <button type="button" class="btn btn-info btn-block">Explorar livros </button></h4>
                    <hr hr-size-caixa-1>
                    <h4><a href="home.procurar-pessoas.php"> <button type="button" class="btn btn-info btn-block">Procurar por pessoas </button></h4>
                </div>
            </div>
        </div>


    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>