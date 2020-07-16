<?php

loadModel('Usuario');

require_once(realpath(CONTROLLER_PATH . 'cadastrar-user.php'));

$id_usuario = $_SESSION['usuario']->id_usuario;

// $id_livro = 9;
$id_livro = $_POST['id_livro'];


//--query do livro
// $sql = "SELECT * FROM livro WHERE id_livro = $id_livro";

$Livro = new Livro([]);
$resultado_id = $Livro->getResultSetFromSelect(['id_livro' => $id_livro]);

//--Atributos

if ($resultado_id) {
    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

    $livro = new Livro([
        'nomeLivro' => $registro['nome_livro'],
        'autor' => $registro['autor'],
        'ano' => $registro['ano'],
        'descricao' => $registro['sinopse'],
        'categoria' => $registro['categoria'],
        'dataPrazoAluguel' => $registro['data_prazo_aluguel'],
        'foraDeLinha' => $registro['fora_de_linha'],
        'idioma' => $registro['idioma'],
        'numeroEdicao' => $registro['numero_edicao'],
        'quantidadePaginas' => $registro['quantidade_paginas']
    ]);
    // print_r($livro);
    // echo $livro->nomeLivro;
    // echo $livro->quantidadePaginas;
    // echo "<br>";



    // $livro->setNomeLivro($registro['nome_livro']);
    // $livro->setAutor($registro['autor']);
    // $livro->setAno($registro['ano']);
    // $livro->setDescricao($registro['sinopse']);
    // $livro->setCategoria($registro['categoria']);
    // $livro->setDataPrazoAluguel($registro['data_prazo_aluguel']);
    // $livro->setForaDeLinha($registro['fora_de_linha']);
    // $livro->setIdioma($registro['idioma']);
    // $livro->setNumeroEdicao($registro['numero_edicao']);
    // $livro->setQuantidadePaginas($registro['quantidade_paginas']);

    echo json_encode(["success" => 1, "livro" => $livro, "msg" => "ok"]);
} else {
    echo json_encode(["success" => 0, "msg" => "Erro ao executar a Query qtd_seguidores"]);
}
