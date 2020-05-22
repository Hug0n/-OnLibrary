<?php

session_start();
loadModel('Livro');


$idUsuario = $_SESSION['usuario']->id_usuario;
$codComentario = $_POST['cod_coment'];

if($codComentario == '' || $idUsuario == '') {
    echo("die codComentario()");
    die();
}


$Livro = new Livro([]);
$Livro->delete('comentario_livro', ['id_usuario_comentou' => $idUsuario, 'cod_comentario' => $codComentario]);
// $sql = "DELETE FROM COMENTARIO_LIVRO WHERE ID_USUARIO_COMENTOU = $idUsuario AND COD_COMENTARIO = $codComentario";
