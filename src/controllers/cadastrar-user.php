 <?php

	loadModel('Model');

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$data_nasc = $_POST['nascimento'];
	$sexo = $_POST['genero'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$complemento = $_POST['complemento'];

	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];

	// var_dump($_FILES['img-perfil']);
	// echo '<br>';
	// var_dump($_FILES['img-perfil']['name']);

	// $nome = 'testando Pinto';
	// $sobrenome = 'testando';
	// $data_nasc = 'testando';
	// $sexo = 'F';
	// $email = 'TESTANDO@hot.com';
	// $senha = '123';

	// $cidade = 'testando';
	// $uf = 'PE';
	// $rua = 'testando';
	// $bairro = 'testando';
	// $complemento = '22';

	// $telefone = 81999533121;
	// $celular = 81999533121;


	// $Usuario = new Usuario([
	// 	'nome' => $nome,
	// 	'sobrenome' => $sobrenome,
	// 	'data_nasc' => $data_nasc,
	// 	'sexo' => $sexo,
	// 	'email' => $email,
	// 	'senha' => $senha,
	// 	'cidade' => $cidade,
	// 	'uf' => $uf,
	// 	'rua' => $rua,
	// 	'bairro' => $bairro,
	// 	'complemento' => $complemento,
	// 	'telefone' => $telefone,
	// 	'celular' => $celular,
	// ]);

	$Usuario = new Usuario([]);

	$Usuario->setNome($nome);
	$Usuario->setSobrenome($sobrenome);
	$Usuario->setData_nasc($data_nasc);
	$Usuario->setGenero($sexo);
	$Usuario->setEmail($email);
	$Usuario->setSenha($senha);
	$Usuario->setCidade($cidade);
	$Usuario->setUf($uf);
	$Usuario->setRua($rua);
	$Usuario->setBairro($bairro);
	$Usuario->setComplemento($complemento);
	$Usuario->setTelefone($telefone);
	$Usuario->setCelular($celular);


	////VALIDAÇÃO DA IMAGEM

	if(!empty($_FILES['img-perfil']['name'])){
		echo "3 <br>";
		// qual a extensao do img-perfil?
		$extensao = strtolower(substr($_FILES['img-perfil']['name'], -4));
		//pega os ultimos 4 caracteres ()o ponto e a extensão
		echo "4 <br>";
	
		// nome do arquivo. Encriptografa pra o nome ser único
		$novo_nome = md5(time()). $extensao;
		echo "5 <br>";
	
		// diretorio onde sera enviado o arq
		$diretorio = $Usuario->getDiretorioImagemUser();
		echo "6 <br>";
	
		echo $extensao . "<br>";
		echo $novo_nome . "<br>";
		echo $diretorio;
	
		// Quando o PHP recebe um arquivo, esse arquivo é enviao para uma pasta temporaria dentro dos arquivos do PHP. Precisamos acessar essa pasta:
	
		move_uploaded_file($_FILES['img-perfil']['tmp_name'], $diretorio.$novo_nome);
		echo "7 <br>";

		$Usuario->setImg_usuario($novo_nome);

		echo "8 <br>";
	}else{
		$Usuario->setImg_usuario('sem_foto.png');
	}
	

	///////////////// Verificar se o e-mail já existe:
	$resultadoEmailJaExiste = $Usuario->getResultSetFromSelect(['email' => $Usuario->getEmail()], '*', 'usuario');
	$sql = "select * from usuario where email = '$email'";

	var_dump($resultadoEmailJaExiste);

	$usuario_existe = false;
	$email_existe = false;

	if ($resultadoEmailJaExiste) {
		//Verificar se o retorno é vazio
		$dados_usuario = mysqli_fetch_array($resultadoEmailJaExiste); // Parametro: referência para o recurso externo do PHP


		if (isset($dados_usuario['email'])) {
			//echo 'Email já cadastrado!';
			$email_existe = true;
			echo "existe";
		} 
	}


	//-------------------------------------
	$retorno_get_cadastro;

	if ($email_existe) {
		$retorno_get_cadastro = '';

		if ($email_existe) {
			$retorno_get_cadastro .= "erro_email=1&";
		}

		header('Location: pag-inscrevase.php?' . $retorno_get_cadastro);
		echo "Die - E-mail já existe!";
		die();
	}

	$columns = ['nome', 'sobrenome', 'email', 'senha', 'data_nasc', 'sexo', 'imagem_usuario'];
	$value = [$Usuario->getNome(), $Usuario->getSobrenome(), $Usuario->getEmail(), $Usuario->getSenha(), $Usuario->getData_nasc(), $Usuario->getGenero(), $Usuario->getImg_usuario()];

	$connInsertUsuario = $Usuario->insert($columns, $value, 1);

	// $sql = "insert into usuario( nome, sobrenome, email, senha, data_nasc, sexo) values ( '$nome', '$sobrenome', '$email', '$senha', '$nascimento', '$genero')";

	//executar a query (2 parametros: Conexão e SQL (a query))

	if ($connInsertUsuario) {
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}

	$Usuario->setId_usuario(mysqli_insert_id($connInsertUsuario));


	$columns = ['id_usuario_end', 'cidade', 'uf', 'rua', 'bairro', 'complemento'];
	$value = [$Usuario->getId_usuario(), $Usuario->getCidade(), $Usuario->getUf(), $Usuario->getRua(), $Usuario->getBairro(), $Usuario->getComplemento()];

	$enderecoInsert = $Usuario->insert($columns, $value, 'endereco_usuario');


	// $sql2 = "insert into endereco_usuario(id_usuario_end, cidade, uf, rua, bairro, complemento) values ({$id}, '$cidade', '$uf', '$rua', '$bairro', '$complemento')";


	if ($enderecoInsert) {
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}


	$columns = ['id_usuario_fone', 'telefone1', 'telefone2'];
	$value = [$Usuario->getId_usuario(), $Usuario->getTelefone(), $Usuario->getCelular()];

	$telefoneInsert = $Usuario->insert($columns, $value, 'telefone_usuario');

	// $sql3 = "insert into telefone_usuario( id_usuario_fone, telefone1, telefone2) values ( '$id', '$telefone', '$celular' )";

	if ($telefoneInsert) {
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}


	header('Location: pag-inscrev-sucesso.php?'.$retorno_get_cadastro);


	?>
