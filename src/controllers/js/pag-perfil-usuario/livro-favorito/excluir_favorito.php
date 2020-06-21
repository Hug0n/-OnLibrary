
<?php
session_start();
loadModel('Livro');


$id_livro = $_POST['id_livro'];
$id_usuario =  $_SESSION['usuario']->id_usuario;


if ($id_livro == '' || $id_usuario == '') {
    echo "die - inclui_favorito.php";
    die();
}


$Livro = new Livro([]);

$Livro->delete('livro_favorito', ['id_livro_favorito' => $id_livro, 'id_usuario_favorito' => $id_usuario]);
