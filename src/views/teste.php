<?php

loadModel('livro');
loadModel('login');

$Livro = new Livro([]);


$id_livro = 8;
$id_usuario = 84;

$Livro = new Livro([]);

// $resultadoFavoritados = $Livro->getResultSetFromSelect(['id_usuario_favorito' => $id_usuario, 'id_livro_favorito' => $id_livro], '*', 'livro_favorito');

// // var_dump($resultadoFavoritados);
// echo $resultadoFavoritados;
// echo '<br>';
// echo '<br>';

// $id_livroo = 8;
// $id_usuarioo = 84;

// $resultadoFavoritados = $Livro->getResultSetFromSelect(['id_usuario_favorito' => $id_usuarioo, 'id_livro_favorito' => $id_livroo], '*', 'livro_favorito');
// echo 'oi ';

// var_dump($resultadoFavoritados);
// echo $resultadoFavoritados;
echo '<br>';
echo '<br>';

// SINTAXE CORRETA:
$result_usuarios = $Livro->getResultSetFromSelect([1 => 1], 'nome_livro, autor, categoria, fora_de_linha, idioma, numero_edicao, quantidade_paginas, sinopse', '', 1);

// var_dump($result_usuarios);
echo $result_usuarios;
echo '<br>';
echo '<br>';
// $id_livro = 3;
// $resultado_id = $Livro->getResultSetFromSelect(['id_livro' => $id_livro]);
// var_dump($resultado_id);
// echo $resultado_id;


echo '------------------------------';


loadModel('Livro');

$conn = Database::getConnection();

//Receber a requisão da pesquisa 
$requestData = $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
	0 => 'id_usuario',
	1 => 'nome',
	2 => 'id_livro',
	3 => 'nome_livro',
	4 => 'comentario',
	5 => 'data_comentario'
);

//Obtendo registros de número total sem qualquer pesquisa

$Livro = new Livro([]);
$resultado_user = $Livro->getSqlRelatorioComentarioJoin();
// var_dump($resultado_user);
echo '<br>';
// $result_user = "SELECT * FROM comentario_livro INNER JOIN livro, usuario WHERE id_livro_comentado = livro.id_livro AND id_usuario_comentou = id_usuario";
// $resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);
// echo '<br>';

// echo '<br> oiiiii';
// // var_dump($result_usuarios . '<br>');
// // echo '<br>';
// echo '<br>';

var_dump($resultado_user);
echo '<br>';
echo '<br>';
echo '<br>';

// var_dump($qnt_linhas);
// echo '<br>';

//Obter os dados a serem apresentados
$result_usuarios = $Livro->getSelectRelatorioComentarioJoin();
// echo $result_usuarios;
var_dump($result_usuarios);
// $result_usuarios = "SELECT * FROM comentario_livro INNER JOIN livro, usuario WHERE id_livro_comentado = livro.id_livro AND id_usuario_comentou = id_usuario";

if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios .= " AND ( id_usuario LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR nome LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR id_livro LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR nome_livro LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR comentario LIKE '%" . $requestData['search']['value'] . "%' ";

	$result_usuarios .= " OR data_comentario LIKE '%" . $requestData['search']['value'] . "%' )";
}
// echo $result_usuarios;
// var_dump($result_usuarios);

echo '<br>';

echo '------------------------------';
echo '<br>';


$resultado_usuarios = mysqli_query($conn, $result_usuarios);
var_dump($resultado_usuarios);
echo '<br>';

$totalFiltered = mysqli_num_rows($resultado_usuarios);
var_dump($totalFiltered);
echo '<br>';
//Ordenar o resultado
// $result_usuarios .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";

var_dump($result_usuarios);

$resultado_usuarios = mysqli_query($conn, $result_usuarios);

echo '<br>';

// Ler e criar o array de dados
// $dados = array();
// while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
// 	$dado = array();
// 	$dado[] = $row_usuarios["id_usuario"];
// 	$dado[] = $row_usuarios["nome"];
// 	$dado[] = $row_usuarios["id_livro"];
// 	$dado[] = $row_usuarios["nome_livro"];
// 	$dado[] = $row_usuarios["comentario"];
// 	$dado[] = $row_usuarios["data_comentario"];

// 	$dados[] = $dado;
// }


// //Cria o array de informações a serem retornadas para o Javascript
// $json_data = array(
// 	"draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
// 	"recordsTotal" => intval($qnt_linhas),  //Quantidade de registros que há no banco de dados
// 	"recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
// 	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
// );

// echo json_encode($json_data);  //enviar dados como formato json
