<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php?erro=1');
}

require_once('class.db.php');

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " SELECT * FROM livro_favorito INNER JOIN usuario ON id_usuario_favorito = usuario.id_usuario WHERE ID_LIVRO_favorito = 8 ORDER BY data_favorito DESC";


$resultado_id = mysqli_query($link, $sql);



if ($resultado_id) {
    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
        echo '<a href="livro.php?id_livro='.$registro['id_livro'].'" class="list-group-item" style= border-radius:20px 50px 30px >';

        if($id_usuario === $registro['id_usuario']){
            echo '<button type="button"  id="btn_excluir_'.$registro['id_favorito'].'" class="btn btn-default btn_excluir pull-right" data-id_favorito="'.$registro['id_favorito'].'"> Excluir '.$registro['id_favorito'] .'</button>';
           }
            echo '<h4 class="list-group-item-heading"> '.$registro['nome'].' <small> - '.$registro['data_favorito'].' </small> </h4>';
            echo '<p class = list-group-item-text>'.$registro['id_livro '].'</p>';
           echo '</a>';

              
    }
} else {
    echo 'Erro na consulta dos posts no banco de dados. Por favor, tente novamente.';
}
