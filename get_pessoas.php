<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php?erro=1');
}

require_once ('class.db.php');

$nome_pessoa = $_POST['nome_pessoa']; // recupera o parametro inserido no formulário de procurar pessoas. "nome_pessoa" é o ID do campo.
$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();


// $sql = " SELECT u.*, us.* FROM usuario AS u LEFT JOIN usuario_seguidores AS us ON (us.id_usuario = $id_usuario AND u.id_usuario = us.id_usuario_que_sigo ) WHERE u.nome LIkE '%$nome_pessoa%' AND u.id_usuario <> $id_usuario ";


$sql = "SELECT *  FROM usuario WHERE id_usuario != $id_usuario AND nome LIKE '%$nome_pessoa%'";

// $sql = " SELECT u.*, us.* ";
// $sql.= " FROM usuario AS u ";
// $sql.= " LEFT JOIN usuario_seguidores AS us ";
// $sql.= " ON (us.id_usuario = $id_usuario AND u.id_usuario =  us.id_usuario_que_sigo) ";
// $sql.= " WHERE u.nome like '%$nome_pessoa%' AND u.id_usuario <> $id_usuario ";

// echo $sql;

$resultado_id = mysqli_query($link, $sql);


if ($resultado_id) {

     while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC )) {


        echo '<a href="#" class="list-group-item" style= border-radius:15px;margin:1px>';
            echo '<strong> '.$registro['nome'].' </strong> <small> -  '.$registro['email'].'  </small>';
            echo '<p class="list-group-item-text pull-right">';
             
            $sql2 = "SELECT *  FROM usuario_seguidores WHERE id_usuario = $id_usuario AND id_usuario_que_sigo =".$registro['id_usuario'];


            $esta_seguindo_usuario_tf = mysqli_query($link, $sql2);
            $registro2 = mysqli_fetch_array($esta_seguindo_usuario_tf, MYSQLI_ASSOC);


            $btn_seguir_display = 'block';
            $btn_deixar_seguir_display = 'block';
            
            if(!(is_array($registro2))){
                $btn_deixar_seguir_display = 'none';

            } else {
                $btn_seguir_display = 'none';
            }
            
            echo '<button type="button" id="btn_seguir_'.$registro['id_usuario'].'" style="display: '.$btn_seguir_display.'" class="btn btn-default btn_seguir" data-id_usuario="'.$registro['id_usuario'].'"> Seguir </button>';
            echo '<button type="button" id="btn_deixar_seguir_'.$registro['id_usuario'].'" style="display: '.$btn_deixar_seguir_display.'" class="btn btn-primary btn_deixar_seguir" data-id_usuario="'.$registro['id_usuario'].'"> Deixar de Seguir </button>';



            echo '</p>';
            echo '<div class="clearfix"></div>' ;
        echo '</a>';

    }
} else {
    echo 'Erro na consulta dos usuários no banco de dados. Por favor, tente novamente!!!';
}

  
?>