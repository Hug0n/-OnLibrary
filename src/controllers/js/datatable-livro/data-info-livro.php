<?php
loadModel('Livro');

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "celke";
// $conn = mysqli_connect($servername, $username, $password, $dbname);

$conn = Database::getConnection();

//Receber a requisão da pesquisa 
$requestData = $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 => 'nome_livro', 
	1 => 'autor',
	2 => 'sinopse'
);

//Obtendo registros de número total sem qualquer pesquisa

$Livro = new Livro([]);
$resultado_user = $Livro->getResultSetFromSelect([], 'nome_livro, autor, sinopse' );
// $result_user = "SELECT nome_livro, autor, sinopse FROM livro";
// $resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$resultado_user = $Livro->getResultSetFromSelect([], 'nome_livro, autor, sinopse' );
// $result_usuarios = "SELECT nome_livro, autor, sinopse FROM livro WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome_livro LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR autor LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR sinopse LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios = mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["nome_livro"];
	$dado[] = $row_usuarios["autor"];
	$dado[] = $row_usuarios["sinopse"];	
	$dados[] = $dado;
	
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
