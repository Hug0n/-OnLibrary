<?php

session_start();

$id_usuario = $_SESSION['usuario']->id_usuario;
$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

if($deixar_seguir_id_usuario == '' || $id_usuario == '') {
    echo "DIE deixar_seguir.php!";
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}

$Usuario = new Usuario([]);
$Usuario->delete('usuario_seguidores', ['id_usuario' => $id_usuario, 'id_usuario_que_sigo' => $deixar_seguir_id_usuario]);

// $sql = "DELETE FROM usuario_seguidores WHERE id_usuario = $id_usuario AND id_usuario_que_sigo = $deixar_seguir_id_usuario";

