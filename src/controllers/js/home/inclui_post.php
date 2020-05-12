<?php

session_start();

loadModel('Post');


$texto_post = $_POST['texto_post'];
$id_usuario = $_SESSION['usuario']->id_usuario;

// $id_usuario = 84;
// $texto_post = "blá blá blá";

if ($texto_post == '' || $id_usuario == '') {
    echo "DIE inclui_post.php!";
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}


$columns = ['id_usuario_post', 'post'];
$value = [$id_usuario, $texto_post];


$Post = new Post();
$teste = $Post->insert($columns, $value);
