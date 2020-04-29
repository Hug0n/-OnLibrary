<?php
require_once(dirname(__FILE__, 2) . '/src/config/config.php');
// require_once(CONTROLLER_PATH . '/login.php');

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if($uri === '/' || $uri === '' || $uri === '/index.php' ){
    $uri = '/login.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");

// 250:

// loadView('login', ['texto' => 'abc123']);

// 249:

// require_once(MODEL_PATH . '/Login.php');

// $login = new Login([
//     'email' => 'bruno@hot.com',
//     'senha' => '4321'
// ]);


// try {
//     $login->checkLogin();
//     echo 'Deu Certo!!!!!';
// } catch (Exception $e) {
//     echo 'Problema no login :P';
// }


// // Aula 247: Testando o banco:
// $user = new Usuario(['nome' => 'Lucas', 'email' => 'lucas@cod3r']);

// print_r(Usuario::get([], 'nome'));
// echo "<br><br>";

// foreach(Usuario::get([], 'nome') as $user){
//     echo $user->nome;
//     echo "<br><br>";
// }
// echo Usuario::getSelect(['id_usuario'=> 84],     'id_usuario, email');
// echo "<br><br>";
// echo Usuario::getSelect(['id_usuario'=> 84, 'nome' => 'Hugonn'], 'id_usuario, email');

// Testar classe e mudança nos atributos dela:
// $user = new Usuario(['nome' => 'Lucas', 'email' => 'lucas@cod3r']);

// print_r($user);
// echo "<br><br>";
// $user->email = 'lucas_alterado@cod3r.com.br';

// print_r($user->email);

//testar usuario(exemplo):
// require_once(dirname(__FILE__, 2) . '/src/models/usuario.php');

// $sql = 'select * from usuario';
// $result = Database::getResultFromQuery($sql);


// while($row = $result->fetch_assoc()) {
//     print_r($row);
//     echo "<br>";
// }


