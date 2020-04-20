<?php
require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/usuario.php');





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


