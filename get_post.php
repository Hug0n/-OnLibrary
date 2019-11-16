<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php?erro=1');
}

require_once('class.db.php');

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT DATE_FORMAT(p.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, p.post, p.id_post, u.nome, u.id_usuario ";
$sql .= " FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) ";
$sql .= " WHERE id_usuario_post = $id_usuario ";
$sql .= " OR id_usuario_post IN (select id_usuario_que_sigo FROM usuario_seguidores WHERE id_usuario = $id_usuario) ";
$sql .= " ORDER BY data_inclusao DESC ";

// $sql = "SELECT DATE_FORMAT(p.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, p.post, u.nome  FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) WHERE id_u7
// +suario_post = $id_usuario ORDER BY data_inclusao DESC";

//sem data format $sql = "SELECT p.data_inclusao, p.post, u.nome  FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) WHERE id_usuario_post = $id_usuario ORDER BY data_inclusao DESC";

//$sql_nome = "SELECT nome, id_usuario FROM usuario";*/


//JOIN PARA VER OS POSTS E OS RESPECITOVS USERS DELE -> SELECT u.id_usuario, u.nome, p.post, p.data_inclusao FROM usuario AS u JOIN post AS p ON u.id_usuario = p.id_usuario_post ORDER BY data_inclusao DESC
//$sql = "SELECT u.id_usuario, u.nome, p.post, p.data_inclusao FROM `usuario` AS u JOIN post AS p ON u.id_usuario = p.id_usuario_post";

$resultado_id = mysqli_query($link, $sql);
//$resultado_id_nome = mysqli_query($link, $sql_nome);



if ($resultado_id) {

    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
        echo '<a href="#" class="list-group-item" style= border-radius:5px>';
        /////////////////////////////////// Puxar a quantidade de curtidas:
        $sqlCurtidas = "SELECT COUNT(*) AS qtd_curtidas FROM curtir_post WHERE id_curtir_post = " . $registro['id_post'];

        $resultado_curtidas = mysqli_query($link, $sqlCurtidas);

        $qtd_curtidas = 0;

        if ($resultado_curtidas) {
            $registroCurtidas = mysqli_fetch_array($resultado_curtidas, MYSQLI_ASSOC);

            $qtd_curtidas = $registroCurtidas['qtd_curtidas'];
        } else {
            echo 'Erro ao executar a Query qtd_seguidores';
        }
        ///////////////////////////////////
        if ($id_usuario === $registro['id_usuario']) { //exibição do botão EXCLUIR caso o post seja "meu":
            
            ////exibição da quantidade de curtidas caso o post seja "meu"
            echo '<span class="pull-right" style="margin-right: 15px"> <input type=image src="imagens/like_heart1.jpg" width="15" height="15" > ' . $qtd_curtidas . '</span>';
            
            ////Botão Excluir
            echo '<input type=image src="imagens/remove_post.png" width="18" height="18"  id="btn_excluir_' . $registro['id_post'] . '" class="btn_excluir pull-right" style="margin-right: 25px" data-id_post="' . $registro['id_post'] . '"></input>';


        } else { //exibição do botão curtir/descurtir -> Caso o usuário seja diferente do user da sessão (outros posts):
            $sql2 = "SELECT *  FROM curtir_post WHERE id_usuario_que_curtiu = $id_usuario AND id_curtir_post=" . $registro['id_post'];


            $esta_seguindo_usuario_tf = mysqli_query($link, $sql2);
            $registro2 = mysqli_fetch_array($esta_seguindo_usuario_tf, MYSQLI_ASSOC);


            $btn_curtir_display = 'block';
            $btn_descurtir_display = 'block';

            if (!(is_array($registro2))) {
                $btn_descurtir_display = 'none';
            } else {
                $btn_curtir_display = 'none';
            }

            echo '<button type="button" id="btn_curtir_' . $registro['id_post'] . '" style="display: ' . $btn_curtir_display . '" class="btn btn-secondary btn_curtir pull-right" data-id_post="' . $registro['id_post'] . '"> <input type=image src="imagens/like_heart1.jpg" width="20" height="20"> ' . $qtd_curtidas . ' </button>';
            echo '<button type="button" id="btn_descurtir_' . $registro['id_post'] . '" style="display: ' . $btn_descurtir_display . '" class="btn btn-success btn_descurtir pull-right" data-id_post="' . $registro['id_post'] . '"> <input type=image src="imagens/like_heart1.jpg" width="20" height="20"> ' . $qtd_curtidas . ' </button>';
        } //Nome - Data do Post e Post em si
        echo '<h4 class="list-group-item-heading"> ' . $registro['nome'] . ' <small> - ' . $registro['data_inclusao_formatada'] . ' </small> </h4>';
        echo '<p class = list-group-item-text>' . $registro['post'] . '</p>';
        echo '</a>';
    }
} else {
    echo 'Erro na consulta dos posts no banco de dados. Por favor, tente novamente.';
}
