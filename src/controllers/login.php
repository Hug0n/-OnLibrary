<?php
// O controller é o local que o model e a view interagem, mesmo que indiretamente:
loadModel('Login');

// loadView('Login');
// SESSION_START();
 $exception = null;

if(count($_POST) > 0) { //significa que acabei de submeter uma requisição do tipo post
    $login = new Login($_POST);
    try{
        $user = $login->checkLogin(); //se ele se logou corretamente, o metódo checLogin() retorna o $user
        echo "Usuário {$user->nome} logado =)";
        header("Location: home.php");

        // $_SESSION['user'] = $user;
    } catch(AppException $e) {
        $exception = $e;
    }

}

// //loadView('login'); e no view(login.php)//value="<?= $_POST['email'];
// //ou

loadView('login', $_POST + ['exception' => $exception]);
