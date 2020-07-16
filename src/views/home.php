<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/home.posts.css">
<link rel="stylesheet" href="assets/css/button-ocultar-left.css">

<!-- <link rel="stylesheet" href="assets/css/hide-sidebar.css"> -->

<script src="/js/home.post.js"></script>

<?php
require_once(realpath(CONTROLLER_PATH . '/QtdPosts.php'));
?>

<div class="container">
    <div class="row ">
        <div class="col-md-7 coluna-posts ">
            <!-- tamanho da 1° coluna -->
            <form id="form_post" class="input-group">
                <input type="text" id="texto_post" name="texto_post" class="form-control" placeholder="O que está acontecendo agora, <?= $_SESSION['usuario']->nome ?>?" maxlength="140" name="tweet">
                <span class="input-group-btn ">
                    <button class="btn btn-default container-visual" id="btn_post" type="button">POSTAR!</button>
                </span>
            </form>

            <div id="posts" class="list-group">
                <?php

                // require_once(realpath(VIEW_PATH . '/home.post.php'));

                ?>
            </div>
            <!-- Coluna 1 -->
        </div>
        <div class="col-md-4 coluna-seguidor">
            <!-- tamanho da 2° coluna -->
            <div class="row">
                <!-- Início (row) da 2° coluna -->
                <div class="col-md-4">
                    POSTS <br>
                    <?php echo $qtd_posts ?>
                </div>
                <div class="col-md-4">
                    SEGUIDORES <br>
                    <?php echo $qtd_seguidores ?>
                </div>
                <div class="col-md-4">
                    SEGUINDO <br>
                    <?php echo $qtd_seguindo ?>
                </div>
            </div> <!-- Fim (row) da 2° coluna -->
            <hr hr-size-caixa-1>

            <div class="row coluna-seguidor-btn ">
                <div class="col-md-12 ">
                    <h6><a href="pag-livros.php"> <button type="button" class="btn btn-info btn-block ">Explorar Livros</button></h6>
                </div>
            </div>
            <div class="row coluna-seguidor-btn">
                <div class="col-md-12 ">
                    <h4><a href="home.procurar-pessoas.php"> <button type="button" class="btn btn-info btn-block ">Procurar Pessoas</button></h4>
                </div>

            </div>
        </div> <!-- Fim da 2° coluna -->
    </div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->