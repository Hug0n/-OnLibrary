<link rel="stylesheet" href="assets/css/hide-sidebar.css">
<script src="/js/pag-favoritos.js"></script>

<title>Home - Livros Disponíveis</title>

<div class="container">
    <div class="row ">
        <div class="col-md-3 coluna-seguidor">
            <div class="row">
                <!-- Início (row) da 2° coluna -->
                <div class="col-md-6">
                    FAVORITOS <br>
                    <?php echo "5" ?>
                </div>
                <div class="col-md-6">
                    COMENTÁRIOS<br>
                    <?php echo "2" ?>
                </div>
                <div class="col-md-12">
                    CURTIDAS<br>
                    <?php echo "2" ?>
                </div>
            </div> <!-- Fim (row) da 2° coluna -->
            <div id="botoes-livro">
                <!-- manipulação do javascript do botão -->

            </div>
            <hr>
            <div class="row coluna-seguidor-btn ">
                <div class="col-md-12 ">
                    <h4><a href="pag-livros.php"> <button type="button" class="btn btn-info btn-block ">VOLTAR </button></h4> </a>
                </div>
            </div>

        </div> <!-- Fim da 2° coluna -->

        <div class="col-md-7 coluna-posts info-livro">
            <!-- tamanho da 1° coluna -->

            <div>
                <h2>Favoritos de <?= $_SESSION['usuario']->nome ?></h2>
            </div>

            <hr>
            <!-- tamanho da 1° coluna -->
            <div id="div-livros">
                <!--Informações do Livro serão colocadas aqui!-->


            </div>


            <br>
            <hr>
            <h3>Comentários</h3>
            <br>
            <div class="panel panel-default container-visual">
                <div class="panel-body">
                    <form id="form_post" class="input-group">
                        <input type="text" id="texto_post" name="texto_post" class="form-control" placeholder="Compartilhe sua opinião sobre essa página de favoritos, <?= $_SESSION['usuario']->nome ?>!" maxlength="5000" name="tweet">
                        <span class="input-group-btn ">
                            <button class="btn btn-default container-visual" id="btn_post" type="button">COMENTAR!</button>
                        </span>
                    </form>
                </div>
            </div>
            <br>
            <div id="posts" class="list-group">
                <!-- Inserção dos comentários aqui !-->
                Essa página de favoritos ainda não possui comentários. Seja o primeiro a deixar uma opinião!
            </div>
        </div>

    </div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->