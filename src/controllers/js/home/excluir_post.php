<?php

session_start();
loadModel('Post');

$idUsuario = $_SESSION['usuario']->id_usuario;
$idPost = $_POST['id_post'];

$Post = new Post();

//caso seja adm
if($_SESSION['usuario']->is_admin === '1'){
    $Adm = new Administrador([]);
    $idUsuario = $Adm->getUsuarioDoPost($Post, $idPost);
}


if ($idPost == '' || $idUsuario == '') {
    echo "die - exluir_post.php";
    die();
}

$Post->delete('curtir_post', ['id_curtir_post' => $idPost]);
// $sql = "DELETE FROM curtir_post WHERE id_curtir_post = $idPost";


$Post->delete('post', ['id_usuario_post' => $idUsuario, 'id_post' => $idPost]);
// $sql1 = "DELETE FROM post WHERE id_usuario_post = $idUsuario AND id_post = $idPost";
