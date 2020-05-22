<?php

class Post extends Model
{
    public $id_post;
    public $id_usuario_post;
    public $post;
    public $data_inclusao;


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

        $sql = " SELECT p.data_inclusao, p.post, p.id_post, u.nome, u.id_usuario ";
        $sql .= " FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) ";
        $sql .= "WHERE id_usuario_post = {$id_usuario}";
        $sql .= " OR id_usuario_post IN (select id_usuario_que_sigo FROM usuario_seguidores WHERE id_usuario = {$id_usuario}) ";
        $sql .= " ORDER BY data_inclusao DESC ";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultado_posts = mysqli_query($conn, $sql);
            return $resultado_posts;
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
}
