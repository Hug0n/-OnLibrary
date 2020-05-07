<?php

class Database {
    
    public static function getConnection() 
    {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        $connDB = new mysqli(
            $env['host'], 
            $env['username'], 
            $env['password'], 
            $env['database']
        );
        if ($connDB->connect_error) {
            die("database - Errorrrrrrrrrrrrr: " . $connDB->connect_error);
        }

        return $connDB;
    }

    //consulta dos dados
    public static function getResultFromQuery($sql)
    {
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }
        //Aula 274:
        //metódo que auxilia a executar o SQL e inserir dados no BD
        //Podemos usar diretamente a partir do database.php (estático)
        public static function executeSQL($sql)
        {
            $conn = self::getConnection(); //se houver um id, retorna esse id. Caso não, retorna um outro sem problema.
            if (!mysqli_query($conn, $sql)) {//se houver algum prob na execução (n for true), lança uma excessão
                throw new Exception(mysqli_error($conn));
            }
            //se chegou aqui é pq a conexão mysqli_query($conn, $sql) foi bem sucedida
            $id = $conn->insert_id; //pega o id que foi inserido
            $conn->close(); //fecha a conexão
            return $id;
        }   


        public static function executarSQL($sql)
        {
            $conn = self::getConnection(); //se houver um id, retorna esse id. Caso não, retorna um outro sem problema.
            if (!mysqli_query($conn, $sql)) {//se houver algum prob na execução (n for true), lança uma excessão
                throw new Exception(mysqli_error($conn));
            }
            //se chegou aqui é pq a conexão mysqli_query($conn, $sql) foi bem sucedida

            return $conn;
        }   
}