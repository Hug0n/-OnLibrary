<?php

session_start();
//É fundamental que inicializarmos a session no documento se formos usarmos ela


if (!isset($_SESSION['email'])) { //Se o indíce do SESSION não existir(ou seja, caso o usuário NÃO passe pelo processo de autenticação no if da linha 37 do validar_acesso.php), será encaminhado para a página inicial de erro.
	header('Location: index.php?erro=1');
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

</head>

<body class="back-color">

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top color-nav">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar" method="post">
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

    <!--Início Container -->
    <div class="container">

        <div class="col-md-3">
            <div class="panel panel-default container-visual">
                <div class="panel-body">

                    <h1> Imagem livro</h1>

                    <hr>

                    <div>
                    <button type="button" class="btn btn-warning btn-block" id="btn_favorito">ADICIONAR AOS FAVORITOS +</button>           
                    </div>
                    <div>
                    <button type="button" class="btn btn-success btn-block">ALUGAR</button>
                    </div>
                    <div>
                    <button type="button" class="btn btn-info btn-block">COMPRAR</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 panel panel-default container-visual ">
            <div>
                <h2 id="nomeLivro"></h2>
            </div>
            <div>
                <h3 id="autorTitulo"></h3>
            </div>
            <hr class="hrr">
            <h4> Descrição </h4>
            <br>
            <div id="descricao">
            </div>
            <br>
            <hr>
            <h4> Características </h4>
            <table style="margin-top: 10px">
                <tr>
                    <td id="author" style="border-bottom: 1px solid grey; border-spacing: 10px">
                    </td>
                </tr>
                <tr>
                    <td id="lang" style="border-bottom: 1px solid grey">
                    </td>
                </tr>
                <tr>
                    <td id="fdl" style="border-bottom: 1px solid grey">
                    </td>
                </tr>
                <tr>
                    <td id="year" style="border-bottom: 1px solid grey">
                    </td>
                </tr>
                <tr>
                    <td id="pgNumber" style="border-bottom: 1px solid grey">
                    </td>
                </tr>
                <tr>
                    <td id="edNumber" style="border-bottom: 1px solid grey">
                    </td>
                </tr>
                <tr>
                    <td id="category" style="border-bottom: 1px solid grey">
                    </td>
                </tr>
            </table>
            <br>
            <hr>
            <h3>Comentários</h3>
            <br>
            <div class="panel panel-default container-visual">
                <div class="panel-body">
                    <form id="form_post" class="input-group">
                        <input type="text" id="texto_post" name="texto_post" class="form-control"
                            placeholder="Compartilhe sua opinião sobre o livro, <?= $_SESSION['nome'] ?>!"
                            maxlength="5000" name="tweet">
                        <span class="input-group-btn ">
                            <button class="btn btn-default container-visual" id="btn_post"
                                type="button">COMENTAR!</button>
                        </span>
                    </form>
                </div>
            </div>

            <div id="posts" class="list-group">
                <!-- Inserção dos comentários aqui !-->
            </div>

        </div>

        <div class="col-md-3">
            <div class="panel panel-default container-visual">
                <div class="panel-body">
                    <h4><a href="pag-principal.php"> <button type="button" class="btn btn-info btn-block">Explorar livros </button></h4>
                    <hr hr-size-caixa-1>
                    <h4><a href="Procurar_pessoas.php"> <button type="button" class="btn btn-info btn-block">Procurar por pessoas </button></h4>
                </div>
            </div>
        </div>

    </div> <!-- fim container !-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/livro.js"></script>

</body>

</html>