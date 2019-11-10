<?php

class Livro
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

    function getNomeLivro()
    {
        return $this->nomeLivro;
    }

    function getAutor()
    {
        return $this->autor;
    }

    function getAno()
    {
        return $this->ano;
    }

    function getDescricao()
    {
        return $this->descricao;
    }

    function getCategoria()
    {
        return $this->categoria;
    }

    function getDataPrazoAluguel()
    {
        return $this->dataPrazoAluguel;
    }

    function getForaDeLinha()
    {
        return $this->foraDeLinha;
    }

    function getIdioma()
    {
        return $this->idioma;
    }

    function getNumeroEdicao()
    {
        return $this->numeroEdicao;
    }

    function getQuantidadePaginas()
    {
        return $this->quantidadePaginas;
    }

    function setNomeLivro($nomeLivro)
    {
        $this->nomeLivro = $nomeLivro;
        return $this;
    }

    function setAutor($autor)
    {
        $this->autor = $autor;
        return $this;
    }

    function setAno($ano)
    {
        $this->ano = $ano;
        return $this;
    }

    function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    function setDataPrazoAluguel($dataPrazoAluguel)
    {
        $this->dataPrazoAluguel = $dataPrazoAluguel;
        return $this;
    }

    function setForaDeLinha($foraDeLinha)
    {
        $this->foraDeLinha = $foraDeLinha;
        return $this;
    }

    function setIdioma($idioma)
    {
        $this->idioma = $idioma;
        return $this;
    }

    function setNumeroEdicao($numeroEdicao)
    {
        $this->numeroEdicao = $numeroEdicao;
        return $this;
    }

    function setQuantidadePaginas($quantidadePaginas)
    {
        $this->quantidadePaginas = $quantidadePaginas;
        return $this;
    }
}