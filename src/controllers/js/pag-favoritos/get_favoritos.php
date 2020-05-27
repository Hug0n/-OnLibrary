<?php
session_start();
loadModel('Livro');

// $idUsuarioSession = $_SESSION['usuario']->id_usuario;
// //O id recebido pelo post. O dono da página dos favoritos que não necessariamente é quem está logado.
// $idUsuarioFavorito = $_POST['id_favorito'];
$idUsuarioSession = 84;
$idUsuarioFavorito = 84;
$Livro = new Livro([]);
$resultado_id = $Livro->getLivrosFavoritos($idUsuarioFavorito);
// $sql = "SELECT * FROM livro_favorito";
$diretorio = $Livro->getDiretorioImagemLivro();


if ($resultado_id) {

    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

        // echo '<span class="list-group-item" style= border-radius:5px><a href="livro.php?id_livro=' . $registro['id_livro'] . '" >';
        // echo '<h4 class="list-group-item-heading"> ' . $registro['nome_livro'] . ' <small> <br> ' . $registro['categoria'] . ' <small class="pull-right"> ' . $registro['id_livro'] . '</small> </h4>';
        // echo '<h5 class="list-group-item-heading"> Inclusão:  ' . $registro['data_favorito'] . ' <small class="pull-right"> </small> </h5>';

        // echo '</a>';

        // if ($idUsuarioSession == $idUsuarioFavorito) {
        //     echo '<button type="button"  id="btn_removerfavorito_' . $registro['id_livro'] . '" class="btn btn-default btn_excluir pull-right" data-id_livro="' . $registro['id_livro'] . '"> Excluir </button>';
        // }

        // echo '</span>';

        // -------------------------------------

        echo '<div id="list-livros" class="row list-group-livros">';


        echo '<div class="col-md-3">';
        echo '<a href="livro.php?id_livro=' . $registro['id_livro'] . '" >';

        //link pra pagina

        echo '<div class="imagem-livro-peq">';
        echo '<img src="' . $diretorio . $registro['imagem_livro'] . '">';
        echo '</div>';
        echo '</div></a>';

        echo '<div class="col-md-9">';

        if ($idUsuarioSession == $idUsuarioFavorito) {
            echo '<button type="button"  id="btn_removerfavorito_' . $registro['id_livro'] . '" class="btn btn-default btn_excluir pull-right" data-id_livro="' . $registro['id_livro'] . '"> Excluir </button>';
        }
        //link pra pagina
        echo '<a href="livro.php?id_livro=' . $registro['id_livro'] . '" >';

        echo           '<h4>' .
            $registro['nome_livro'] . ' <small> </br> ' . $registro['categoria'] .
            ' <small> '
            . $registro['id_livro'] . '</small> 
                    </h4>';

        echo     '<h6 class="list-group-item-heading"> Inclusão:  ' . $registro['data_favorito'] . ' <small class="pull-right"> </small> </h6>';

        echo '</div></a>';

        echo '</div></a>';



        // ----------------------------------------


    }
} else {
    echo 'Erro na consulta dos favoritos no banco de dados. Por favor, tente novamente.
        <br>
        get_favoritos.php';
}
