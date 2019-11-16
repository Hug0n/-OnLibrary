<?php
    //get dos livros exibidos na pag-principal.php
    session_start();
    
    if(!isset($_SESSION['email'])){
        header('Location: index.php?erro=1');
    }
    
    require_once('class.db.php');
    
    $id_usuario = $_SESSION['id_usuario'];
    
    $objDb = new db();
    $link = $objDb -> conecta_mysql();
    

    $sql = " SELECT * FROM livro";

   
    $resultado_id = mysqli_query($link, $sql);  
    
    if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){   
           echo '<a href="livro.php?id_livro='.$registro['id_livro'].'" class="list-group-item">';
            echo '<h4 class="list-group-item-heading"> '.$registro['nome_livro'].' <small> <br> '.$registro['categoria'].' <small class="pull-right"> '.$registro['id_livro'].'</small> </h4>';
            // echo '<p class = list-group-item-text>'.$registro['post'].'</p>';

            echo '</a>';
            // echo '<a href="#" class="list-group-item">';
            // echo '<h4 class="list-group-item-heading">'.$registro['nome'].' <small> - '. $registro['data_inclusao_formatada'].'</small></h4>';          
            //     echo '<p class=list-group-item-text>'. $registro['post'].'</p>';
              }
        
    }else {
        echo 'Erro na consulta dos posts no banco de dados. Por favor, tente novamente.';
    }

?>