<?php

    namespace MD;
    
    include __DIR__ . "/../../env/stringConexao.php";

    use PDO;

    class BancoPrincipal{
        public static function conectar() : PDO {

            global $stringConexao;

            $pdo = new PDO($stringConexao);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            return $pdo;

        }
    }