<?php 

    session_start();
    
    if(!isset($_SESSION['email'])){
        header('Location: index.php?erro=1');
    }

    require_once('class.db.php');

    $idLivro = $_POST['id_livro'];
    $idUsuario = $_SESSION['id_usuario'];
    
        if($idLivro == '' || $idUsuario == '') {
             die(); 
            //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
        }
        
    var_dump($idLivro);
    $objDb = new db();
    $link = $objDb -> conecta_mysql();
    
    $sql = "INSERT INTO livro_favorito(id_livro_favorito, id_usuario_favorito) values ($idLivro , $idUsuario )";
    
    mysqli_query($link, $sql);




?> 