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


}