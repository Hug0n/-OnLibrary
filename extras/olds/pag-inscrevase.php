	<?php
	//$erro_cadastro = 0;

	//echo $erro_cadastro;
	$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

	$erro_cadastro = isset($_GET['erro_cadastro']) ? $_GET['erro_cadastro'] : 0;

	// if ($erro_cadastro == 0) {

	// 	// header('Location: index.php');
	// }



	?>

	<!DOCTYPE HTML>
	<html lang="pt-br">

	<head>
		<meta charset="UTF-8">

		<title>Inscreva-se</title>

		<!-- ícone da aba -->
		<link rel="icon" href="imagens/contato.png">

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/inscrevase.css">

		<script>
			$(document).ready(function() {
				$('#btn-cadastrar').click(function() {

					var campo_vazio;
					//NOME
					if ($('#nome').val() == '') {
						$('#nome').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#nome').css({
							'border-color': '#CCC'
						});
					}

					//SOBRENOME
					if ($('#sobrenome').val() == '') {
						$('#sobrenome').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#sobrenome').css({
							'border-color': '#CCC'
						});
					}

					//DATA DE NASCIMENTO
					if ($('#nascimento').val() == '') {
						$('#nascimento').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#nascimento').css({
							'border-color': '#CCC'
						});
					}

					//SEXO
					if ($('#sexo').val() == '') {
						$('#sexo').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#sexo').css({
							'border-color': '#CCC'
						});
					}

					//E-MAIL
					if ($('#email').val() == '') {
						$('#email').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#email').css({
							'border-color': '#CCC'
						});
					}

					//CIDADE
					if ($('#cidade').val() == '') {
						$('#cidade').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#cidade').css({
							'border-color': '#CCC'
						});
					}

					//UF
					if ($('#uf').val() == '') {
						$('#uf').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#uf').css({
							'border-color': '#CCC'
						});
					}

					//RUA
					if ($('#rua').val() == '') {
						$('#rua').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#rua').css({
							'border-color': '#CCC'
						});
					}

					//BAIRRO
					if ($('#bairro').val() == '') {
						$('#bairro').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#bairro').css({
							'border-color': '#CCC'
						});
					}

					//COMPLEMENTO
					if ($('#complemento').val() == '') {
						$('#complemento').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#complemento').css({
							'border-color': '#CCC'
						});
					}

					//TELEFONE
					if ($('#telefone').val() == '') {
						$('#telefone').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#telefone').css({
							'border-color': '#CCC'
						});
					}

					//CELULAR
					if ($('#celular').val() == '') {
						$('#celular').css({
							'border-color': '#A94442'
						});
						campo_vazio = true;
					} else {
						$('#celular').css({
							'border-color': '#CCC'
						});
					}

					if (campo_vazio) {
						return false;
						//faz a página subir (facilita pra achar o campo vazio)  jQuery('html, body').animate({scrollTop: 0}, 300);
					}



				});
			});
		</script>



	</head>

	<body class="back-color">

		<!-- Static navbar -->
		<!-- <nav class="navbar navbar-default navbar-expand-lg navbar-light color-nav">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-voltar" aria-expanded="false" aria-controls="navbar-voltar" aria-label="Alterna navegação">

						<span class="navbar-toggler-icon"></span>
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="img-logo"></span>
					<span class="titulo span-test">OnLibrary</span>
				</div>


				<div class="collapse navbar-collapse " id="navbar-voltar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Voltar para Home</a></li>
					</ul>
				</div> -->
		<!--/.nav-collapse -->

		<!-- </div>
		</nav> -->

		<nav class="navbar navbar-default navbar-expand-lg navbar-light color-nav">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-4">
						<span class="img-logo"></span>
						<span class="titulo">OnLibrary</span>
						</div>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
							<span class="navbar-toggler-icon"></span>
						</button>
					<div class="col-4">

						<div class="collapse navbar-collapse " id="conteudoNavbarSuportado">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active">
									<a class="nav-link" href="index.php">Página inicial <span class="sr-only">(página atual)</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>


		<h3 class="centro">Inscreva-se já.</h3>

		<div class="container container-visual ">
			<!-- INÍCIO CONTAINER !-->
			<br />
			<form method="POST" action="class.registra_user.php" id="formCadastro">

				<div class="row">
					<!-- ROW 1 - 1° coluna - Início !-->
					<div class="col-md-10 form-group ">
						<h3> Pessoal </h3>
						<hr>
						<span class="span-test">Nome* </br> <input type="text" class="form-control foorm-control-1" name="nome" id="nome"></span>
						<span class="span-test"> Sobrenome*</br> <input type="text" class="form-control foorm-control-1" name="sobrenome" id="sobrenome"></span>
						</p>
						<span class="span-test"> Data de Nascimento* </br><input type="date" class="form-control foorm-control-0-1" name="nascimento" id="nascimento"></span>


						<span class="span-test"> Sexo* <br /><input type="radio" class="" name="genero" value="M"> Homem </span>
						<span><input type="radio" name="genero" value="F"> Mulher </span>

						</p>
						<span class="span-test"> E-mail* </br><input type="email" class="form-control foorm-control-2" name="email" id="email">
							<?php
							if ($erro_email) {
								echo '<font style="color:#FF0000"> E-mail já existe! </font>';
								$erro_cadastro = 3;
							}

							?>
						</span>

						</p>
						<span class="span-test"> Senha*</br><input type="password" class="form-control foorm-control-1" name="senha" id="senha"></span>
						</p>
					</div>
				</div>
				<!-- ROW 1 - 1° coluna - FIM !-->


				<div class="row">
					<!-- ROW 2 - 1° coluna - Início !-->
					<div class="col-md-10">
						<h3> Endereço </h3>
						<hr>

						<span class="span-test"> Cidade* <br /><input type="text" class="form-control foorm-control-1" name="cidade" id="cidade"></span>
						<span class="span-test"> UF* <br /><input type="text" class="form-control foorm-control-0" name="uf" id="uf"></span>

						</p>
						<span class="span-test"> Rua* <br /><input type="text" class="form-control foorm-control-1" name="rua" id="rua"></span>
						<span class="span-test"> Bairro* <br /><input type="text" class="form-control foorm-control-1" name="bairro" id="bairro"></span>

						</p>
						<span class="span-test"> Complemento* <br /><input type="text" class="form-control foorm-control-0" name="complemento" id="complemento"></span>

						</p>
					</div>
				</div> <!-- ROW 2 - 1° coluna - fim !-->

				<div class="row">
					<!-- ROW 3 - 1° coluna - Início !-->
					<div class="col-md-10 row_2_marg_left_top">
						<h3> Contato </h3>
						<hr>

						<span class="span-test"> Telefone* <br /><input type="text" class="form-control foorm-control-0-1" name="telefone" id="telefone"></span>
						<span class="span-test"> Celular* <br /><input type="text" class="form-control foorm-control-0-1" name="celular" id="celular"></span>
						</p>

					</div> <!-- ROW 3 - 1° coluna - FIM !-->

				</div>
				</br>
				<button type="submit" class="btn btn-primary foorm-control-1 " id="btn-cadastrar">Cadastrar</button>
				</br>
				<?php
				//echo $erro_cadastro;
				if ($erro_cadastro == 1) {
					echo '<font style="color:#FF0000"> Cadastro não foi salvo com sucesso! Tente novamente. </font>';
				} else if ($erro_cadastro == 0) {

					echo '<font style="color:#FF0000"> Cadastro salvo com sucesso! </font>';
				} else {
					echo '<font style="color:#FF0000"> </font>';
				}
				$erro_cadastro = 3;
				?>
				</br>
			</form>
		</div>
		</div>

		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


	</body>

	</html>