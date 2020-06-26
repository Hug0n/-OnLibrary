<link rel="stylesheet" type="text/css" href="assets/css/editar-perfil.css">
<link rel="stylesheet" href="assets/css/button-ocultar-left.css">


<div class="container ">
    </br>

    <h3 class=" centro">Cadastrar Livro</h3>

    <div class="row col-md-10 coluna-posts">

        <!-- ////////////////////////////// -->
        <!-- ROW 1 - 1° coluna - Início !-->

        <form method="POST" action="cadastrar-livro.php" enctype="multipart/form-data" id="formCadastro">

            <div class="form-group ">
                <span class="   form-tam-intermed ">Nome do livro </br> <input type="text" class="form-control " name="nome" id="nome"> </span>

                <span class="form-tam-intermed"> Autor</br> <input type="text" class="form-control" name="autor" id="autor"></span>

                
                <span class="form-tam-intermed"> Categoria</br> <input type="text" class="form-control" name="categoria" id="categoria"></span>

                </p>
                <span> Sinopse </br>
                <textarea id="sinopse" name="sinopse" rows="2%" cols="90%">

                </textarea></span>

                </p>

                <span class="form-tam-pequeno"> Ano </br><input type="date" class="form-control " name="ano" id="ano"></span>

                <span class="form-tam-intermed"> Link para Compra </br> <input type="text" class="form-control" name="linkComprar" id="linkComprar"></span>


                <span class="form-tam-pequeno" id="foradelinha"> Fora de Linha <br />
                    <input type="radio" name="foradelinha" value="Sim" id="foradelinha-H"> Sim
                    <input type="radio" name="foradelinha" value="Não" id="foradelinha-F"> Não </span>

                    
                </p>
                
                Capa:<br>
                <input type="file" name="capa">
                </p>

                <span class="form-tam-intermed"> Idioma </br> <input type="text" class="form-control" name="idioma" id="idioma"></span>

                <span class="form-tam-intermed"> Edição </br> <input type="text" class="form-control" name="edicao" id="edicao"></span>

                <span class="form-tam-intermed"> Quantidade de Páginas </br> <input type="text" class="form-control" name="qtdpaginas" id="qtdpaginas"></span>

                </br>
                </br>

                <button type="submit" class="btn btn-primary " id="btn-cadastrar">Cadastrar</button>
                </br>

        </form>



        <!-- ////////////////////////////// -->


    </div> <!-- Fim da linha (row) -->
    </br>

</div> <!-- Fim container -->