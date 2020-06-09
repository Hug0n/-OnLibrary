<?php
loadModel('Livro');

$conn = Database::getConnection();

//Receber a requisão da pesquisa 
$requestData = $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
	0 => 'id_usuario',
	1 => 'nome',
	2 => 'sobrenome',
	3 => 'email',
	4 => 'data_nasc',
	5 => 'sexo',
	6 => 'cadastro_data',
	7 => 'cadastro_fim_data',
	8 => 'is_admin',
);

//Obtendo registros de número total sem qualquer pesquisa

$Administrador = new Administrador([]);
$resultado_user = $Administrador->getSqlRelatorioUserDesab();
// $result_user = "SELECT nome_livro, autor, sinopse FROM livro";
// $resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = $Administrador->getSelectRelatorioUserDesab();
// echo $result_usuarios;
// var_dump($result_usuarios);
// $result_usuarios = "SELECT nome_livro, autor, categoria, fora_de_linha, idioma, numero_edicao, quantidade_paginas, sinopse FROM livro WHERE 1=1";

if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios .= " AND ( id_usuario LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR nome LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR sobrenome LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR data_nasc LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR sexo LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR cadastro_data LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_usuarios .= " OR cadastro_fim_data LIKE '%" . $requestData['search']['value'] . "%' ";

	$result_usuarios .= " OR is_admin LIKE '%" . $requestData['search']['value'] . "%' )";

}
// echo $result_usuarios;
// var_dump($result_usuarios);

$resultado_usuarios = mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
	$dado = array();
	$dado[] = $row_usuarios["id_usuario"];
	$dado[] = $row_usuarios["nome"];
	$dado[] = $row_usuarios["sobrenome"];
	$dado[] = $row_usuarios["email"];
	$dado[] = $row_usuarios["data_nasc"];
	$dado[] = $row_usuarios["sexo"];
	$dado[] = $row_usuarios["cadastro_data"];
	$dado[] = $row_usuarios["cadastro_fim_data"];
	$dado[] = $row_usuarios["is_admin"];

	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval($qnt_linhas),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
