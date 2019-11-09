<?php 

    session_start();
    
    if(!isset($_SESSION['email'])){
        header('Location: index.php?erro=1');
    }

    require_once('class.db.php');
    
    $texto_post = $_POST['texto_post'];
    $id_usuario = $_SESSION['id_usuario'];
    
    if($texto_post == '' || $id_usuario == '') {
         die(); 
        //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
    }
    
    
    
    $objDb = new db();
    $link = $objDb -> conecta_mysql();
    
    $sql = "INSERT INTO post(id_usuario_post, post) values ('$id_usuario', '$texto_post')";
    
    mysqli_query($link, $sql);




?> 