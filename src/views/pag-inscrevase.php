<?php
//$erro_cadastro = 0;

//echo $erro_cadastro;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

$erro_cadastro = isset($_GET['erro_cadastro']) ? $_GET['erro_cadastro'] : 0;

// if ($erro_cadastro == 0) {

// 	// header('Location: index.php');
// }

?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/inscrevase.css">

    <!-- <script src="/js/cadastro.js"></script> -->


    <title>OnLibrary</title>
</head>


<header class="header">
    <div class="logo">
        <a href="home.php">
            <i class="icofont-book mr-2"></i>
            <span class="font-weight-bold">ON</span>
            <span class="font-weight-light mx-2">Library</span>
        </a>
    </div>
</header>

<!-- ////////////////////////////// -->

<div class="container ">
    </br>

    <h3 class=" centro">Inscreva-se já.</h3>

    <div class="row col-md-10 coluna-posts">

        <!-- ////////////////////////////// -->

        <form method="POST" action="" id="formCadastro">

            <!-- ROW 1 - 1° coluna - Início !-->
            <div class="form-group ">
                <h3> Pessoal </h3>
                <hr>
                <span class="form-tam-intermed ">Nome* </br> <input type="text" class="form-control " name="nome" id="nome"></span>
                <span class="form-tam-intermed"> Sobrenome*</br> <input type="text" class="form-control" name="sobrenome" id="sobrenome"></span>
                </p>
                <span class="form-tam-pequeno"> Data de Nascimento* </br><input type="date" class="form-control " name="nascimento" id="nascimento"></span>


                <span class="form-tam-pequeno"> Sexo* <br /><input type="radio" name="genero" value="M"> Homem
                    <span><input type="radio" name="genero" value="F"> Mulher </span></span>

                </p>
                <span class="form-tam-intermed "> E-mail* </br><input type="email" class="form-control " name="email" id="email">
                    <?php
                    if ($erro_email) {
                        echo '<font style="color:#FF0000"> E-mail já existe! </font>';
                        $erro_cadastro = 3;
                    }
                    ?>
                </span>

                <span class="form-tam-pequeno"> Senha*</br><input type="password" class="form-control" name="senha" id="senha"></span>
            </div>



            <!-- ROW 2 - 1° coluna - Início !-->
            <h3> Endereço </h3>
            <hr>

            <span class="form-tam-intermed"> Cidade* <br /><input type="text" class="form-control" name="cidade" id="cidade"></span>
            <span class="form-tam-muito-pequeno "> UF* <br /><input type="text" class="form-control foorm-control-0" name="uf" id="uf"></span>

            </p>
            <span class="form-tam-intermed "> Rua* <br /><input type="text" class="form-control" name="rua" id="rua"></span>
            <span class="form-tam-pequeno"> Bairro* <br /><input type="text" class="form-control" name="bairro" id="bairro"></span>

            </p>
            <span class="form-tam-pequeno"> Complemento* <br /><input type="text" class="form-control foorm-control-0" name="complemento" id="complemento"></span>

            </p>

            <!-- ROW 3 - 1° coluna - Início !-->
            <h3> Contato </h3>
            <hr>

            <span class="form-tam-pequeno "> Telefone* <br /><input type="text" class="form-control " name="telefone" id="telefone"></span>
            <span class="form-tam-pequeno "> Celular* <br /><input type="text" class="form-control " name="celular" id="celular"></span>
            </p>


            </br><a href="cadastrar-user.php">
            <button type="submit" class="btn btn-primary " id="btn-cadastrar">Cadastrar</button>
            </a>
            </br>
            <?php
            //echo $erro_cadastro;
            // if ($erro_cadastro == 1) {
            //     echo '<font style="color:#FF0000"> Cadastro não foi salvo com sucesso! Tente novamente. </font>';
            // } else if ($erro_cadastro == 0) {

            //     echo '<font style="color:#FF0000"> Cadastro salvo com sucesso! </font>';
            // } else {
            //     echo '<font style="color:#FF0000"> </font>';
            // }
            // $erro_cadastro = 3;
            ?>
        </form>



        <!-- ////////////////////////////// -->


    </div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->


<!-- ////////////////////////////// -->