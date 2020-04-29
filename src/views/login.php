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

	<div class="container">
		<div class="row">
			<div class="col-md-6 ">
				<!-- Main component for a primary marketing message or call to action -->
				<div class="jumbotron ajustar-tamanho">
					<h2>Bem vindo ao OnLibrary! </h2>
					<br />
					<p>Aqui você pode agendar e alugar os seus livros favoritos.</p>

					<div>
						<img src="../../../public/assets/imagens/livros.png" class="albuns-tamanho">
						<br />
					</div>

				</div>

				<div class="clearfix"></div>


				<div class="clearfix"></div>
			</div>

			<div class="col-md-6 ">
				<form class="form-login" action="#" method="post">
					<div class="login-card card">
						<div class="card-header">
							<i class="icofont-travelling mr-2"></i>
							<span class="font-weight-light">O</span>
							<span class="font-weight-bold">N</span>
							<span class="font-weight-light mx-1"> Library</span>

							<i class="icofont-runner-alt-1 ml-2"></i>

						</div>
						<div class="card-body">
							<?php include(TEMPLATE_PATH . '/messages.php') ?>
							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" id="email" name="email" 
								class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>" value="<?= isset($_POST['email']) ? $_POST['email'] : "Informe o seu e-mail" ?>" ; placeholder="Informe o seu e-mail" autofocus>
								<div class="invalid-feedback">
									<?= $errors['email'] ?>
								</div>
							</div>
							<div class="form-group">
								<label for="password">Senha</label>
								<input type="password" id="password" name="senha" class="form-control <?= $errors['senha'] ? 'is-invalid' : '' ?>" placeholder="Informe uma senha"></label>
								<div class="invalid-feedback">
									<?= $errors['senha'] ?>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-lg btn-primary ml-2" href="pag-inscrevase.php">Inscreva-se</button>
							<button class="btn btn-lg btn-primary mx-1">Entrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>