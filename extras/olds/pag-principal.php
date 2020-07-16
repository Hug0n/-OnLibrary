<?php

session_start();

if (!isset($_SESSION['email'])) {
	header('Location: index.php?erro=1');
}

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Home - Livros Disponíveis</title>

	<!-- ícone da aba -->
	<link rel="icon" href="imagens/contato.png">

	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/pag-principal.css">

	<!-- Javascript-->
	<script type="text/javascript">
		$(document).ready(function() { //Verifica se o documento foi carregado. Caso sim, executa as funções abaixo:

			atualizaPost(); //(atualizar os) posts assim que forem inseridos (Assíncrono)



			function atualizaPost() {
				//carregar (atualizar os) posts assim que forem inseridos (Assíncrono)
				
				$.ajax({
					url: 'get_livros.php',
					success: function(data) {
						$('#div-livros').html(data);
					}
				});
			}
			atualizaPost();
		});
	</script>

</head>

<body class="back-color">

	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-static-top color-nav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span class="img-logo"></span>
				<!-- <span  style="background: red" class="titulo">OnLibrary</span> -->
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="home.php">Voltar para Home</a></li>
					<li><a href="index.php">Sair</a></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav> <!-- FIM - Static navbar -->


	<h3 class="centro">Os seus livros disponíveis Online</h3>

	<div class="container container-visual">
		<!-- INÍCIO CONTAINER !-->
		<br />

		<div class="row">
			<!-- ROW 1 - 1° coluna - Início !-->
			<div class="col-md-8 form-group">
				<h3 class="centro"> Títulos </h3>
				<hr>
				<div id="div-livros">
					<!--Informações do Livro serão colocadas aqui!-->
				</div>
			</div>

			<div class="col-md-4" class="meu_perfil centro">
				<!-- INCÍCIO - 2° Segunda coluna - ROW 1 -->
				<h3 class="centro"><?= $_SESSION['nome'] ?> </h3>
				<hr>
				<a href="#" type="button" id="btn_#" class="btn btn-info btn-block">
					<h4><span>Meus livros</span></h4>
				</a>
				<a href="pag-favoritos.php" type="button" id="btn_ver_meus_favoritos" class="btn btn-warning btn-block">
					<h4><span>Meus favoritos</span></h4>
				</a>
				<a href="pag-editarPerfil.php" type="button" id="btn_editar_perfil" class="btn btn-success btn-block">
					<h4><span>Editar Perfil</span></h4>
				</a>
				</br>
				<a href="pag-sugestao.php" type="button" id="btn_sugestao" class="btn btn-primary btn-block">
					<h4><span>Sugestão</span></h4>
				</a>
			</div> <!-- FIM - 2° Segunda coluna - ROW 1 -->

		</div> <!-- ROW 1 - 1° coluna - FIM !-->

	</div>
	<!--CONTAINER - FIM! !-->
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>