<?php


abstract class Pessoa extends Model
{

    abstract function getDiretorioImagemUser();
    abstract function UpdatePessoal($id_usuario, $nome, $sobrenome, $email, $senha, $data_nasc, $genero, $imagem_usuario);
}
