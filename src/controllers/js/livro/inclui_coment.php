<?php

session_start();
loadModel('Livro');

$id_livro = $_POST['id_livro'];
$texto_coment = $_POST['texto_post'];
$id_usuario =  $_SESSION['usuario']->id_usuario;


if ($texto_coment == '' || $id_usuario == '') {
    echo "die - inclui_coment.php";
    die();
    //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
}

// var_dump($id_l-ivro );


$Livro = new Livro([]);

$columns = ['id_livro_comentado', 'id_usuario_comentou', 'comentario'];
$value = [$id_livro, $id_usuario, $texto_coment];

$Livro->insert($columns, $value,'comentario_livro');
// $sql = "INSERT INTO COMENTARIO_LIVRO(ID_LIVRO_COMENTADO, ID_USUARIO_COMENTOU, COMENTARIO) values ($id_livro,$id_usuario, '$texto_coment')";
