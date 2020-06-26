<?php

loadModel('Pessoa');

class Administrador extends Pessoa
{
    private $id_usuario;

    private $nome;
    private $sobrenome;
    private $data_nasc;
    private $genero;
    private $email;
    private $senha;
    private $img_usuario;

    private $cidade;
    private $uf;
    private $rua;
    private $bairro;
    private $complemento;

    private $telefone;
    private $celular;


    protected static $tableName = 'usuario'; //usado pra pegar o nome da tabela no model
    protected static $columns = [
        'id_usuario',
        'nome',
        'email',
        'senha',
        'data_nasc',
        'sexo',
        'sobrenome',
        'cadastro_data',
        'cadastro_fim_data',
        'is_admin',
        'imagem_usuario'
    ];



    //Polimorfirmo - retorna todos os posts - Visão Geral
    function getQtdPosts($idAdm)
    {
        $sqlGetQtdPosts = "SELECT COUNT(*) AS qtd_posts FROM post";

        $conn = Database::executarSQL($sqlGetQtdPosts);

        if ($conn && $idAdm) {
            $resultadoGetQtdPosts = mysqli_query($conn, $sqlGetQtdPosts);
            return $resultadoGetQtdPosts;
        } else {
            echo "erro no query da classe Posts (getQtdPosts())!";
        }
    }

    //Polimorfirmo- retorna todos os posts - Visão Geral - Para o Adm como anda os seguidores vs seguindo 
    function getQtdSeguindo($idAdm)
    {
        $sqlGetQtdSeguindo = "SELECT COUNT(*) AS qtd_seguindo FROM usuario_seguidores";

        $conn = Database::executarSQL($sqlGetQtdSeguindo);

        if ($conn && $idAdm) {
            $resultadoGetQtdSeguindo = mysqli_query($conn, $sqlGetQtdSeguindo);
            return $resultadoGetQtdSeguindo;
        } else {
            echo "erro no query da classe Posts (getQtdSeguindo())!";
        }
    }

    //Polimofirmo
    function getQtdSeguidores($idAdm)
    {
        $sqlGetQtdSeguidores = "SELECT COUNT(*) AS qtd_seguidores FROM usuario_seguidores";

        $conn = Database::executarSQL($sqlGetQtdSeguidores);

        if ($conn && $idAdm) {
            $resultadoGetQtdSeguidores = mysqli_query($conn, $sqlGetQtdSeguidores);
            return $resultadoGetQtdSeguidores;
        } else {
            echo "erro no query da classe Posts (getQtdSeguidores())!";
        }
    }
    // RELATÓRIOS---------------------------

    // Relatório User Disable -------------

    function getSqlRelatorioUserDesab()
    {
        $sql = "SELECT * FROM `usuario` WHERE cadastro_fim_data is NOT NULL";
        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultadoRelatorioLivroFavorito = mysqli_query($conn, $sql);
            return $resultadoRelatorioLivroFavorito;
        } else {
            echo "erro no query da classe Livro (getSqlRelatorioLivroFavorito())!";
        }
    }

    function getSelectRelatorioUserDesab()
    {
        $sql = "SELECT * FROM `usuario` WHERE cadastro_fim_data is NOT null";


        if ($sql) {
            return $sql;
        } else {
            echo "erro no query da classe Livro (getSelectRelatorioLivroFavorito())!";
        }
    }

    // Relatório Posts---------------------------

    function getSqlRelatorioPosts()
    {
        $sql = "SELECT * FROM post INNER JOIN usuario where usuario.id_usuario = post.id_usuario_post";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $getSqlRelatorioComentarioJoin = mysqli_query($conn, $sql);
            return $getSqlRelatorioComentarioJoin;
        } else {
            echo "erro no query da classe Livro (getSqlRelatorioPosts())!";
        }
    }


    function getSelectRelatorioPosts()
    {
        $sql = "SELECT * FROM post INNER JOIN usuario where usuario.id_usuario = post.id_usuario_post";


        if ($sql) {
            return $sql;
        } else {
            echo "erro no query da classe Livro (getSelectRelatorioPosts())!";
        }
    }

    function getUsuarioDoPost($Post, $idPost)
    {

        // select id_usuario_post FROM post WHERE id_post = 110

        $resultado_id = $Post->getResultSetFromSelect(['id_post' => $idPost], 'id_usuario_post');

        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

        $idUsuario = $registro['id_usuario_post'];

        return $idUsuario;
    }

    function getUsuarioDoComentario($Livro, $codComentario)
    {
        // public static function  getResultSetFromSelect($filters = [], $columns = '*', $table = '', $sql_return = 0)

        // select id_usuario_post FROM post WHERE id_post = 110

        $resultado_id = $Livro->getResultSetFromSelect(['COD_COMENTARIO' => $codComentario], 'ID_USUARIO_COMENTOU', 'comentario_livro');

        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

        $idUsuarioComent = $registro['ID_USUARIO_COMENTOU'];

        return $idUsuarioComent;
    }


    function getSqlRelatorioSugestaoJoin()
    {
        $sql = "SELECT * FROM sugestao_livro INNER JOIN usuario WHERE id_usuario_sugestao = usuario.id_usuario";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $getSqlRelatorioSugestaoJoin = mysqli_query($conn, $sql);
            return $getSqlRelatorioSugestaoJoin;
        } else {
            echo "erro no query da classe Livro (getSqlRelatorioSugestaoJoin())!";
        }
    }


    function getSelectRelatorioSugestaoJoin()
    {
        $sql = "SELECT * FROM sugestao_livro INNER JOIN usuario WHERE id_usuario_sugestao = usuario.id_usuario";

        if ($sql) {
            return $sql;
        } else {
            echo "erro no query da classe Livro (getSelectRelatorioComentarioJoin())!";
        }
    }

    function getUsuarios($idUsuario = 'id_usuario')
    {
        
        $sqlgetUsuario = "SELECT * FROM usuario INNER JOIN endereco_usuario, telefone_usuario WHERE endereco_usuario.id_usuario_end = $idUsuario AND telefone_usuario.id_usuario_fone = $idUsuario AND id_usuario = $idUsuario";

        $conn = Database::executarSQL($sqlgetUsuario);

        if ($conn) {
            $resultadoGetUsuario = mysqli_query($conn, $sqlgetUsuario);
            return $resultadoGetUsuario;
        } else {
            echo "erro no query da classe Usuario (getUsuario())!";
        }
    }
}
