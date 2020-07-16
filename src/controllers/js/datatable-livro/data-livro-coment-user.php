<?php
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
// $result_user = "SELECT * FROM comentario_livro INNER JOIN livro, usuario WHERE id_livro_comentado = livro.id_livro AND id_usuario_comentou = id_usuario";
// $resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = $Livro->getSelectRelatorioComentarioJoin();
// echo $result_usuarios;
// var_dump($result_usuarios);
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

$resultado_usuarios = mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
	$dado = array();
	$dado[] = $row_usuarios["id_livro"];
	$dado[] = $row_usuarios["nome"];
	$dado[] = $row_usuarios["id_livro"];
	$dado[] = $row_usuarios["nome_livro"];
	$dado[] = $row_usuarios["COMENTARIO"];
	$dado[] = $row_usuarios["DATA_COMENTARIO"];


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
