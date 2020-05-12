<?php

// Model recebe como parametro o array que é carregado a partir do loadFromArray() e do ("__construct($arr)").

// Os valores são setados em                 $this->$key = $value; 

// Os metódos mágicos são chamados e no final, todos os valores (chaves e valores) estarão dentro do atributo $values que foi definido no início(protected $values = [];)


class Model
{
    //define o mapeamento com o banco de dados
    protected static $tableName = ''; //nome da tabela
    protected static $columns = []; //colunas do BD relacionados "aquele modelo"
    protected $values = []; //série de valores que serão passados no array abaixo ($arr)

    // function __construct() {

    // }

    function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    //aula 244:
    public function loadFromArray($arr)
    {
        if ($arr) {
            foreach ($arr as $key => $value) {
                $this->$key = $value; //chamando o set (abaixo)
            }
        }
    }

    public function __get($key)
    {
        // if (isset($key)){
        return $this->values[$key];
        // }  
    }

    //exemplo $user->set('email', 'lucas_alterado@cod3r.com.br'); 
    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    // Aula 249:
    public static function getOne($filters = [], $columns = '*')
    { //implementar no login

        $class = get_called_class(); //pegar a classe que chamou o get
        $result = static::getResultSetFromSelect($filters, $columns);

        return $result ? new $class($result->fetch_assoc()) : null;
    }


    // Aula 247:
    public static function get($filters = [], $columns = '*')
    {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if ($result) { //se a função retornar nula é pq nenhum objeto foi obtido através do filtro passado
            $class = get_called_class(); //pegar a classe que chamou o get
            while ($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row)); //criar um objeto/classe do tipo que chamou o get
            }
        }
        return $objects;
    }

    public static function getResultSetFromSelect($filters = [], $columns = '*')
    {
        $sql = "SELECT ${columns} FROM "
            . static::$tableName
            . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }

    //aula 274:
    //metódo pra inserir dados no BD

    public function insert($columns, $value, $table = '')
    {
        // por padrão, a tabela é vazia e será a definida na classe (static::$tableName).
        if ($table == '') {
            $tableName = static::$tableName;
        } else {
            $tableName = $table;
        }

        $sql = "INSERT INTO " . $tableName . " ("
            . implode(",", $columns) . ") VALUES ("; ///"implode()" transforma um array em string. Definimos um separador, que nesse caso é a vírgula
        for ($i = 0; $i < count($columns); $i++) {
            echo "$value[$i] <br>";
            $sql .= static::getFormatedValue($value[$i]) . ",";
        }
        //No último foreach, haverá uma vírgula, mas o parenteses precisa ser fechado. O metódo abaixo remove a vírgula e coloca um parantêses no final da string.
        $sql[strlen($sql) - 1] = ')';

        // echo $sql;
        Database::executarSQL($sql);
    }

    public function delete($tableName, $filters = [])
    {
        $sql = "DELETE FROM " . $tableName
            . static::getFilters($filters);
        
        // echo $sql;
        Database::executarSQL($sql);
    }

    // aula 246:
    private static function getFilters($filters)
    {
        $sql = '';
        if (count($filters) > 0) { //se o filters
            $sql .= " WHERE 1 = 1"; //toda consulta terá o WHERE -> gerará 0 impacto
            foreach ($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }
    //Últimos 5 minutos - Aula 246:
    //colocar as apas nas strings para usar o metodo anterior
    // $value retornará o valor formatado de acordo com o tipo que eu passar:
    // Valor vazio: retornará null
    // String: coloca entre aspas
    private static function getFormatedValue($value)
    {
        if (is_null($value)) {
            return "null";
        } elseif (gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }
}
