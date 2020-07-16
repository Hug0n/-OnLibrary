<?php

session_start();

$id_usuario = $_SESSION['usuario']->id_usuario;
$seguir_id_usuario = $_POST['seguir_id_usuario'];

if($seguir_id_usuario == '' || $id_usuario == '') {
    echo "DIE seguir.php!";
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}

$Usuario = new Usuario([]);
$columns = ['id_usuario', 'id_usuario_que_sigo'];
$value = [$id_usuario, $seguir_id_usuario];
$Usuario->insert($columns, $value, 'usuario_seguidores');

// $sql = "INSERT INTO usuario_seguidores(id_usuario, id_usuario_que_sigo) values ('$id_usuario', '$seguir_id_usuario')";
