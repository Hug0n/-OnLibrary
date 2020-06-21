<?php

$conn = Database::getConnection();

//Receber a requisão da pesquisa 
$requestData = $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
	0 => 'id_usuario',
	1 => 'nome',
	2 => 'sobrenome',
	3 => 'email',
	4 => 'id_sugestao',
	5 => 'sugestao',
	6 => 'data_sugestao',

);

//Obtendo registros de número total sem qualquer pesquisa

$Administrador = new Administrador([]);
$resultado_sugestao = $Administrador->getSqlRelatorioSugestaoJoin();

$qnt_linhas = mysqli_num_rows($resultado_sugestao);


//Obter os dados a serem apresentados
$result_sugestao = $Administrador->getSelectRelatorioSugestaoJoin();


if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_sugestao .= " AND ( id_usuario LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_sugestao .= " OR nome LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_sugestao .= " OR sobrenome LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_sugestao .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_sugestao .= " OR id_sugestao LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_sugestao .= " OR sugestao LIKE '%" . $requestData['search']['value'] . "%' ";

	$result_sugestao .= " OR data_sugestao LIKE '%" . $requestData['search']['value'] . "%' )";

}

$resultado_sugestoes = mysqli_query($conn, $result_sugestao);
$totalFiltered = mysqli_num_rows($resultado_sugestoes);
//Ordenar o resultado
$result_sugestao .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_sugestoes = mysqli_query($conn, $result_sugestao);

// Ler e criar o array de dados
$dados = array();
while ($row_usuarios = mysqli_fetch_array($resultado_sugestoes)) {
	$dado = array();
	$dado[] = $row_usuarios["id_usuario"];
	$dado[] = $row_usuarios["nome"];
	$dado[] = $row_usuarios["sobrenome"];
	$dado[] = $row_usuarios["email"];
	$dado[] = $row_usuarios["id_sugestao"];
	$dado[] = $row_usuarios["sugestao"];
	$dado[] = $row_usuarios["data_sugestao"];

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
