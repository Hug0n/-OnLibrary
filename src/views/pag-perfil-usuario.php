<link rel="stylesheet" href="assets/css/hide-sidebar.css">
<link rel="stylesheet" href="assets/css/pag-perfil-usuario.css">


<script src="/js/pag-perfil-usuario.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-3 coluna-seguidor">
            <div class="row">
                <!-- tamanho da 2° coluna -->
                <div class="col-md-12">
                    <!-- Início (row) da 2° coluna -->
                    <div class="col-md-12 imagem-user" id="imagemUsuario">
                        IMAGEM
                    </div>
                </div>
            </div>
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

            <div class="col-md-12">
                <h6>
                    De
                    <span id="cidade"></span>
                    <span id="uf"></span>

                </h6>
            </div>

            <div class="col-md-12">
                <h6>
                    Nasceu em
                    <span id="dataNasc"></span>
                </h6>
            </div>

            <!-- <span id="uf"></span> -->

            <!-- <hr> -->

            <div id="botoes-seguir">
            </div>
            <hr>
            <div class="row coluna-seguidor-btn ">
                <div class="col-md-12 ">
                    <h4><a href="pag-livros.php"> <button type="button" class="btn btn-info btn-block ">Voltar para os livros </button></h4> </a>
                </div>
            </div>
        </div>

        <div class="col-md-7 coluna-posts info-livro">

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
                <!-- Inserção das mensagens aqui !-->
                Esse usuário ainda não possui mensagens. Seja o primeiro a deixar uma opinião!
            </div>
            <br>
            <hr>
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
        </div>







    </div>

</div>
</div> <!-- Fim da linha (row) -->


</div> <!-- Fim container -->