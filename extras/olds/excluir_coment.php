<?php

session_start();

if(!isset($_SESSION['email'])){
    header('Location: index.php?erro=1');
}


require_once('class.db.php');   

$idUsuario = $_SESSION['id_usuario'];
$codComentario = $_POST['cod_coment'];

if($codComentario == '' || $idUsuario == '') {
    //alert("die");
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}

$objDb = new db();
$link = $objDb -> conecta_mysql();

$sql = "DELETE FROM COMENTARIO_LIVRO WHERE ID_USUARIO_COMENTOU = $idUsuario AND COD_COMENTARIO = $codComentario";

// $sql = "DELETE FROM usuario_seguidores WHERE id_usuario = $id_usuario AND id_usuario_que_sigo = $deixar_seguir_id_usuario";

//echo $sql;
mysqli_query($link, $sql);




?> 