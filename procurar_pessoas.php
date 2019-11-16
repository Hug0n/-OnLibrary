<?php
session_start();
// É fundamental que inicializarmos a session no documento se formos usarmos ela

if (!isset($_SESSION['email'])) { // Se o indíce do SESSION não existir(ou seja, caso o usuário NÃO passe pelo processo de autenticação no if da linha 37 do validar_acesso.php), será encaminhado para a página inicial de erro.
	header('Location: index.php?erro=1');
}

require_once('class.db.php');

$objDB = new db();
$link = $objDB->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];

//--qtd de tweets
$sql = "SELECT COUNT(*) AS qtde_tweets FROM post WHERE id_usuario_post = $id_usuario";


$resultado_id = mysqli_query($link, $sql);

$qtd_tweets = 0;

if ($resultado_id) {
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtd_tweets = $registro['qtde_tweets'];
} else {
	echo 'Erro ao executar a Query qtd_tweets';
}

//--qtd de tweets

$sql = "SELECT COUNT(*) AS qtd_seguidores FROM usuario_seguidores WHERE id_usuario_que_sigo = $id_usuario";


$resultado_id = mysqli_query($link, $sql);

$qtd_seguidores = 0;

if ($resultado_id) {
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtd_seguidores = $registro['qtd_seguidores'];
} else {
	echo 'Erro ao executar a Query qtd_seguidores';
}

//--qtd de seguidores

$sql = "SELECT COUNT(*) AS qtd_seguindo FROM usuario_seguidores WHERE id_usuario = $id_usuario";


$resultado_id = mysqli_query($link, $sql);

$qtd_seguindo = 0;

if ($resultado_id) {
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtd_seguindo = $registro['qtd_seguindo'];
} else {
	echo 'Erro ao executar a Query qtd_seguindo';
}



?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">

	<title>OnLibrary</title>

	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- CSS da página -->
	<link rel="stylesheet" type="text/css" href="css/home.css">

	<!-- Javascript-->
	<script type="text/javascript">
		$(document).ready(function() { //Verifica se o documento foi carregado. Caso sim, executa as funções abaixo:

			//associar o evento de clique
			$('#btn_procurar_pessoa').click(function() {
				//validar se o campo de texto possui pelo menos 1 caractere:
				if ($('#nome_pessoa').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
					//alert($('#texto_post').val());
					$.ajax({
						url: 'get_pessoas.php',
						method: 'post',
						data: $('#form_procurar_pessoas').serialize(),
						success: function(data) {
							$('#pessoas').html(data);

							//após o elemento 'botão_seguir' existir, iremos executar o script à seguir:
							$('.btn_seguir').click(function() {
								var id_usuario = $(this).data('id_usuario');

								$('#btn_seguir_' + id_usuario).hide();
								$('#btn_deixar_seguir_' + id_usuario).show();

								$.ajax({
									url: 'seguir.php',
									method: 'post',
									data: {
										seguir_id_usuario: id_usuario
									},
									success: function(data) {
									}
								});
							});

							$('.btn_deixar_seguir').click(function() {
								var id_usuario = $(this).data('id_usuario');

								$('#btn_seguir_' + id_usuario).show();
								$('#btn_deixar_seguir_' + id_usuario).hide();

								$.ajax({
									url: 'deixar_seguir.php',
									method: 'post',
									data: {
										deixar_seguir_id_usuario: id_usuario
									},
									success: function(data) {
										alert('Registro removido com sucesso!');
									}

								});
							});
						}
					});
				}
			});
		});
	</script>


</head>

<body class="back-color">

	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-static-top color-nav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" method="post">
					<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
				<img src="imagens/livro-aberto1.png" class="img-logo" />
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="home.php">Voltar para Home</a></li>
					<li><a href="sair.php">Sair</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>


	<div>
		<div class="col-md-4">
			<div class="panel panel-default container-visual">
				<div class="panel-body container-caixa-1">
					<h4>Olá, <?= $_SESSION['nome'] ?></h4>

					<hr>
					<div class="col-md-3 caixa-meus-livros">
						POSTS </br> <?= $qtd_tweets ?>
					</div>
					<div class="col-md-4">
						SEGUIDORES </br> <?= $qtd_seguidores ?>
					</div>
					<div class="col-md-4">
						SEGUINDO </br> <?= $qtd_seguindo ?>
					</div>
				</div>
			</div>
		</div>



		<div class="col-md-5 ">
			<div class="panel panel-default container-visual">
				<div class="panel-body">
					<form id="form_procurar_pessoas" class="input-group">
						<input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control" placeholder="Quem você está procurando?" maxlength="140" name="tweet"> <span class="input-group-btn ">
							<button class="btn btn-default container-visual" id="btn_procurar_pessoa" type="button">Procurar</button>
						</span>
					</form>
				</div>
			</div>

			<div id="pessoas" class="list-group">
				<!-- Resultado das buscas de procurar pessoas ficam aqui -->
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default container-visual">
				<div class="panel-body">
					<h4>
						<h4><a href="pag-principal.php"> <button type="button" class="btn btn-info btn-block">Explorar livros </button></h4>
					</h4>
				</div>
			</div>
		</div>



	</div>


	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>