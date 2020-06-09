<?php

class Livro extends Model
{
    public $nomeLivro;
    public $autor;
    public $ano;
    public $descricao;
    public $categoria;
    public $dataPrazoAluguel;
    public $foraDeLinha;
    public $idioma;
    public $numeroEdicao;
    public $quantidadePaginas;
    public $imagemLivro;


    protected static $tableName = 'livro'; //usado pra pegar o nome da tabela no model
    protected static $columns = [
        'id_livro',
        'nome_livro',
        'autor',
        'ano',
        'sinopse',
        'data_prazo_aluguel',
        'categoria',
        'fora_de_linha',
        'idioma',
        'numero_edicao',
        'quantidade_paginas',
        'imagemLLivro'
    ];

    function getDiretorioImagemLivro()
    {
        $diretorio = 'assets/css/imagens/upload/capasLivros/';
        return $diretorio;
    }


    function getLivrosFavoritos($id_usuario)
    {
        $sql = " SELECT * FROM livro_favorito INNER JOIN livro ON id_livro_favorito = livro.id_livro WHERE id_usuario_favorito = $id_usuario ORDER BY data_favorito DESC ";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultado_comments = mysqli_query($conn, $sql);
            return $resultado_comments;
        } else {
            echo "erro no query da classe Livro (getComent())!";
        }
    }

    function getComent($id_livro)
    {
        $sql = " SELECT * FROM comentario_livro INNER JOIN usuario ON ID_USUARIO_COMENTOU = usuario.id_usuario WHERE ID_LIVRO_COMENTADO = $id_livro ORDER BY DATA_COMENTARIO DESC";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultado_comments = mysqli_query($conn, $sql);
            return $resultado_comments;
        } else {
            echo "erro no query da classe Livro (getComent())!";
        }
    }


    function getLinkCompra($id_livro)
    {
        $sql = "SELECT link_compra FROM livro WHERE id_livro = $id_livro";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultado_link_compra = mysqli_query($conn, $sql);
            $registro_link = mysqli_fetch_array($resultado_link_compra, MYSQLI_ASSOC);

            return $registro_link;
        } else {
            echo "erro no query da classe Livro (getLinkCompra())!";
        }
    }

    // Relatórios

    function getSqlRelatorioLivroFavorito()
    {
        $sql = "SELECT * FROM livro_favorito INNER JOIN livro, usuario WHERE id_livro_favorito = livro.id_livro AND id_usuario_favorito = usuario.id_usuario";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultadoRelatorioLivroFavorito = mysqli_query($conn, $sql);
            return $resultadoRelatorioLivroFavorito;
        } else {
            echo "erro no query da classe Livro (getSqlRelatorioLivroFavorito())!";
        }
    }


    function getSelectRelatorioLivroFavorito()
    {
        $sql = "SELECT * FROM livro_favorito INNER JOIN livro, usuario WHERE id_livro_favorito = livro.id_livro AND id_usuario_favorito = usuario.id_usuario";


        if ($sql) {
            return $sql;
        } else {
            echo "erro no query da classe Livro (getSelectRelatorioLivroFavorito())!";
        }
    }

    function getSqlRelatorioComentarioJoin()
    {
        $sql = "SELECT * FROM comentario_livro INNER JOIN livro, usuario WHERE ID_LIVRO_COMENTADO = livro.id_livro AND ID_USUARIO_COMENTOU = id_usuario";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $getSqlRelatorioComentarioJoin = mysqli_query($conn, $sql);
            return $getSqlRelatorioComentarioJoin;
        } else {
            echo "erro no query da classe Livro (getSqlRelatorioComentarioJoin())!";
        }
    }


    function getSelectRelatorioComentarioJoin()
    {
        $sql = "SELECT * FROM comentario_livro INNER JOIN livro, usuario WHERE ID_LIVRO_COMENTADO = livro.id_livro AND ID_USUARIO_COMENTOU = id_usuario";


        if ($sql) {
            return $sql;
        } else {
            echo "erro no query da classe Livro (getSelectRelatorioComentarioJoin())!";
        }
    }
}
