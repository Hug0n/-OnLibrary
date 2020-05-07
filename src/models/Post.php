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

    static function getUserPosts($id_usuario)
    {
        $sql = " SELECT p.data_inclusao, p.post, p.id_post, u.nome, u.id_usuario ";
        $sql .= " FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) ";
        $sql .= "WHERE id_usuario_post = {$id_usuario}";
        $sql .= " OR id_usuario_post IN (select id_usuario_que_sigo FROM usuario_seguidores WHERE id_usuario = {$id_usuario}) ";
        $sql .= " ORDER BY data_inclusao DESC ";

        if ($sql) {
            return $sql;
        } else {
            echo "erro no query da classe Posts (getUserPosts())!";
        }
    }

     function getQtdCurtidas($id_post)
    {
        $sqlCurtidas = "SELECT COUNT(*) AS qtd_curtidas FROM curtir_post WHERE id_curtir_post = " . $id_post;


        if ($sqlCurtidas) {
            return $sqlCurtidas;
        } else {
            echo "erro no query da classe Posts (getQtdCurtidas())!";
        }
    }

    function getPostCurtido($id_usuario, $id_post)
    {
        $sqlCurtidas = "SELECT * FROM curtir_post WHERE id_usuario_que_curtiu = $id_usuario AND id_curtir_post=" . $id_post;


        if ($sqlCurtidas) {
            return $sqlCurtidas;
        } else {
            echo "erro no query da classe Posts (getQtdCurtidas())!";
        }
    }

}
