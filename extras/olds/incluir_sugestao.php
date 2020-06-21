<?php 

    session_start();
    
    if(!isset($_SESSION['email'])){
        header('Location: index.php?erro=1');
    }

    require_once('class.db.php');
    
    $idUsuario = $_SESSION['id_usuario'];
    $sugestao = $_POST['txtSugestao'];
    
    if($sugestao == '' || $idUsuario == '') {
         die(); 
        //Lógica que impede continuar o registro caso uma das variáveis estejam vazias.
    }
    
    
    
    $objDb = new db();
    $link = $objDb -> conecta_mysql();
    
    $sql = "INSERT INTO sugestao_livro(id_usuario_sugestao, sugestao) values ('$idUsuario', '$sugestao')";
    
    mysqli_query($link, $sql);




?> 