<?php


abstract class Pessoa extends Model
{

    abstract function getQtdPosts($id);
    abstract function getQtdSeguindo($id);
    abstract function getQtdSeguidores($id);

    abstract function getUsuarios($id_usuario);

    // abstract function getDiretorioImagemUser();
    // abstract function UpdatePessoal($id_usuario, $nome, $sobrenome, $email, $senha, $data_nasc, $genero, $imagem_usuario);

}
