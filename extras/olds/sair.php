<?php

session_start();

//FUNÇÃO UNSET ELIMINA INDÍCES DO ARRAY

//unset($_SESSION['usuario']); //paramêtros do UNSET: Array ($_SESSION) e o índice que queremos eliminar desse array( ['usuario'] );
unset($_SESSION['email']);


echo 'Esperamos que você retorne em breve!';

header('Location: index.php');




/*RESUMINDO: Na validação de acesso Temos:

 -validação que consiste na checagem do User e senha com um registro válido em um banco,
 -Havendo esse registro válido, as várias SESSION são criadas 
 -essas várias de SESSÃO passam a estar disponíveis na nossa aplicação a qualquer momento e a qualquer página, sem a necessidade de encaminhr os parametros por URL(GET) ou via POST
 -As sessões só expiram ou deixam de existir quando forçamos a remoção dos índices das superglobais de SESSÂO ($_SESSION) ou quando finalizmaos a instância do nosso navegador (fechar o navegador)


*/
?>