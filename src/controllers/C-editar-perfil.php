<?php

session_start();
requireValidSession(); 
loadModel('Usuario');

//dados para o placeholder da página de editar perfil.
$Usuario = new Usuario([]);
$Usuario->nome = $_SESSION['usuario']->nome;
$Usuario->sobrenome = $_SESSION['usuario']->sobrenome;
$Usuario->data_nasc = $_SESSION['usuario']->data_nasc;
$Usuario->sexo = $_SESSION['usuario']->sexo;
$Usuario->email = $_SESSION['usuario']->email;
$Usuario->senha = $_SESSION['usuario']->senha;


loadTemplateView('editar-perfil', [
    'nome' => $Usuario->nome,
    'sobrenome' => $Usuario->sobrenome,
    'data_nasc' => $Usuario->data_nasc,
    'sexo' => $Usuario->sexo,
    'email' => $Usuario->email,
    'senha' => $Usuario->senha,

]);


// loadTemplateView('editar-perfil');
