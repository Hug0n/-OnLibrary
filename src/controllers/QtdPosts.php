<?php

// session_start();

$idUsuario = $_SESSION['usuario']->id_usuario;
$Usuario = new Usuario([]);


//--qtd de Posts

$resultado_id = $Usuario->getQtdPosts($idUsuario) ;
// $sql = "SELECT COUNT(*) AS qtde_posts FROM post WHERE id_usuario_post = $idUsuario";

$qtd_posts = 0;

if ($resultado_id) {
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

    $qtd_posts = $registro['qtd_posts'];
} else {
    $qtd_posts = 'Erro ao executar a Query qtd_posts';
}

//--qtd de seguindo

$resultado_id = $Usuario->getQtdSeguindo($idUsuario);
// $sql = "SELECT C OUNT(*) AS qtd_seguindo FROM usuario_seguidores WHERE id_usuario = $idUsuario";

$qtd_seguindo = 0;

if ($resultado_id) {
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

    $qtd_seguindo = $registro['qtd_seguindo'];
} else {
    $qtd_seguindo = 'Erro ao executar a Query qtd_seguindo';
}

//--qtd de seguidores

$resultado_id = $Usuario->getQtdSeguidores($idUsuario);
// $sql = "SELECT COUNT(*) AS qtd_seguidores FROM usuario_seguidores WHERE id_usuario_que_sigo = $idUsuario";

$qtd_seguidores = 0;

if ($resultado_id) {
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

	$qtd_seguidores = $registro['qtd_seguidores'];
} else {
	$qtd_seguidores = 'Erro ao executar a Query qtd_seguidoress';
}

// echo $qtd_posts;