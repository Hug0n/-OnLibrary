<?php

session_start();

if(!isset($_SESSION['email'])){
    header('Location: index.php?erro=1');
}

require_once('class.db.php');

$idUsuario = $_SESSION['id_usuario'];
$idPost = $_POST['id_post'];

if($idPost == '' || $idUsuario == '') {
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}

$objDb = new db();
$link = $objDb -> conecta_mysql();

$sql = "INSERT INTO curtir_post(id_curtir_post, id_usuario_que_curtiu) values ($idPost, $idUsuario )";

echo $sql;
mysqli_query($link, $sql);

?> 