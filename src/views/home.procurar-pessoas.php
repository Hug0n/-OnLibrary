<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/home.posts.css">
<script src="/js/procurar.pessoas.js"></script>
<link rel="stylesheet" href="assets/css/button-ocultar-left.css">

<!-- <script src="assets/js/app.js"></script> -->

<?php
require_once(realpath(CONTROLLER_PATH . '/QtdPosts.php'));
?>

<div class="container">
	<div class="row ">
		<div class="col-md-7 coluna-posts ">
			<!-- tamanho da 1° coluna -->
			<form id="form_procurar_pessoas" class="input-group">
				<input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control" placeholder="Quem você está procurando?" maxlength="140" name="tweet"> <span class="input-group-btn ">
					<button class="btn btn-default container-visual" id="btn_procurar_pessoa" type="button">Procurar</button>
				</span>
			</form>
			<br>
			<div id="pessoas" class="list-group">
				<!-- Resultado das buscas de procurar pessoas ficam aqui -->
				<div class="imagem-procurar-pessoas ">
					<img src="assets/css/imagens/contato.png" />
				</div>
				Digite um nome para começar a procurar!
			</div>
			<!-- Coluna 1 -->
		</div>
		<div class="col-md-4 coluna-seguidor">
			<!-- tamanho da 2° coluna -->
			<div class="row">
				<!-- Início (row) da 2° coluna -->
				<div class="col-md-4">
					POSTS <br>
                    <?php echo $qtd_posts ?>
				</div>
				<div class="col-md-4">
					SEGUIDORES <br>
                    <?php echo $qtd_seguidores ?>
				</div>
				<div class="col-md-4">
					SEGUINDO <br>
                    <?php echo $qtd_seguindo ?>
				</div>
			</div> <!-- Fim (row) da 2° coluna -->
			<hr hr-size-caixa-1>

			<div class="row coluna-seguidor-btn ">
				<div class="col-md-12 ">
					<h4><a href="pag-livros.php"> <button type="button" class="btn btn-info btn-block ">Explorar livros </button></h4>
				</div>
			</div>
			<div class="row coluna-seguidor-btn">
				<div class="col-md-12 ">
					<h4><a href="home.php"> <button type="button" class="btn btn-info btn-block "> Meu Feed </button></h4>
				</div>

			</div>
		</div> <!-- Fim da 2° coluna -->
	</div> <!-- Fim da linha (row) -->
</div> <!-- Fim container -->