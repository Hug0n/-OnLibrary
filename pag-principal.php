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
		<form method="POST" action="registra_user.php" id="formCadastrarse">

			<div class="row" style="background: blue">
				<!-- ROW 1 - 1° coluna - Início !-->
				<div class="col-md-8 form-group" style="background: green">
					<h3 class="centro"> Títulos disponíveis </h3>
					<hr>
					<div id="div-livros" class="back-teste">
						ff
					</div>
				</div>

				<div class="col-md-4" class="meu_perfil centro">
					<!-- INCÍCIO - 2° Segunda coluna - ROW 1 -->
					<h3 class="centro"> Olá, "Nome" </h3>
					<hr>
					<button type="button" id="btn_ver_meus_livros" class="btn-default">
						<h4><span>Meus livros</span></h4>
					</button>
					</br></br>
					<button type="button" class="btn-default">
						<h4><span>Configurações</span></h4>
					</button>
					</br>
				</div> <!-- FIM - 2° Segunda coluna - ROW 1 -->


			</div> <!-- ROW 1 - 1° coluna - FIM !-->


			<div class="row">
				<!-- ROW 2 - 1° coluna - Início !-->


			</div><!-- ROW 2 - 1° coluna - FIM !-->


			<!-- 		</br>
				<button type="submit" class="btn btn-primary foorm-control-1 ">Cadastrar</button>
				</br>
				</br> -->
		</form>
	</div>
	<!--CONTAINER - FIM! !-->
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>