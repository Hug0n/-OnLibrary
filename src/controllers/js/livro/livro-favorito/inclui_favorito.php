
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

$columns = ['id_livro_favorito', 'id_usuario_favorito'];
$value = [$id_livro, $id_usuario];

$Livro->insert($columns, $value,'livro_favorito');
// $sql = "INSERT INTO livro_favorito(id_livro_favorito, id_usuario_favorito) values ($id_livro,$id_usuario)";
