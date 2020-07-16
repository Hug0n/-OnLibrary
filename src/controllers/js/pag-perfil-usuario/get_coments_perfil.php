<?php
session_start();

loadModel('Post');


$id_usuario_session = $_SESSION['usuario']->id_usuario;

$id_usuario = $_POST['id_usuario'];


$Usuario = new Usuario([]);

$diretorio = $Usuario->getDiretorioImagemUser();


$resultado_id = $Usuario->getComentariosPerfil($id_usuario);

$qnt_linhas = mysqli_num_rows($resultado_id);


if ($resultado_id) {
    if ($qnt_linhas > 0) {
        // echo 'o usuário não possui nenhum comentttt...';

        while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

            echo '<div class="row list-group-users">';
            echo '<div class="col-md-3">';
            echo '<a href="pag-perfil-usuario.php?idUsuario=' . $registro['id_usuario'] . '" class="text">';

            echo '<div class="imagem-user-peq">';
            echo '<img src="' . $diretorio . $registro['imagem_usuario'] . '">';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            // echo '<a href="#" class="list-group-item" style= border-radius:20px 50px 30px >';
            echo '<div class="col-md-9">';

            if ($id_usuario === $id_usuario_session || $_SESSION['usuario']->is_admin === '1') {
                echo '<button type="button"  id="btn_excluir_coment_' . $registro['COD_COMENTARIO'] . '" class="btn btn-default btn_excluir_coment pull-right icofont-ui-delete" data-cod_comentario="' . $registro['COD_COMENTARIO'] . '"> </button>';
            }
            echo '<a href="pag-perfil-usuario.php?idUsuario=' . $registro['id_usuario'] . '" class="text">';
            echo '<h4 class="list-group-item-heading"> ' . $registro['nome'] . ' <small> - ' . date('d \d\e M \d\e Y', strtotime($registro['DATA_COMENTARIO']))  . '</small> </h4>';
            echo '<p class = list-group-item-text>' . $registro['COMENTARIO'] . '</p>';
            echo '</a>';

            echo '</div>'; //Fim coluna 2 (posts e curtidas)
            echo '</div>'; //Fim row
        }
    } else {//caso o user n tenha comentários
        echo '<br>';

        echo 'O usuário ainda não fez nenhum comentário nas páginas dos livros =(';
        echo '<br>';
        echo '<br>';

        
    }
} else {
    echo 'Erro na consulta dos posts no banco de dados. Por favor, tente novamente.';
}
