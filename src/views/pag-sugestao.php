<link rel="stylesheet" href="assets/css/hide-sidebar.css">


<div class="container">
    <div class="row ">
        <div class="col-md-7 coluna-posts ">
            <!-- tamanho da 1° coluna -->

            <h3 class="centro">Sugestões</h3>

            <form method="POST" id="formSugestao">

                <div class="row">
                    <!-- ROW 1 - 1° coluna - Início !-->
                    <div class="col-md-12 form-group">
                        <h5> Contribua para o nosso crescimento sugerindo livros e melhorias.<br></h5>
                        <hr>

                        <span class="span-test"> Caso seja uma sugestão de livro, escreva-a no formato abaixo:<br>
                            Nome do Livro:<br>
                            Autor:<br>
                            Comentário sobre o livro:</br><textarea id="txtSugestao" rows="10" cols="70"></textarea>
                            
                        </span>

                    </div>
                </div>
                <!-- ROW 1 - 1° coluna - FIM !-->
                

                </br>
                <button type="submit" class="btn btn-primary foorm-control-1 " id="btn-incluir">Enviar</button>
                </br>

                </br>
            </form>


            <!-- Coluna 1 -->
        </div>
        <div class="col-md-4 coluna-seguidor">
            <!-- tamanho da 2° coluna -->
            <div class="row">
                <!-- Início (row) da 2° coluna -->
                <div class="col-md-6">
                    SUGESTÕES RECEBIDAS <br>
                   10 <?php ?>
                </div>
                <div class="col-md-6">
                    SUGESTÕES ATENDIDAS <br>
                   10 <?php ?>
                </div>
                
            </div> <!-- Fim (row) da 2° coluna -->
            <hr hr-size-caixa-1>

            <div class="row coluna-seguidor-btn ">
                <div class="col-md-12 ">
                    <h4><a href="pag-livros.php"> <button type="button" class="btn btn-info btn-block ">Explorar livros </button></h4>
                </div>
            </div>
            <div class="row coluna-seguidor-btn">
                <div class="col-md-12 ">
                    <h4><a href="home.procurar-pessoas.php"> <button type="button" class="btn btn-info btn-block ">Procurar pessoas </button></h4>
                </div>

            </div>
        </div> <!-- Fim da 2° coluna -->
    </div>
</div>