<?php

    session_start();
    
    if(!isset($_SESSION['email'])){
        header('Location: index.php?erro=1');
    }
    
    require_once('class.db.php');
    
    $id_usuario = $_SESSION['id_usuario'];
    
    $objDb = new db();
    $link = $objDb -> conecta_mysql();
    
    $sql = " SELECT DATE_FORMAT(p.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, p.post, p.id_post, u.nome, u.id_usuario ";
    $sql.= " FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) "; 
    $sql.= " WHERE id_usuario_post = $id_usuario ";
    $sql.= " OR id_usuario_post IN (select id_usuario_que_sigo FROM usuario_seguidores WHERE id_usuario = $id_usuario) ";
    $sql.= " ORDER BY data_inclusao DESC "; 
    
    // $sql = "SELECT DATE_FORMAT(p.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, p.post, u.nome  FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) WHERE id_u7
    // +suario_post = $id_usuario ORDER BY data_inclusao DESC";
   
    //sem data format $sql = "SELECT p.data_inclusao, p.post, u.nome  FROM post AS p JOIN usuario AS u ON (p.id_usuario_post = u.id_usuario) WHERE id_usuario_post = $id_usuario ORDER BY data_inclusao DESC";
   
    //$sql_nome = "SELECT nome, id_usuario FROM usuario";*/
    
    
    //JOIN PARA VER OS POSTS E OS RESPECITOVS USERS DELE -> SELECT u.id_usuario, u.nome, p.post, p.data_inclusao FROM usuario AS u JOIN post AS p ON u.id_usuario = p.id_usuario_post ORDER BY data_inclusao DESC
    //$sql = "SELECT u.id_usuario, u.nome, p.post, p.data_inclusao FROM `usuario` AS u JOIN post AS p ON u.id_usuario = p.id_usuario_post";
    
    $resultado_id = mysqli_query($link, $sql);
    //$resultado_id_nome = mysqli_query($link, $sql_nome);
    
    
    if($resultado_id){
        

        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){   
           echo '<a href="#" class="list-group-item" style= border-radius:5px;background-color=blue>';

           if($id_usuario === $registro['id_usuario']){
            echo '<button type="button"  id="btn_excluir_'.$registro['id_post'].'" class="btn btn-danger btn_excluir pull-right" data-id_post="'.$registro['id_post'].'"> Excluir '.$registro['id_post'] .'</button>';
           }else{
            echo '<button type="button"  id="btn_curtir_'.$registro['id_post'].'" class="btn btn-success btn_curtir pull-right" data-id_post="'.$registro['id_post'].'"> Curtir '.$registro['id_post'] .'</button>';
            
           }
            echo '<h4 class="list-group-item-heading"> '.$registro['nome'].' <small> - '.$registro['data_inclusao_formatada'].' </small> </h4>';
            echo '<p class = list-group-item-text>'.$registro['post'].'</p>';
           echo '</a>';

              }
        
    }else {
        echo 'Erro na consulta dos posts no banco de dados. Por favor, tente novamente.';
    }
