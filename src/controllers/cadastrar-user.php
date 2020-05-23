 <?php

	loadModel('Model');
	loadView('cadastrar-user');

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


	$Usuario = new Usuario([
		'nome' => $nome,
		'sobrenome' => $sobrenome,
		'data_nasc' => $data_nasc,
		'sexo' => $sexo,
		'email' => $email,
		'senha' => $senha,
		'cidade' => $cidade,
		'uf' => $uf,
		'rua' => $rua,
		'bairro' => $bairro,
		'complemento' => $complemento,
		'telefone' => $telefone,
		'celular' => $celular,
	]);


	///////////////// Verificar se o e-mail já existe:
	$resultadoEmailJaExiste = $Usuario->getResultSetFromSelect(['email' => $Usuario->email], '*', 'usuario');
	$sql = "select * from usuario where email = '$email'";

	var_dump($resultadoEmailJaExiste);

	$usuario_existe = false;
	$email_existe = false;

	if ($resultadoEmailJaExiste) {
		//Verificar se o retorno é vazio
		$dados_usuario = mysqli_fetch_array($resultadoEmailJaExiste); // Parametro: referência para o recurso externo do PHP

		//var_dump($dados_usuario);

		if (isset($dados_usuario['email'])) {
			//echo 'Email já cadastrado!';
			$email_existe = true;
			echo "existe";
		} /*else {
			echo 'Email não cadastrado. Prossiga com o cadastro. </br>';
		}*/
	} 
	// else {
	// 	//Se houver erro na execução da consulta:
	// 	echo 'ERRO ao tentar localizar o registro de e-mail! </br>';
	// }


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

	$columns = ['nome', 'sobrenome', 'email', 'senha', 'data_nasc', 'sexo'];
	$value = [$Usuario->nome, $Usuario->sobrenome, $Usuario->email, $Usuario->senha, $Usuario->data_nasc, $Usuario->sexo];

	$connInsertUsuario = $Usuario->insert($columns, $value, 1);

	// $sql = "insert into usuario( nome, sobrenome, email, senha, data_nasc, sexo) values ( '$nome', '$sobrenome', '$email', '$senha', '$nascimento', '$genero')";

	//executar a query (2 parametros: Conexão e SQL (a query))

	if ($connInsertUsuario) {
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}

	$id = mysqli_insert_id($connInsertUsuario);


	$columns = ['id_usuario_end', 'cidade', 'uf', 'rua', 'bairro', 'complemento'];
	$value = [$id, $Usuario->cidade, $Usuario->uf, $Usuario->rua, $Usuario->bairro, $Usuario->complemento];

	$enderecoInsert = $Usuario->insert($columns, $value, 'endereco_usuario');


	// $sql2 = "insert into endereco_usuario(id_usuario_end, cidade, uf, rua, bairro, complemento) values ({$id}, '$cidade', '$uf', '$rua', '$bairro', '$complemento')";


	if ($enderecoInsert) {
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}


	$columns = ['id_usuario_fone', 'telefone1', 'telefone2'];
	$value = [$id, $Usuario->telefone, $Usuario->celular];

	$telefoneInsert = $Usuario->insert($columns, $value, 'telefone_usuario');

	// $sql3 = "insert into telefone_usuario( id_usuario_fone, telefone1, telefone2) values ( '$id', '$telefone', '$celular' )";

	if ($telefoneInsert) {
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}


	header('Location: pag-inscrev-sucesso.php?'.$retorno_get_cadastro);


	?>
