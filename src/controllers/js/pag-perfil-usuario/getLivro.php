<?php

session_start();
//É fundamental que inicializarmos a session no documento se formos usarmos ela

loadModel('Livro');


$id_usuario = $_SESSION['usuario']->id_usuario;
// $id_livro = 9;
$id_livro = $_POST['id_livro'];


//--query do livro
// $sql = "SELECT * FROM livro WHERE id_livro = $id_livro";

$Livro = new Livro([]);
$resultado_id = $Livro->getResultSetFromSelect(['id_livro' => $id_livro]);

$diretorio = $Livro->getDiretorioImagemLivro();
//--Atributos

if ($resultado_id) {

$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

$Livro->setNomeLivro($registro['nome_livro']);
$Livro->setAutor($registro['autor']);
$Livro->setAno($registro['ano']);
$Livro->setDescricao($registro['sinopse']);
$Livro->setCategoria($registro['categoria']);
$Livro->setDataPrazoAluguel($registro['data_prazo_aluguel']);
$Livro->setForaDeLinha($registro['fora_de_linha']);
$Livro->setIdioma($registro['idioma']);
$Livro->setNumeroEdicao($registro['numero_edicao']);
$Livro->setQuantidadePaginas($registro['quantidade_paginas']);
$Livro->setQuantidadePaginas($registro['quantidade_paginas']);
$Livro->setImagemLivro($diretorio . $registro['imagem_livro']);

// $diretorio . $registro['imagem_livro']
// imagemLivro

    // $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);


    // $livro = new Livro([

    // $Livro->getNomeLivro();
    // $Livro->getAutor();
    // $Livro->getAno();
    // $Livro->getDescricao();
    // $Livro->getCategoria();
    // $Livro->getDataPrazoAluguel();
    // $Livro->getForaDeLinha();
    // $Livro->getIdioma();
    // $Livro->getNumeroEdicao();
    // $Livro->getQuantidadePaginas();


    // 'nomeLivro' => $registro['nome_livro'],
    // 'autor' => $registro['autor'],
    // 'ano' => $registro['ano'],
    // 'descricao' => $registro['sinopse'],
    // 'categoria' => $registro['categoria'],
    // 'dataPrazoAluguel' => $registro['data_prazo_aluguel'],
    // 'foraDeLinha' => $registro['fora_de_linha'],
    // 'idioma' => $registro['idioma'],
    // 'numeroEdicao' => $registro['numero_edicao'],
    // 'quantidadePaginas' => $registro['quantidade_paginas'],
    // 'imagemLivro' => $diretorio . $registro['imagem_livro']
    // ]);


    // print_r($livro);
    // echo $livro->nomeLivro;
    // echo $livro->quantidadePaginas;
    // echo "<br>";



    // $Livro->setNomeLivro($registro['nome_livro']);
    // $Livro->setAutor($registro['autor']);
    // $Livro->setAno($registro['ano']);
    // $Livro->setDescricao($registro['sinopse']);
    // $Livro->setCategoria($registro['categoria']);
    // $Livro->setDataPrazoAluguel($registro['data_prazo_aluguel']);
    // $Livro->setForaDeLinha($registro['fora_de_linha']);
    // $Livro->setIdioma($registro['idioma']);
    // $Livro->setNumeroEdicao($registro['numero_edicao']);
    // $Livro->setQuantidadePaginas($registro['quantidade_paginas']);

    // echo json_encode(["success" => 1, "livro" => $Livro, "msg" => "ok"]);
    echo
        json_encode([
            "success" => 1,
            "nomeLivro" => $Livro->getNomeLivro(),
            "autor" => $Livro->getAutor(),
            "ano" => $Livro->getAno(),
            "descricao" => $Livro->getDescricao(),
            "categoria" => $Livro->getCategoria(),
            "dataPrazoAluguel" => $Livro->getDataPrazoAluguel(),
            "foraDeLinha" => $Livro->getForaDeLinha(),
            "idioma" => $Livro->getIdioma(),
            "numeroEdicao" => $Livro->getNumeroEdicao(),
            "quantidadePaginas" => $Livro->getQuantidadePaginas(),            "quantidadePaginas" => $Livro->getQuantidadePaginas(),
            "imagemLivro" => $Livro->getImagemLivro(),


            "msg" => "ok"
        ]);
} else {
    echo json_encode(["success" => 0, "msg" => "Erro ao executar a Query qtd_seguidores"]);
}
