<?php

require_once(realpath(MODEL_PATH . '/Model.php'));

class Usuario extends Model
{
    protected static $tableName = 'usuario'; //usado pra pegar o nome da tabela no model
    protected static $columns = [
        'id_usuario',
        'nome',
        'email',
        'senha',
        'data_nasc',
        'sexo',
        'sobrenome',
        'cadastro_data',
        'cadastro_fim_data',
        'is_admin'
    ];
}
