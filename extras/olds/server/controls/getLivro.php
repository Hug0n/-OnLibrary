<?php

session_start();
//É fundamental que inicializarmos a session no documento se formos usarmos ela


if (!isset($_SESSION['email'])) { //Se o indíce do SESSION não existir(ou seja, caso o usuário NÃO passe pelo processo de autenticação no if da linha 37 do validar_acesso.php), será encaminhado para a página inicial de erro.
    header('Location: index.php?erro=1');
}


require_once('../../class.db.php');
require_once('../models/Livro.php');

$objDB = new db();
$link = $objDB->conecta_mysql();
$id_usuario = $_SESSION['id_usuario'];

$id_livro = $_POST['id_livro'];


//--query do livro
$sql = "SELECT * FROM livro WHERE id_livro = $id_livro";

$resultado_id = mysqli_query($link, $sql);

//--Atributos

if ($resultado_id) {
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

    $livro = new Livro([]);
    $livro->setNomeLivro($registro['nome_livro']);
    $livro->setAutor($registro['autor']);
    $livro->setAno($registro['ano']);
    $livro->setDescricao($registro['sinopse']);
    $livro->setCategoria($registro['categoria']);
    $livro->setDataPrazoAluguel($registro['data_prazo_aluguel']);
    $livro->setForaDeLinha($registro['fora_de_linha']);
    $livro->setIdioma($registro['idioma']);
    $livro->setNumeroEdicao($registro['numero_edicao']);
    $livro->setQuantidadePaginas($registro['quantidade_paginas']);

    echo json_encode(["success" => 1, "livro" => $livro, "msg" => "ok"]);
} else {
    echo json_encode(["success" => 0, "msg" => "Erro ao executar a Query qtd_seguidores"]);
}