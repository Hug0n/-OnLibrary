<?php

loadModel('Login');
session_start();

// $id_usuario = $_SESSION['usuario']->usuario;

var_dump($_FILES['img-perfil']);
echo '<br>';
var_dump($_FILES['img-perfil']['name']);

// $nome = 'bordinhalands';
// $sobrenome = 'Landsss 2';
// $data_nasc = '28/05/20';
// $sexo = 'N';
// $email = 'epica@gamess.com';
// $senha = '1234';

$Usuario = new Usuario([]);

$Usuario->id_usuario = $_SESSION['usuario']->id_usuario;

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_nasc = $_POST['nascimento'];
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


//////////////////////////////////
// echo 'valores:<br>';

// var_dump($Usuario->id_usuario) . '<br>';

// echo ' nome <br>';

// var_dump($nome) . '<br>';
// echo ' nome <br>';

// var_dump($sobrenome) . '<br>';
// echo ' sobrenome <br>';

// var_dump($data_nasc) . '<br>';
// echo ' data_nasc <br>';

// var_dump($genero) . '<br>';
// echo ' genero <br>';

// var_dump($email) . '<br>';
// echo ' email <br>';

// echo '<br><br>FIM valores<br><br>';



///////// SELECT PRO USUÁRIO ESPECÍFICO:  /////////

$resultadoSelectUser = $Usuario->getResultSetFromSelect(['id_usuario' => $Usuario->id_usuario], '*', 'usuario');
// $sql = "select * from usuario where id_usuario = '$id_usuario'



$dados_usuario = mysqli_fetch_array($resultadoSelectUser);



//-------------------------------------

/////////Iniciação das variáveis - PESSOAL
var_dump($dados_usuario['nome']);

$Usuario->nome  = !empty($nome) ? $nome : $dados_usuario['nome'];

$Usuario->sobrenome  = !empty($sobrenome) ? $sobrenome : $dados_usuario['sobrenome'];

$Usuario->data_nasc  = !empty($data_nasc) ? $data_nasc : $dados_usuario['data_nasc'];

$Usuario->genero  = !empty($genero) ? $genero : $dados_usuario['sexo'];

$Usuario->email = !empty($email) ? $email : $dados_usuario['email'];

$Usuario->senha  = !empty($senha) ? $senha : $dados_usuario['senha'];

////VALIDAÇÃO DA IMAGEM

if (!empty($_FILES['img-perfil']['name'])) {
    // echo "3 <br>";
    // qual a extensao do img-perfil?
    $extensao = strtolower(substr($_FILES['img-perfil']['name'], -4));
    //pega os ultimos 4 caracteres ()o ponto e a extensão
    // echo "4 <br>";

    // nome do arquivo. Encriptografa pra o nome ser único
    $novo_nome = md5(time()) . $extensao;
    // echo "5 <br>";

    // diretorio onde sera enviado o arq
    $diretorio = $Usuario->getDiretorioImagemUser();
    // echo "6 <br>";

    // echo $extensao . "<br>";
    // echo $novo_nome . "<br>";
    // echo $diretorio;

    // Quando o PHP recebe um arquivo, esse arquivo é enviao para uma pasta temporaria dentro dos arquivos do PHP. Precisamos acessar essa pasta:

    move_uploaded_file($_FILES['img-perfil']['tmp_name'], $diretorio . $novo_nome);
    // echo "7 <br>";

    $Usuario->imagem_usuario = $novo_nome;

    // echo "8 <br>";
} else {
    $Usuario->imagem_usuario  = $dados_usuario['imagem_usuario'];
}





//////////////FIM DA INSERÇÃO////////////////////


///////////////// Verificar se o e-mail já existe:
$resultadoEmailJaExiste = $Usuario->getResultSetFromSelect(['email' => $Usuario->email], '*', 'usuario');
// $sql = "select * from usuario where email = '$email'";

/////////  VALIDAR E-MAIL:  /////////

$usuario_existe = false;
$email_existe = false;

if ($dados_usuario['email'] != $Usuario->email) {

    if ($resultadoEmailJaExiste) {
        $dados_usuario_email = mysqli_fetch_array($resultadoEmailJaExiste);
        if (isset($dados_usuario_email['email'])) {
            $email_existe = true;
            echo "<br> EXISTE <br>";
        }
    }
}
$retorno_get_cadastro = '';

