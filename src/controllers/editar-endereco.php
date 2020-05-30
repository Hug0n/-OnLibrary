<?php

loadModel('Model');



$Usuario = new Usuario([]);

$Usuario->id_usuario = 192;

$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];

// $Usuario->nome = $nome;
// $Usuario->sobrenome = $sobrenome;
// $Usuario->data_nasc = $data_nasc;
// $Usuario->genero =  $sexo;
// $Usuario->email = $email;
// $Usuario->senha = $senha;


//////////////////////////////////
echo 'valores:<br>';

var_dump($Usuario->id_usuario) . '<br>';

echo ' cidade <br>';

var_dump($cidade) . '<br>';
echo ' cidade <br>';

var_dump($uf) . '<br>';
echo ' uf <br>';

var_dump($rua) . '<br>';
echo ' rua <br>';

var_dump($bairro) . '<br>';
echo ' bairro <br>';

var_dump($complemento) . '<br>';
echo ' complemento <br>';

echo '<br><br>FIM valores<br><br>';


///////// SELECT PRO USUÁRIO ESPECÍFICO:  /////////

$resultadoSelectUserEnd = $Usuario->getResultSetFromSelect(['id_usuario_end' => $Usuario->id_usuario], '*', 'endereco_usuario');
// $sql = "select * from usuario where id_usuario = '$id_usuario'


$dados_usuario_endereco = mysqli_fetch_array($resultadoSelectUserEnd);



//-------------------------------------

/////////Iniciação das variáveis
var_dump($dados_usuario_endereco['cidade']);

$Usuario->cidade  = !empty($cidade) ? $cidade : $dados_usuario_endereco['cidade'];

$Usuario->uf  = !empty($uf) ? $uf : $dados_usuario_endereco['uf'];

$Usuario->rua  = !empty($rua) ? $rua : $dados_usuario_endereco['rua'];

$Usuario->bairro  = !empty($bairro) ? $bairro : $dados_usuario_endereco['bairro'];

$Usuario->complemento = !empty($complemento) ? $complemento : $dados_usuario_endereco['complemento'];


//////////////FIM DA INSERÇÃO////////////////////



echo 'valores:<br>';

echo $Usuario->id_usuario . '<br>';


echo $Usuario->cidade . '<br>';

echo $Usuario->uf . '<br>'; 

echo $Usuario->rua . '<br>';

echo $Usuario->bairro . '<br>';

echo $Usuario->complemento . '<br>';
echo '<br><br>FIM valores<br><br>';


///////////////// 
// echo '<br><br>';
// var_dump($nome);
// echo '<br><br>';
// var_dump($Usuario->nome);
// echo '<br><br>';

// echo $Usuario->nome;

///////////////////
// var_dump($dados_usuario_endereco);


$connUpdate = $Usuario->updateEndereco(
    $Usuario->id_usuario,
    $Usuario->cidade,
    $Usuario->uf,
    $Usuario->rua,
    $Usuario->bairro,
    $Usuario->complemento,
);



if ($connUpdate) {
    $retorno_get_cadastro .= "erro_cadastro_end=0&";
} else {
    $retorno_get_cadastro .= "erro_cadastro_end=1&";
}

// header('Location: editar-perfil.php?'.$retorno_get_cadastro);
