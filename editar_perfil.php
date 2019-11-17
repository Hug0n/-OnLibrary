<?php

session_start();

//Superglobais POST e GET -> ARRAYS ASSOCIATIVOS

require_once('class.db.php');

$id_usuario = $_SESSION['id_usuario'];


$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$nascimento = $_POST['nascimento'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];

$telefone = $_POST['telefone'];
$celular = $_POST['celular'];

//$link recebe o retorna da função conecta_mysql q é a conexão com o Banco de dados MYSQL
$objDB = new db();
$link = $objDB->conecta_mysql(); //$link = link de conexão
//Todos os comandos relacionados ao SQL(comando e consulta, por ex) devem ser feitos logo após a instância do DB e conexão com o MySQL propriamente dito (ambos acima).
//-------------------------------------

$usuario_existe = false;
$email_existe = false;

///////////////// Verificar se o e-mail já existe:
$sql = "select * from usuario where email = '$email'";
//Sempre lembrar do ASPAS em volta da variavél, senão não funciona (não dá erro, o valor não é puxado)


if ($resultado_id = mysqli_query($link, $sql)) { // Executar a consulta no banco de dados | Parametros: Link de conexão do BD  & nossa Query (variável SQL). Executa o mysqli_query. Depois o retorno será definido no resutado_id
	//Se houver sucesso na execução da consulta:
		//Verificar se o retorno é vazio
		$dados_usuario = mysqli_fetch_array($resultado_id);// Parametro: referência para o recurso externo do PHP
 
		if (isset($dados_usuario['email'])) {
			//echo 'Email já cadastrado!';
			$email_existe = true;
		}
} else {
	//Se houver erro na execução da consulta:
	echo 'ERRO ao tentar localizar o registro de e-mail! </br>';
}


//-------------------------------------

if ($email_existe) {
	$retorno_get = '';

	if($email_existe){
	$retorno_get .= "erro_email=1&";
	}

	header('Location: pag-editarPerfil.php?'.$retorno_get);
	die();  //Interrompe o processamento aqui. TUdo abaixo não executa. É só durante os testes da função acima.
	//Garante que não seja registrado no banco de dados. 	
}



/*Como o PHP é uma linguagem interpretada, ele executa linha a linha até o fim do script

$sql2 = "insert into endereco_usuario( rua, bairro, cidade, uf, complemento) values ( '$rua', '$bairro', '$cidade', '$uf','$complemento')"; */


$sql = "UPDATE usuario SET nome='$nome', sobrenome='$sobrenome', email= '$email', senha='$senha', data_nasc='$nascimento', sexo='$genero' WHERE id_usuario = $id_usuario"; 


//executar a query (2 parametros: Conexão e SQL (a query))


if(mysqli_query($link, $sql)){ // A fu  nção MYSQLI retorna um valor boolean. Aproveitamos isso para checkar se é true (cadastrado com sucesso) ou false (Dado não foi cadstrado no BD).
    $retorno_get_cadastro .= "erro_cadastro=0&";
    
} else {
    $retorno_get_cadastro .= "erro_cadastro=1&";
}

// $id = mysqli_insert_id($link);

// echo $id;

$sql2 = "UPDATE endereco_usuario SET cidade='$cidade', uf='$uf', rua= '$rua', bairro='$bairro', complemento='$complemento' WHERE id_usuario_end = $id_usuario";


if(mysqli_query($link, $sql2)){ // A função MYSQLI retorna um valor boolean. Aproveitamos isso para checkar se é true (cadastrado com sucesso) ou false (Dado não foi cadstrado no BD).
    $retorno_get_cadastro .= "erro_cadastro=0&";
} else {
    $retorno_get_cadastro .= "erro_cadastro=1&";
}


$sql3 = "UPDATE telefone_usuario SET telefone1='$telefone', telefone2='$celular' WHERE id_usuario_fone = $id_usuario"; 



if(mysqli_query($link, $sql3)){ // A função MYSQLI retorna um valor boolean. Aproveitamos isso para checkar se é true (cadastrado com sucesso) ou false (Dado não foi cadstrado no BD).
    $retorno_get_cadastro .= "erro_cadastro=0&";
    $_SESSION['nome'] =  $_POST['nome'];
} else {
    $retorno_get_cadastro .= "erro_cadastro=1&";
}


header('Location: pag-editarPerfil.php?'.$retorno_get_cadastro);


//OBS: FUNÇÕES MYSQLI SÃO nativa do PHP

//----------------------

//Aprendemos nessa aula:

/*
-Recuperar os dados de formulários via POST ou GET. No nosso caso, POST, pois estamos trabalhando com senhas (info. restrita);
-Criamos a classe de c  ão com o banco de dados utilizando a extensão MYSQLI (nativa do PHP);
-Aprendemos a como podemos executar querys a partir da classe de conexão com o Banco de Dados.
*/
 ?>