if ($email_existe) {


    $retorno_get_cadastro .= "erro_email=1&";

    header('Location: C-editar-perfil.php?' . $retorno_get_cadastro);
    echo "Die - E-mail já existe!";
    die();
}


///////// FIM VALIDAR E-MAIL /////////

echo 'valores TESTE:<br>';

echo $Usuario->id_usuario . '<br>';


echo $Usuario->nome . '<br>';

echo $Usuario->sobrenome . '<br>';

echo $Usuario->data_nasc . '<br>';

echo $Usuario->genero . '<br>';

echo $Usuario->email . '<br>';
echo '<br><br>FIM valores<br><br>';


///////////////// 
// echo '<br><br>';
// var_dump($nome);
// echo '<br><br>';
// var_dump($Usuario->nome);
// echo '<br><br>';

// echo $Usuario->nome;

// ///////////////////
// var_dump($dados_usuario);
///////////////////

///////// SELECT PRO ENDEREÇO:  /////////

$resultadoSelectUserEnd = $Usuario->getResultSetFromSelect(['id_usuario_end' => $Usuario->id_usuario], '*', 'endereco_usuario');
// $sql = "select * from usuario where id_usuario = '$id_usuario'


$dados_usuario_endereco = mysqli_fetch_array($resultadoSelectUserEnd);



//-------------------------------------

/////////Iniciação das variáveis - ENDEREÇO
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

///////// SELECT PRO TELEFONE:  /////////

$resultadoSelectUserFone = $Usuario->getResultSetFromSelect(['id_usuario_fone' => $Usuario->id_usuario], '*', 'telefone_usuario');
// $sql = "select * from telefone_usuario where id_usuario = '$id_usuario'


$dados_usuario_fone = mysqli_fetch_array($resultadoSelectUserFone);



//-------------------------------------

/////////Iniciação das variáveis - TELEFONE


$Usuario->telefone  = !empty($telefone) ? $telefone : $dados_usuario_fone['telefone1'];

$Usuario->celular  = !empty($celular) ? $celular : $dados_usuario_fone['telefone2'];


//////////////FIM DA INSERÇÃO////////////////////



// echo 'valores:<br>';

// echo $Usuario->id_usuario . '<br>';


// echo $Usuario->cidade . '<br>';

// echo $Usuario->uf . '<br>';

// echo $Usuario->rua . '<br>';

// echo $Usuario->bairro . '<br>';

// echo $Usuario->complemento . '<br>';
// echo '<br><br>FIM valores<br><br>';



$connUpdate = $Usuario->updatePessoal(
    $Usuario->id_usuario,
    $Usuario->nome,
    $Usuario->sobrenome,
    $Usuario->email,
    $Usuario->senha,
    $Usuario->data_nasc,
    $Usuario->genero,
    $Usuario->imagem_usuario,

);

$connUpdateEnd = $Usuario->updateEndereco(
    $Usuario->id_usuario,
    $Usuario->cidade,
    $Usuario->uf,
    $Usuario->rua,
    $Usuario->bairro,
    $Usuario->complemento,
);

$connUpdateEnd = $Usuario->updateTelefone(
    $Usuario->id_usuario,
    $Usuario->telefone,
    $Usuario->celular,
);




if ($connUpdate && $connUpdateEnd) {
    $retorno_get_cadastro .= "erro_cadastro=0&";
    $sucesso = true;
} else {
    $retorno_get_cadastro .= "erro_cadastro=1&";
    $sucesso = false;

}


// echo "<br><br>";
// var_dump($_POST);
// echo "<br><br>";

// if ($sucesso) { //significa que acabei de submeter uma requisição do tipo post
    $login = new Login(['email' => $Usuario->email, 'senha' => $Usuario->senha]);

    try {

        $user = $login->checkLogin(); //se ele se logou corretamente, o metódo checLogin() retorna o $user

        $_SESSION['usuario'] = $user;
        header('Location: pag-editar-perfil-sucesso.php?' . $retorno_get_cadastro);
    } catch (AppException $e) {
        $exception = $e;
    }
// }

