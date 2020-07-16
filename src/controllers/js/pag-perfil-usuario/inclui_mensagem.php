<?php

session_start();


$texto_mensagem = $_POST['texto_mensagem'];
$id_usuario_session = $_SESSION['usuario']->id_usuario;
$id_usuario = $_POST['id_usuario'];

// $id_usuario_session = 84;
// $id_usuario = 4;
// $texto_mensagem = "blá blá blá";

if ($texto_mensagem == '' || $id_usuario == '') {
    echo "DIE inclui_mensagem.php!";
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}


$columns = ['id_usuario_comentado	', 'id_usuario_comentou', 'mensagem'];
$value = [$id_usuario, $id_usuario_session, $texto_mensagem];

$Usuario = new Usuario([]);

$Usuario->insert($columns, $value,'mensagens_user_perfil');
