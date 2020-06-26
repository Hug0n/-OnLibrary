<?php

session_start();


// $idUsuario = $_SESSION['usuario']->id_usuario;
$codMensagem = $_POST['cod_mensagem'];

$Usuario = new Usuario([]);

//caso seja adm
// if($_SESSION['usuario']->is_admin === '1'){
//     $Adm = new Administrador([]);
//     $idUsuario = $Adm->getUsuarioDoComentario($Livro, $codMensagem);
// }


if($codMensagem == '') {
    echo("die codMensagem()");
    die();
}


$Usuario->delete('mensagens_user_perfil', ['id_mensagem' => $codMensagem]);
// $sql = "DELETE FROM COMENTARIO_LIVRO WHERE ID_USUARIO_COMENTOU = $idUsuario AND COD_COMENTARIO = $codMensagem";
