<?php

class Conexao
{
    public static function getInstance()
    {
        $dsn = 'mysql:host=localhost;dbname=SistemaConsultas';
        $user = 'root';
        $pass = '';
        
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $exc) {
            
            error_log($exc->getMessage()); 
            return null;
        }
    }
}
?>
