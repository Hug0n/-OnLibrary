<script src="/js/pag-livros.js"></script>
<link rel="stylesheet" href="assets/css/button-ocultar-left.css">


<title>Livros Disponíveis</title>

<div class="container ">
    <div class="row ">
        <div class="col-md-7 coluna-posts ">
            <!-- tamanho da 1° coluna -->
            <h3 class="centro"> Títulos </h3>

            <form id="form_procurar_livros" class="input-group">
                <input type="text" id="nome_livro" name="nome_livro" class="form-control" placeholder="Qual livro você está procurando?" maxlength="140" name="tweet">
                <span class="input-group-btn ">
                    <button class="btn btn-info button-procurar " id="btn_procurar_livro" type="button"> <span class="icofont-search-2"></span></button>
                </span>
            </form>

            <hr>
            <div id="div-livros">
                <!--Informações do Livro serão colocadas aqui!-->
            </div>
            <!-- Coluna 1 -->
        </div>
        <div class="col-md-4 coluna-seguidor">
            <!-- tamanho da 2° coluna -->
            <div class="row">
                <!-- Início (row) da 2° coluna -->
                <div class="col-md-6">
                    LIVROS <br>
                    <?php echo "5" ?>
                </div>
                <div class="col-md-6">
                    FAVORITOS <br>
                    <?php echo "2" ?>
                </div>
            </div> <!-- Fim (row) da 2° coluna -->

            <hr hr-size-caixa-1>

            <div class="row coluna-seguidor-btn">
                <div class="col-md-12 ">
                    <a href="pag-sugestao.php" type="button" id="btn_sugestao" class="btn btn-primary btn-block">
                        <span>SUGESTÃO</span>
                    </a>
                </div>
            </div>
        </div><!-- Fim da 2° coluna -->
    </div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->