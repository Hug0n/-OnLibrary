<?php


$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

$erro_cadastro = isset($_GET['erro_cadastro']) ? $_GET['erro_cadastro'] : 0;

?>
<link rel="stylesheet" type="text/css" href="assets/css/editar-perfil.css">

<div class="container ">
    </br>

    <h3 class=" centro">Editar Perfil</h3>

    <div class="row col-md-10 coluna-posts">

        <!-- ////////////////////////////// -->
        <!-- ROW 1 - 1° coluna - Início !-->

        <form method="POST" action="editar-perfil.php" id="formCadastro">

            <div class="form-group ">
                <h3> Pessoal </h3>
                <hr>
                <span class="   form-tam-intermed ">Nome </br> <input type="text" class="form-control " name="nome" id="nome" placeholder="<?= $nome ?>"> </span>
                <span class="form-tam-intermed"> Sobrenome</br> <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="<?= $sobrenome ?>"></span>
                </p>
                <span class="form-tam-pequeno"> Data de Nascimento </br><input type="date" class="form-control " name="nascimento" id="nascimento"></span>


                <span class="form-tam-pequeno" id="genero"> Sexo <br />
                    <input type="radio" name="genero" value="M" id="genero-H"> Homem
                    <input type="radio" name="genero" value="F" id="genero-F"> Mulher </span>

                </p>
                <span class="form-tam-intermed "> E-mail </br><input type="email" class="form-control " name="email" id="email" placeholder="<?= $email ?>">
                    <?php
                    if ($erro_email) {
                        echo '<font style="color:#FF0000; font-size: 0.89rem"> Esse endereço de e-mail já está associado a uma conta!  </font>';
                        $erro_cadastro = 3;
                    }
                    ?>
                </span>
                <br>
                <br>
                <span class="form-tam-pequeno"> Senha</br><input type="password" class="form-control" name="senha" id="senha"></span>
                </p>


                <button type="submit" class="btn btn-primary" id="btn-editar-perfil">Salvar</button>

                <br>

            </div>

            <!-- ROW 2 - 1° coluna - Início !-->

            <h3> Endereço </h3>
            <hr>

            <span class="form-tam-intermed"> Cidade <br /><input type="text" class="form-control" name="cidade" id="cidade"></span>
            <span class="form-tam-muito-pequeno "> UF <br /><input type="text" class="form-control foorm-control-0" name="uf" id="uf"></span>

            </p>
            <span class="form-tam-intermed "> Rua <br /><input type="text" class="form-control" name="rua" id="rua"></span>
            <span class="form-tam-pequeno"> Bairro <br /><input type="text" class="form-control" name="bairro" id="bairro"></span>

            </p>
            <span class="form-tam-pequeno"> Complemento <br /><input type="text" class="form-control foorm-control-0" name="complemento" id="complemento"></span>

            </p>



            <button type="submit" class="btn btn-primary" id="btn-editar-endereco">Salvar</button>

            <br>
            <br>

            <!-- ROW 3 - 1° coluna - Início !-->


            <h3> Contato </h3>
            <hr>

            <span class="form-tam-pequeno "> Telefone <br /><input type="text" class="form-control " name="telefone" id="telefone"></span>
            <span class="form-tam-pequeno "> Celular <br /><input type="text" class="form-control " name="celular" id="celular"></span>
            </p>


            <button type="submit" class="btn btn-primary " id="btn-cadastrar">Salvar</button>
            </br>

        </form>



        <!-- ////////////////////////////// -->


    </div> <!-- Fim da linha (row) -->
    </br>

</div> <!-- Fim container -->