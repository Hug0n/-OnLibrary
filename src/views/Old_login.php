<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>


<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title class="titulo">OnLibrary</title>

	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<!-- bootstrap - link cdn -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

	<link rel="stylesheet" href="assets/css/comum.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css.">
	<link rel="stylesheet" href="assets/css/icofonto.min.css">
	<link rel="stylesheet" href="assets/css/login.css">

	<script>

	</script>
</head>

<body class="back-color">


	<!-- ---------------------------------------->
	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-static-top color-nav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" method="post">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<img src="imagens/livro-aberto1.png" class="img-logo" />
				<span class="titulo">OnLibrary</span>
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<h4 style="margin-right: 20px 30px;"><a href="pag-inscrevase.php" type="button" class="btn btn-primary">Inscrever-se</a></h4>
					</li>
					<li class="<?= $erro == 1 ? 'open' : '' ?>">
						<!-- É aplicado a classe open automaticamente pelo bootstrap, quando o botão é clicado! -->

						<button style="margin:10px" type="button" class="btn btn-primary" id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</button>
						<ul class="dropdown-menu" aria-labelledby="entrar">
							<div class="col-md-12">
								<p>Você já possui uma conta?</h3>
									<br />
									<form method="post" action="validar_acesso.php" id="formLogin">
										<div class="form-group">
											<input type="text" class="form-control" id="campo_email" name="email" placeholder="email" />
										</div>

										<div class="form-group">
											<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
										</div>

										<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

										<br />
									</form>
									<?php

									if ($erro == 1) {
										echo '<font color=red><b> E-mail e/ou senha inválidos! <b></font>';
									}
									?>

									</form>
						</ul>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>


	<div class="container">
		<div class="row">
			<div class="col-md-6 ">
				<!-- Main component for a primary marketing message or call to action -->
				<div class="jumbotron ajustar-tamanho">
					<h2>Bem vindo ao OnLibrary! </h2>
					<br />
					<p>Aqui você pode agendar e alugar os seus livros favoritos.</p>
				</div>

				<div class="clearfix"></div>
			</div>

			<div class="col-md-6">
				<!-- Main component for a primary marketing message or call to action -->
				<div>
					<img src="imagens/livros.png" class="albuns-tamanho">
					<br />
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>