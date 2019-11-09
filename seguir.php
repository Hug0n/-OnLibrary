<?php

session_start();

if(!isset($_SESSION['email'])){
    header('Location: index.php?erro=1');
}

require_once('class.db.php');

$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = $_POST['seguir_id_usuario'];

if($seguir_id_usuario == '' || $id_usuario == '') {
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}



$objDb = new db();
$link = $objDb -> conecta_mysql();

$sql = "INSERT INTO usuario_seguidores(id_usuario, id_usuario_que_sigo) values ('$id_usuario', '$seguir_id_usuario')";

echo $sql;
mysqli_query($link, $sql);




?> 