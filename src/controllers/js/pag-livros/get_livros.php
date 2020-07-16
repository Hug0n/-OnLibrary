<?php
session_start();
loadModel('Livro');

$id_usuario = $_SESSION['usuario']->id_usuario;

$Livro = new Livro([]);
$resultado_id = $Livro->getResultSetFromSelect();
// $sql = " SELECT * FROM livro";
$diretorio = $Livro->getDiretorioImagemLivro();


if ($resultado_id) {
    // <div class="col-md-12 ">';


    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

        echo '<a href="livro.php?id_livro=' . $registro['id_livro'] . '" >';
        echo '<div id="list-livros" class="row list-group-livros">';


        echo '<div class="col-md-3">
                    <div class="imagem-livro-peq">
                        <img src="' . $diretorio . $registro['imagem_livro'] . '">
                    </div>
                </div>';

        echo '<div class="col-md-9">

                    <h4>' .
            $registro['nome_livro'] . ' <small> </br> ' . $registro['categoria'] .
            ' <small class="pull-right"> '
            . $registro['id_livro'] . '</small> 
                    </h4>
                </div>';


        echo '</div></a>';
    }
} else {
    echo 'Erro na consulta dos livros no banco de dados. Por favor, tente novamente.
        <br>
        get_livros.php';
}
