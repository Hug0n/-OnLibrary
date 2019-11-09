<?php

session_start();
//É fundamental que inicializarmos a session no documento se formos usarmos ela


if (!isset($_SESSION['email'])) { //Se o indíce do SESSION não existir(ou seja, caso o usuário NÃO passe pelo processo de autenticação no if da linha 37 do validar_acesso.php), será encaminhado para a página inicial de erro.
	header('Location: index.php?erro=1');
}

require_once('class.db.php');

$objDB = new db();
$link = $objDB->conecta_mysql();
$id_usuario = $_SESSION['id_usuario'];

$id_livro = $_GET['id_livro'];


//--query do livro
$sql = "SELECT * FROM livro WHERE id_livro = $id_livro";

$resultado_id = mysqli_query($link, $sql);

//--Atributos

if ($resultado_id) {
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$nomeLivro = $registro['nome_livro'];
	$autor = $registro['autor'];
	$ano = $registro['ano'];
	$descricao = $registro['sinopse'];
	$categoria = $registro['categoria'];
	$dataPrazoAluguel = $registro['data_prazo_aluguel'];
	$foraDeLinha = $registro['fora_de_linha'];
	$idioma = $registro['idioma'];
	$numeroEdicao = $registro['numero_edicao'];
	$quantidadePaginas = $registro['quantidade_paginas'];
} else {
	echo 'Erro ao executar a Query qtd_seguidores';
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

			var id_livro = <?php echo $id_livro ?>;

			//associar o evento de clique
			$('#btn_post').click(function() {
				//validar se o campo de texto possui pelo menos 1 caractere:
				if ($('#texto_post').val().length > 0) { //condição para analisar se o post está vazio na hora da submissão. Caso sim, não posta!
					alert($('#texto_post').val());


					var data = $('#form_post').serializeArray();
					data.push({
						name: "id_livro",
						value: id_livro
					});

					alert(id_livro);


					$.ajax({
						url: 'inclui_coment.php',
						method: 'post',
						data: $.param(data),
						success: function(data) {
							$('#texto_post').val('');
							atualizaPost(); //(atualizar os) posts assim que forem inseridos (Assíncrono)
							alert(data);
							console.log(data);
						}
					});
				}
			});

			function atualizaPost() {
				//carregar (atualizar os) posts assim que forem inseridos (Assíncrono)

				$.ajax({
					url: 'get_coment.php',
					method: 'post',
					data: $.param(data),
					success: function(data) {
						$('#posts').html(data);
					}
				});
			}
			atualizaPost();
		});
		//Colocar como vazio o campo input, após submeter as informações.



		// Função que atualizará a div de tweets no momento de carregamento da página (document).ready

		//Carregar os tweets
		//Semelhante a função do INNERHTML do javascript // Estamos atribuindo como se fosse um filho da DIV
	</script>


</head>

<body class="back-color">

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

	<!--Início Container -->
	<div class="container">

		<div class="col-md-3">
			<div class="panel panel-default container-visual">
				<div class="panel-body">

					<h1> Imagem livro</h1>

					<hr>

					<div>
						ADICIONAR AOS FAVORITOS +
					</div>
					<div>
						POSTS
					</div>
					<div>
						POSTS
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6 panel panel-default container-visual ">
			<div>
				<h2> <?php echo $nomeLivro; ?> </h2>
			</div>
			<div>
				<h3> <?php echo $autor; ?> </h3>
			</div>
			<hr class="hrr">
			<h4> Descrição </h4>
			<?php echo $descricao; ?>
			<br>
			<div id="descricao">
			</div>
			<br>
			<hr>
			<h4> Características </h4>
			<table style="margin-top: 10px">
				<tr>
					<td style="border-bottom: 1px solid grey; border-spacing: 10px">
						Autor: <?php echo $autor; ?>
					</td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid grey">
						Idioma: <?php echo $idioma; ?>
					</td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid grey">
						Fora de Linha: <?php echo $foraDeLinha; ?>
					</td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid grey">
						Ano da edição: <?php echo $ano; ?>
					</td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid grey">
						Número de Páginas: <?php echo $quantidadePaginas; ?>
					</td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid grey">
						Número da edição: <?php echo $numeroEdicao; ?>
					</td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid grey">
						Categoria: <?php echo $categoria; ?>
					</td>
				</tr>
			</table>
			<br>
			<hr>
			<h3>Comentários</h3>
			<br>
			<div class="panel panel-default container-visual">
				<div class="panel-body">
					<form id="form_post" class="input-group">
						<input type="text" id="texto_post" name="texto_post" class="form-control" placeholder="Compartilhe sua opinião sobre o livro, <?= $_SESSION['nome'] ?>!" maxlength="140" name="tweet">
						<span class="input-group-btn ">
							<button class="btn btn-default container-visual" id="btn_post" type="button">COMENTAR!</button>
						</span>
					</form>
				</div>
			</div>

			<div id="posts" class="list-group">

			</div>

		</div>

		<div class="col-md-3">
			<div class="panel panel-default container-visual">
				<div class="panel-body">
					<h4><a href="pag-principal.php"> Explorar livros </h4>
					<hr hr-size-caixa-1>
					<h4><a href="Procurar_pessoas.php">Procurar por pessoas</h4>
				</div>
			</div>
		</div>

	</div> <!-- fim container !-->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>