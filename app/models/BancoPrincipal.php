<?php

    include __DIR__ . "/../../env/envConecta.php";

    class BancoPrincipal{
        public static function conectar() : PDO {

            global $stringConexao;

            $pdo = new PDO($stringConexao);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            return $pdo;

        }
    }