<link rel="stylesheet" href="assets/css/hide-sidebar.css">
<link rel="stylesheet" href="assets/css/livro.css">


<script src="/js/livro.js"></script>

<div class="container">
    <div class="row ">
        <div class="col-md-3 coluna-seguidor">
            <!-- tamanho da 2° coluna -->
            <div class="row">
                <!-- Início (row) da 2° coluna -->
                <div class="col-md-12">
                    <div id="imagemLivro" class="imagem-livro">

                        <!-- Imagem do livro -->

                    </div>
                </div>

            </div> <!-- Fim (row) da 2° coluna -->
            <hr>
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
                <h2 id="nomeLivro">Nome do Livro</h2>
            </div>
            <div>
                <h4 id="autorTitulo">Autor</h4>
            </div>
            <hr>
            <h4> Descrição </h4>
            <br>
            <div id="descricao" class="fonte-descricao-livro">
            </div>
            <br>
            <hr>
            <h4> Características </h4>
            <table class="centralizar">
                <br>
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

    </div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->