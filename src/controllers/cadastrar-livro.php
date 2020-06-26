 <?php

	loadModel('Model');

	$nome = $_POST['nome'];
	$autor = $_POST['autor'];
	$ano = $_POST['ano'];
	$categoria = $_POST['categoria'];

	$sinopse = $_POST['sinopse'];

	$linkComprar = $_POST['linkComprar'];

	$foradelinha = $_POST['foradelinha'];
	$idioma = $_POST['idioma'];
	$edicao = $_POST['edicao'];
	$qtdpaginas = $_POST['qtdpaginas'];


	$Livro = new Livro([]);

	$Livro->setNomeLivro($nome);
	$Livro->setAutor($autor);
	$Livro->setAno($ano);
	$Livro->setCategoria($categoria);

	$Livro->setForaDeLinha($foradelinha);
	$Livro->setLinkComprar($linkComprar);

	$Livro->setDescricao($sinopse);
	$Livro->setIdioma($idioma);
	$Livro->setNumeroEdicao($edicao);
	$Livro->setQuantidadePaginas($qtdpaginas);


	////VALIDAÇÃO DA IMAGEM

	if (!empty($_FILES['capa']['name'])) {
		// qual a extensao do capa?
		$extensao = strtolower(substr($_FILES['capa']['name'], -4));
		//pega os ultimos 4 caracteres ()o ponto e a extensão

		// nome do arquivo. Encriptografa pra o nome ser único
		$novo_nome = md5(time()) . $extensao;

		// diretorio onde sera enviado o arq
		$diretorio = $Livro->getDiretorioImagemLivro();

		// Quando o PHP recebe um arquivo, esse arquivo é enviao para uma pasta temporaria dentro dos arquivos do PHP. Precisamos acessar essa pasta:

		move_uploaded_file($_FILES['capa']['tmp_name'], $diretorio . $novo_nome);

		$Livro->setImagemLivro($novo_nome);
	} else {
		$Livro->setImagemLivro('livro-semfoto.png');
	}



	$columns = ['nome_livro', 'autor', 'ano', 'categoria', 'sinopse', 'link_compra', 'fora_de_linha', 'idioma', 'numero_edicao', 'quantidade_paginas', 'imagem_livro'];
	$value = [
		$Livro->getNomeLivro(),
		$Livro->getAutor(),
		$Livro->getAno(),
		$Livro->getCategoria(),
		$Livro->getDescricao(),
		$Livro->getLinkComprar(),
		$Livro->getForaDeLinha(),
		$Livro->getIdioma(),
		$Livro->getNumeroEdicao(),
		$Livro->getQuantidadePaginas(),
		$Livro->getImagemLivro()
	];

	$connInsertLivro = $Livro->insert($columns, $value);

	// $sql = "insert into Livro( nome, autor, email, senha, ano, sexo) values ( '$nome', '$autor', '$email', '$senha', '$nascimento', '$genero')";

	//executar a query (2 parametros: Conexão e SQL (a query))

	if ($connInsertLivro) {
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}


	header('Location: pag-livros.php?' . $retorno_get_cadastro);



	?>
