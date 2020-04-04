<?php

session_start();

if(!isset($_SESSION['email'])){
    header('Location: index.php?erro=1');
}

require_once('class.db.php');   

$idUsuario = $_SESSION['id_usuario'];
$idPost = $_POST['id_post'];

if($idPost == '' || $idUsuario == '') {
    //alert("die");
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}

$objDb = new db();
$link = $objDb -> conecta_mysql();

$sql = "DELETE FROM curtir_post WHERE id_curtir_post = $idPost";
mysqli_query($link, $sql);

$sql1 = "DELETE FROM post WHERE id_usuario_post = $idUsuario AND id_post = $idPost";

// $sql = "DELETE FROM usuario_seguidores WHERE id_usuario = $id_usuario AND id_usuario_que_sigo = $deixar_seguir_id_usuario";

//echo $sql;
mysqli_query($link, $sql1);




?> 