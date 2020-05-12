<?php

session_start();
loadModel('Post');

$idUsuario = $_SESSION['usuario']->id_usuario;
$idPost = $_POST['id_post'];

if ($idPost == '' || $idUsuario == '') {
    echo "die - exluir_post.php";
    die();
}

$Post = new Post();
$Post->delete('curtir_post', ['id_curtir_post' => $idPost]);
// $sql = "DELETE FROM curtir_post WHERE id_curtir_post = $idPost";


$Post->delete('post', ['id_usuario_post' => $idUsuario, 'id_post' => $idPost]);
// $sql1 = "DELETE FROM post WHERE id_usuario_post = $idUsuario AND id_post = $idPost";
