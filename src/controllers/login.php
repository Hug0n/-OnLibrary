<?php
// O controller é o local que o model e a view interagem, mesmo que indiretamente:
loadModel('Login');
session_start();
// loadView('Login');
 $exception = null;

if(count($_POST) > 0) { //significa que acabei de submeter uma requisição do tipo post
    $login = new Login($_POST);
    try{
        $user = $login->checkLogin(); //se ele se logou corretamente, o metódo checLogin() retorna o $user
        $_SESSION['usuario'] = $user;
        header("Location: home.php");

    } catch(AppException $e) {
        $exception = $e;
    }

}

// //loadView('login'); e no view(login.php)//value="<?= $_POST['email'];
// //ou

loadView('login', $_POST + ['exception' => $exception]);
