<?php

	session_start();//deverá ser instaciado antes de ecos,var dumps e saídas de valor na tela! Ou seja, deverá ser sempre a primeira do script

	require_once('class.db.php');

	//Relembrando: Os indíces do POST e GET são obtidos pelos atributos 'name' dos campos do formulario;
	$email = $_POST['email'];
	$senha = $_POST['senha']; //criptografada com o md5 para comparação

	/*
	echo $usuario;
	echo '</br>';
	echo $senha;
	*/

	//Consulta no BD
	$sql = " SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
	//echo $sql;   TESTE


	$objDB = new db();
	$link = $objDB->conecta_mysql();

	//--------------
	//UPDATE true/false
	//INSERT true/false 
	//SELECT resource/false -> resoucer: Referência par uma informação externa do PHP. É com ele que podemos recuperar os dados da nossa consulta, atrávés da estrutura de objetos ou de arrays
	//DELETE true/false

	$resultado_id = mysqli_query($link, $sql); // MY SQL de uma consulta SELECT ($sql). $resultdo_id é o próprio 'resource'! 

	if($resultado_id){//Testar se há erro de sintaxe ou erros de instrução de consulta. Caso o usuário não seja cadastrado.

		$dados_usuario = mysqli_fetch_array($resultado_id); // Retorna com esses dados em uma estrutura de array. Recupera e transforma o resource (referência externa ($resultdo_id, nesse caso)) em um array. 

		if (isset($dados_usuario['email'])) {
		    echo 'usuário existe';
		
		    
			$_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];
			
			header('Location: home.php');
		
		//var_dump($dados_usuario);
			
		} else {
			header('Location: index.php?erro=1');	//FOrça o redirecionamento da página. Espera um parametro (Location) que deve ser uma URL.
		}

	} else {
		echo "Erro na execução da consulta. Por favor, consulte o ADM no projeto";
	}

	//var_dump($dados_usuario); //IMprimir o Array
?>