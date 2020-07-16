<?php
session_start();


$nome_livro = $_POST['nome_livro'];
// $id_usuario = $_SESSION['usuario']->id_usuario;

$Livro = new Livro([]);

$resultadpGetLivros = $Livro->getLivros($nome_livro);
$diretorio = $Livro->getDiretorioImagemLivro();

// $sql = "SELECT * FROM livro WHERE nome_livro LIKE '%$nome_livro%'";

if ($resultadpGetLivros) {

    while ($registro = mysqli_fetch_array($resultadpGetLivros, MYSQLI_ASSOC)) {
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
