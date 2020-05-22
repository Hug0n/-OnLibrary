 <?php

	loadModel('Model');
	loadView('cadastrar-user');

	echo "oi";
	echo "br";

	// $nome = $_POST['nome'];
	// $sobrenome = $_POST['sobrenome'];
	// $nascimento = $_POST['nascimento'];
	// $genero = $_POST['genero'];
	// $email = $_POST['email'];
	// $senha = $_POST['senha'];

	// $cidade = $_POST['cidade'];
	// $uf = $_POST['uf'];
	// $rua = $_POST['rua'];
	// $bairro = $_POST['bairro'];
	// $complemento = $_POST['complemento'];

	// $telefone = $_POST['telefone'];
	// $celular = $_POST['celular'];

	$nome = 'testando Pinto';
	$sobrenome = 'testando';
	$data_nasc = 'testando';
	$sexo = 'F';
	$email = 'hugon@hot.com';
	$senha = '123';

	$cidade = 'testando';
	$uf = 'PE';
	$rua = 'testando';
	$bairro = 'testando';
	$complemento = '22';

	$telefone = 81999533121;
	$celular = 81999533121;


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

	// var_dump($resultadoEmailJaExiste);

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
	} else {
		//Se houver erro na execução da consulta:
		echo 'ERRO ao tentar localizar o registro de e-mail! </br>';
	}


	//-------------------------------------

	if ($email_existe) {
		$retorno_get_cadastro = '';

		if ($email_existe) {
			$retorno_get_cadastro .= "erro_email=1&";
		}

		// header('Location: pag-inscrevase.php?' . $retorno_get);
		// die();  

	}




	$columns = ['nome', 'sobrenome', 'email', 'senha', 'data_nasc', 'sexo'];
	$value = [$Usuario->nome, $Usuario->sobrenome, $Usuario->email, $Usuario->senha, $Usuario->data_nasc, $Usuario->sexo];

	$connInsertUsuario = $Usuario->insert($columns, $value, 1);

	// $sql = "insert into usuario( nome, sobrenome, email, senha, data_nasc, sexo) values ( '$nome', '$sobrenome', '$email', '$senha', '$nascimento', '$genero')";

	//executar a query (2 parametros: Conexão e SQL (a query))


	if ($connInsertUsuario) { // A fu  nção MYSQLI retorna um valor boolean. Aproveitamos isso para checkar se é true (cadastrado com sucesso) ou false (Dado não foi cadstrado no BD).
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}


	// var_dump($connInsertUsuario);


	$id = mysqli_insert_id($connInsertUsuario);


	var_dump($id);
	echo "<br>";


	$columns = ['id_usuario_end', 'cidade', 'uf', 'rua', 'bairro', 'complemento'];
	$value = [$id, $Usuario->cidade, $Usuario->uf, $Usuario->rua, $Usuario->bairro, $Usuario->complemento];

	$segundoInsert = $Usuario->insert($columns, $value, 'endereco_usuario');



	// $sql2 = "insert into endereco_usuario(id_usuario_end, cidade, uf, rua, bairro, complemento) values ({$id}, '$cidade', '$uf', '$rua', '$bairro', '$complemento')";


	if (mysqli_query($link, $sql2)) { // A função MYSQLI retorna um valor boolean. Aproveitamos isso para checkar se é true (cadastrado com sucesso) ou false (Dado não foi cadstrado no BD).
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}

	$sql3 = "insert into telefone_usuario( id_usuario_fone, telefone1, telefone2) values ( '$id', '$telefone', '$celular' )";

	if (mysqli_query($link, $sql3)) { // A função MYSQLI retorna um valor boolean. Aproveitamos isso para checkar se é true (cadastrado com sucesso) ou false (Dado não foi cadstrado no BD).
		$retorno_get_cadastro .= "erro_cadastro=0&";
	} else {
		$retorno_get_cadastro .= "erro_cadastro=1&";
	}


	// header('Location: pag-inscrevase.php?'.$retorno_get_cadastro);


	//OBS: FUNÇÕES MYSQLI SÃO nativa do PHP

	//----------------------

	//Aprendemos nessa aula:

	/*
-Recuperar os dados de formulários via POST ou GET. No nosso caso, POST, pois estamos trabalhando com senhas (info. restrita);
-Criamos a classe de c  ão com o banco de dados utilizando a extensão MYSQLI (nativa do PHP);
-Aprendemos a como podemos executar querys a partir da classe de conexão com o Banco de Dados.
*/
	?>
