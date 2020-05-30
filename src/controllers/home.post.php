
<?php

session_start();
loadModel('Post');


$Post = new Post();
$Usuario = new Usuario([]);

$diretorio = $Usuario->getDiretorioImagemUser();

//se for necessário instanciar classes, fazer isso aqui

$id_usuario = $_SESSION['usuario']->id_usuario;
$Post->id_usuario_post = $id_usuario;


$resultado_posts = $Post->getUserPosts($id_usuario);


// $conn = Database::executarSQL($resultado_posts);
// $resultado_posts = mysqli_query($conn, $sqlPosts);
// $registroPosts = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

loadView('home.post', [
    'resultado_posts' => $resultado_posts,
    'id_usuario' => $id_usuario,
    'Post' => $Post,
    'diretorio' => $diretorio
]);

// Pra testar:
// if($resultado_id){
//     print_r($registroPosts);
//     echo "oi";
//     echo "<br>";    

// }

