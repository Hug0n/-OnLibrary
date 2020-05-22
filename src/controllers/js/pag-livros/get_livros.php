<?php
    session_start();
    loadModel('Livro');

    $id_usuario = $_SESSION['usuario']->id_usuario;

    $Livro = new Livro([]);
    $resultado_id = $Livro->getResultSetFromSelect();
    // $sql = " SELECT * FROM livro";

       
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
        echo 'Erro na consulta dos livros no banco de dados. Por favor, tente novamente.
        <br>
        get_livros.php';
    }

?>