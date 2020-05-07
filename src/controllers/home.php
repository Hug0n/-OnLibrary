
<?php

session_start();
loadModel('Post');
requireValidSession(); //Se n tiver user na sessão, redireciona pra login


$date = (new DateTime())->getTimestamp();
$today = strftime('%d de %B de %Y');

$Post = new Post();


//se for necessário instanciar classes, fazer isso aqui
$id_usuario = $_SESSION['usuario']->id_usuario;
$sqlPosts = $Post->getUserPosts($id_usuario);


$conn = Database::executarSQL($sqlPosts);

$resultado_posts = mysqli_query($conn, $sqlPosts);



// $registroPosts = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

loadTemplateView('home', [
    'today' => $today,
    'resultado_posts' => $resultado_posts,
    'id_usuario' => $id_usuario,
    'conn' => $conn,
    'Post' => $Post
]);

// Pra testar:
// if($resultado_id){
//     print_r($registroPosts);
//     echo "oi";
//     echo "<br>";    

// }

