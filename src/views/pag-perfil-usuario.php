<link rel="stylesheet" href="assets/css/hide-sidebar.css">
<link rel="stylesheet" href="assets/css/pag-perfil-usuario.css">


<script src="/js/pag-perfil-usuario.js"></script>

<div class="container">
    <div class="coluna-seguidor">
        <div class="row col-md-8">
            <div class=" ">
                <!-- <div class="col-md-2 coluna-seguidor"> -->

                <!-- tamanho da 2° coluna -->
                <div class="row">
                    <!-- Início (row) da 2° coluna -->
                    <div class="col-md-12 imagem-user" id="imagemUsuario">
                        IMAGEM
                    </div>
                    <!-- </div> Fim (row) da 2° coluna -->
                    <br>
                    <!-- <hr> -->
                    <!-- <div class="row"> -->
                    <!-- Início (row) da 2° coluna -->
                    <div class="col-md-12">
                        <h3>
                            <span id="nomeUsuario" class="imagem-usuario"> </span>

                            <span id="sobrenome" class="imagem-usuario"> </span>
                        </h3>
                    </div>
                    <!-- </div> Fim (row) da 2° coluna -->
                    <hr>

                    <div class="col-md-4">
                        <h6>
                            De
                            <span id="cidade"></span>
                            <span id="uf"></span>

                        </h6>
                    </div>

                    <div class="col-md-4">
                        <h6>
                            Nasceu em
                            <span id="dataNasc"></span>
                        </h6>
                    </div>

                    <!-- <span id="uf"></span> -->

                    <hr>

                    <div id="botoes-seguir">
                        <!-- manipulação do javascript do botão -->
                        botões - seguir - deixar de seguir | ou n 'você' não clicavel quando for o próprio user
                    </div>
                    <hr>
                    <div class="row coluna-seguidor-btn ">
                        <div class="col-md-12 ">
                            <h4><a href="pag-livros.php"> <button type="button" class="btn btn-info btn-block ">VOLTAR </button></h4> </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">

                oiiiii
            </div>
            <!-- </div> -->

            <!-- Fim da 2° coluna -->

            <!-- <div class="row"> -->

            <div class="col-md-12">
                <!-- <div class="col-md-4 coluna-posts info-livro"> -->

                <!-- tamanho da 1° coluna -->
                <!-- 
            <div>
                <h4>Publicações</h4>
            </div>
            <div id="publicacoes">
                Publicações aqui
            </div> -->

                <!-- <hr> -->

                <h4> Posts Recentes </h4>
                <div id="posts">
                    Posts aqui
                </div>
                <hr>
                <h4> Comentários Recentes </h4>
                <div id="coments">
                    Coments aqui
                </div>
                <br>
                <hr>
                </div>

                <div class="row col-md-12">
                <h3>Mural</h3>
                <br>
                <div class="panel panel-default container-visual">
                    <div class="panel-body">
                        <form id="form_post" class="input-group">
                            <input type="text" id="texto_mensagem" name="texto_mensagem" class="form-control" placeholder="Deixe uma mensagem aqui, <?= $_SESSION['usuario']->nome ?>!" maxlength="5000" name="tweet">
                            <span class="input-group-btn ">
                                <button class="btn btn-default container-visual" id="btn_post_mensagem" type="button">POSTAR!</button>
                            </span>
                        </form>
                    </div>
                </div>
                <br>
                <div id="mensagens" class="list-group">
                    <!-- Inserção dos comentários aqui !-->
                    Esse usuário ainda não possui mensagens. Seja o primeiro a deixar uma opinião!
                </div>
                <br>
            </div>
            <!-- <div class="col-md-4 coluna-seguidor"> -->
            <!-- tamanho da 1° coluna -->

            <!-- <div>
                <h4>Publicações</h4>
            </div>
            <hr>
            <div id="publicacoes">
                Publicações aqui
            </div>
        </div> -->

    </div>
</div> <!-- Fim da linha (row) -->


</div> <!-- Fim container -->