<?php

session_start();
loadModel('Post');

$idUsuario = $_SESSION['usuario']->id_usuario;
$idPost = $_POST['id_post'];

if ($idPost == '' || $idUsuario == '') {
    echo "DIE excluir_curtida.php!";
    die();
}

$Post = new Post();
$Post->delete('curtir_post', ['id_usuario_que_curtiu' => $idUsuario, 'id_curtir_post' => $idPost]);

// $sql = "DELETE FROM curtir_post WHERE id_usuario_que_curtiu = $idUsuario AND id_curtir_post = $idPost";
