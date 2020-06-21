<?php

class Livro extends Model
{
    private $nomeLivro;
    private $autor;
    private $ano;
    private $descricao;
    private $categoria;
    private $dataPrazoAluguel;
    private $foraDeLinha;
    private $idioma;
    private $numeroEdicao;
    private $quantidadePaginas;
    private $imagemLivro;


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

    // procurar livros 

    function getLivros($nome_livro)
    {
        $sqlGetLivros = "SELECT * FROM livro WHERE nome_livro LIKE '%$nome_livro%'";

        $conn = Database::executarSQL($sqlGetLivros);

        if ($conn) {
            $resultadoGetLivros = mysqli_query($conn, $sqlGetLivros);
            return $resultadoGetLivros;
        } else {
            echo "erro no query da classe Livro (getLivros())!";
        }
    }




    /**
     * Get the value of nomeLivro
     */
    public function getNomeLivro()
    {
        return $this->nomeLivro;
    }

    /**
     * Set the value of nomeLivro
     *
     * @return  self
     */
    public function setNomeLivro($nomeLivro)
    {
        $this->nomeLivro = $nomeLivro;

        return $this;
    }

    /**
     * Get the value of autor
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of ano
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     *
     * @return  self
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of dataPrazoAluguel
     */
    public function getDataPrazoAluguel()
    {
        return $this->dataPrazoAluguel;
    }

    /**
     * Set the value of dataPrazoAluguel
     *
     * @return  self
     */
    public function setDataPrazoAluguel($dataPrazoAluguel)
    {
        $this->dataPrazoAluguel = $dataPrazoAluguel;

        return $this;
    }

    /**
     * Get the value of foraDeLinha
     */
    public function getForaDeLinha()
    {
        return $this->foraDeLinha;
    }

    /**
     * Set the value of foraDeLinha
     *
     * @return  self
     */
    public function setForaDeLinha($foraDeLinha)
    {
        $this->foraDeLinha = $foraDeLinha;

        return $this;
    }

    /**
     * Get the value of idioma
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set the value of idioma
     *
     * @return  self
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get the value of numeroEdicao
     */
    public function getNumeroEdicao()
    {
        return $this->numeroEdicao;
    }

    /**
     * Set the value of numeroEdicao
     *
     * @return  self
     */
    public function setNumeroEdicao($numeroEdicao)
    {
        $this->numeroEdicao = $numeroEdicao;

        return $this;
    }

    /**
     * Get the value of quantidadePaginas
     */
    public function getQuantidadePaginas()
    {
        return $this->quantidadePaginas;
    }

    /**
     * Set the value of quantidadePaginas
     *
     * @return  self
     */
    public function setQuantidadePaginas($quantidadePaginas)
    {
        $this->quantidadePaginas = $quantidadePaginas;

        return $this;
    }

    /**
     * Get the value of imagemLivro
     */
    public function getImagemLivro()
    {
        return $this->imagemLivro;
    }

    /**
     * Set the value of imagemLivro
     *
     * @return  self
     */
    public function setImagemLivro($imagemLivro)
    {
        $this->imagemLivro = $imagemLivro;

        return $this;
    }
}
