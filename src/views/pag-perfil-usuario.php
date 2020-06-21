<link rel="stylesheet" href="assets/css/hide-sidebar.css">
<link rel="stylesheet" href="assets/css/livro.css">


<!-- <script src="/js/livro.js"></script> -->

<div class="container">
    <div class="row ">
        <div class="col-md-2 coluna-seguidor">
            <!-- tamanho da 2° coluna -->
            <div class="row">
                <!-- Início (row) da 2° coluna -->
                <div class="col-md-12">
                    <div id="imagemLivro" class="imagem-livro">

                        Imagem do User

                    </div>
                </div>

            </div> <!-- Fim (row) da 2° coluna -->
            <hr>
            <div id="botoes-livro">
                <!-- manipulação do javascript do botão -->
                botões - seguir - deixar de seguir | ou n 'você' não clicavel quando for o próprio user
            </div>
            <hr>
            <div class="row coluna-seguidor-btn ">
                <div class="col-md-12 ">
                    <h4><a href="pag-livros.php"> <button type="button" class="btn btn-info btn-block ">VOLTAR </button></h4> </a>
                </div>
            </div>

        </div> <!-- Fim da 2° coluna -->

        <div class="col-md-4 coluna-posts info-livro">
            <!-- tamanho da 1° coluna -->

            <div>
                <h4>Publicações</h4>
            </div>
            <div id="publicacoes">
                Publicações aqui
            </div>

            <hr>

            <h4> Posts Recentes </h4>
            <br>
            <div id="posts">
                Posts aqui

            </div>
            <br>
            <hr>
            <h4> Comentários Recentes </h4>

            <br>
            <hr>
            <h3>Comentários</h3>
            <br>
            <div class="panel panel-default container-visual">
                <div class="panel-body">
                    <form id="form_post" class="input-group">
                        <input type="text" id="texto_post" name="texto_post" class="form-control" placeholder="Compartilhe sua opinião sobre o livro, <?= $_SESSION['usuario']->nome ?>!" maxlength="5000" name="tweet">
                        <span class="input-group-btn ">
                            <button class="btn btn-default container-visual" id="btn_post" type="button">COMENTAR!</button>
                        </span>
                    </form>
                </div>
            </div>
            <br>
            <div id="posts" class="list-group">
                <!-- Inserção dos comentários aqui !-->
                Esse livro ainda não possui comentários. Seja o primeiro a deixar uma opinião!
            </div>
        </div>


        <div class="col-md-4 coluna-seguidor">
            <!-- tamanho da 1° coluna -->

            <div>
                <h4>Publicações</h4>
            </div>
            <hr>
            <div id="publicacoes">
                Publicações aqui
            </div>




        </div>

    </div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->