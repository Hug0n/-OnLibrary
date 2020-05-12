<?php

session_start();
loadModel('Post');


$idUsuario = $_SESSION['usuario']->id_usuario;
$idPost = $_POST['id_post'];

if($idPost == '' || $idUsuario == '') {
    echo "DIE curtir_post.php!";
    die();

}

$Post = new Post();
$columns = ['id_curtir_post', 'id_usuario_que_curtiu'];
$value = [$idPost, $idUsuario];
$Post->insert($columns, $value, 'curtir_post');


// $sql = "INSERT INTO curtir_post(id_curtir_post, id_usuario_que_curtiu) values ($idPost, $idUsuario )";



?> 