<div class="container ">
    <div class="row ">  
        <div class="col-md-7 coluna-posts ">
            <!-- tamanho da 1° coluna -->
            <form id="form_post" class="input-group">
                <input type="text" id="texto_post" name="texto_post" class="form-control" placeholder="O que está acontecendo agora, <?= $_SESSION['nome'] ?>?" maxlength="140" name="tweet">
                <span class="input-group-btn ">
                    <button class="btn btn-default container-visual" id="btn_post" type="button">POSTAR!</button>
                </span>
            </form>

            <div id="posts" class="list-group">
                Posts aqui no list-group
            </div>
            Coluna 1
        </div>
        <div class="col-md-4 coluna-seguidor">
            <!-- tamanho da 2° coluna -->
            <div class="row">
                <!-- Início (row) da 2° coluna -->
                <div class="col-md-4">
                    POSTS <br>
                    4
                </div>
                <div class="col-md-4">
                    SEGUIDORES <br>
                    5
                </div>
                <div class="col-md-4">
                    SEGUINDO <br>
                    6
                </div>
            </div> <!-- Fim (row) da 2° coluna -->
            <hr hr-size-caixa-1>

            <div class="row coluna-seguidor-btn ">
                <div class="col-md-12 ">
                    <h4><a href="pag-principal.php"> <button type="button" class="btn btn-info btn-block ">Explorar livros </button></h4>
                </div>
            </div>
            <div class="row coluna-seguidor-btn">
                <div class="col-md-12 ">
                    <h4><a href="Procurar_pessoas.php"> <button type="button" class="btn btn-info btn-block ">Procurar por pessoas </button></h4>
                </div>

            </div>
        </div> <!-- Fim da 2° coluna -->
    </div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->
