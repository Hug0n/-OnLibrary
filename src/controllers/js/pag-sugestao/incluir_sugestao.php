<?php

session_start();


$txtSugestao = $_POST['txtSugestao'];
$id_usuario = $_SESSION['usuario']->id_usuario;

if ($txtSugestao == '' || $id_usuario == '') {
    echo "DIE inclui_sugestao.php!";
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}


$columns = ['id_usuario_sugestao', 'sugestao'];
$value = [$id_usuario, $txtSugestao];


$Usuario = new Usuario([]);
$Usuario->insert($columns, $value, 'sugestao_livro');
