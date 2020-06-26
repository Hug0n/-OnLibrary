<?php

session_start();
loadModel('Livro');

$id_usuario = $_SESSION['usuario']->id_usuario;

$id_livro = $_POST['id_livro'];

$Usuario = new Usuario([]);
$diretorio = $Usuario->getDiretorioImagemUser();

$Livro = new Livro([]);

// $sql = " SELECT * FROM comentario_livro INNER JOIN usuario ON ID_USUARIO_COMENTOU = usuario.id_usuario WHERE ID_LIVRO_COMENTADO = $id_livro ORDER BY DATA_COMENTARIO DESC";


$resultado_id = $Livro->getComent($id_livro);



if ($resultado_id) {
    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

        echo '<div class="row list-group-users">';
        echo '<div class="col-md-3">';
        echo '<a href="pag-perfil-usuario.php?idUsuario='. $registro['id_usuario'] .'" class="text">';

        echo '<div class="imagem-user-peq">';
        echo '<img src="' . $diretorio . $registro['imagem_usuario'] . '">';
        echo '</div>';
        echo '</div>';
        echo '</a>';
        // echo '<a href="#" class="list-group-item" style= border-radius:20px 50px 30px >';
        echo '<div class="col-md-9">';

        if ($id_usuario === $registro['id_usuario'] || $_SESSION['usuario']->is_admin === '1') {
            echo '<button type="button"  id="btn_excluir_coment_' . $registro['COD_COMENTARIO'] . '" class="btn btn-default btn_excluir_coment pull-right icofont-ui-delete" data-cod_comentario="' . $registro['COD_COMENTARIO'] . '"> </button>';
        }
        echo '<a href="pag-perfil-usuario.php?idUsuario='. $registro['id_usuario'] .'" class="text">';
        echo '<h4 class="list-group-item-heading"> ' . $registro['nome'] . ' <small> - ' . date('d \d\e M \d\e Y', strtotime($registro['DATA_COMENTARIO']))  . '</small> </h4>';
        echo '<p class = list-group-item-text>' . $registro['COMENTARIO'] . '</p>';
        echo '</a>';

        echo '</div>'; //Fim coluna 2 (posts e curtidas)
        echo '</div>'; //Fim row
    }
} else {
    echo 'Erro na consulta dos posts no banco de dados. Por favor, tente novamente.';
}
