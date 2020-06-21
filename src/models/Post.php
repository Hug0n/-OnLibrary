<?php

class Post extends Model
{
    private $id_post;
    private $id_usuario_post;
    private $post;
    private $data_inclusao;


    protected static $tableName = 'post'; //usado pra pegar o nome da tabela no model
    protected static $columns = [
        'id_post',
        'id_usuario_post',
        'post',
        'data_inclusao'
    ];

    //substituir o construtor de Model
    function __construct()
    {
    }

    static function getUserPosts($id_usuario)
    {

        $sql = " SELECT p.data_inclusao, p.post, p.id_post, u.nome, u.id_usuario, u.imagem_usuario ";
        $sql .= " FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) ";
        $sql .= "WHERE id_usuario_post = {$id_usuario}";
        $sql .= " OR id_usuario_post IN (select id_usuario_que_sigo FROM usuario_seguidores WHERE id_usuario = {$id_usuario}) ";
        $sql .= " ORDER BY data_inclusao DESC ";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultado_posts = mysqli_query($conn, $sql);
            return $resultado_posts;
            // return $sql;

        } else {
            echo "erro no query da classe Posts (getUserPosts())!";
        }
    }

    function getQtdCurtidas($id_post)
    {
        $sqlQtdCurtidas = "SELECT COUNT(*) AS qtd_curtidas FROM curtir_post WHERE id_curtir_post = " . $id_post;

        $conn = Database::executarSQL($sqlQtdCurtidas);


        if ($conn) {
            $resultado_QtdCurtidas = mysqli_query($conn, $sqlQtdCurtidas);
            return $resultado_QtdCurtidas;
        } else {
            echo "erro no query da classe Posts (getQtdCurtidas())!";
        }
    }

    function getPostCurtido($id_usuario, $id_post)
    {
        $sqlPostCurtido = "SELECT * FROM curtir_post WHERE id_usuario_que_curtiu = $id_usuario AND id_curtir_post=" . $id_post;

        $conn = Database::executarSQL($sqlPostCurtido);

        if ($conn) {
            $resultadoPostCurtido = mysqli_query($conn, $sqlPostCurtido);
            return $resultadoPostCurtido;
        } else {
            echo "erro no query da classe Posts (getPostCurtido())!";
        }
    }

    function testando()
    {
        echo "testando OK!!";
    }

    function updatePost() {
            
    }

    /**
     * Get the value of id_post
     */ 
    public function getId_post()
    {
        return $this->id_post;
    }

    /**
     * Set the value of id_post
     *
     * @return  self
     */ 
    public function setId_post($id_post)
    {
        $this->id_post = $id_post;

        return $this;
    }

    /**
     * Get the value of id_usuario_post
     */ 
    public function getId_usuario_post()
    {
        return $this->id_usuario_post;
    }

    /**
     * Set the value of id_usuario_post
     *
     * @return  self
     */ 
    public function setId_usuario_post($id_usuario_post)
    {
        $this->id_usuario_post = $id_usuario_post;

        return $this;
    }

    /**
     * Get the value of post
     */ 
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set the value of post
     *
     * @return  self
     */ 
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get the value of data_inclusao
     */ 
    public function getData_inclusao()
    {
        return $this->data_inclusao;
    }

    /**
     * Set the value of data_inclusao
     *
     * @return  self
     */ 
    public function setData_inclusao($data_inclusao)
    {
        $this->data_inclusao = $data_inclusao;

        return $this;
    }
}
