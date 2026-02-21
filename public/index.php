<?php

    use Controller\Error404Controller;

    require_once __DIR__ . "/../vendor/autoload.php";

    // Carrega as rotas
    $rotas = require_once __DIR__ . '/../config/routes.php';

    //Coletando o caminho (URL) e o método da requisição (GET, POST, etc)
    $caminho = $_SERVER['PATH_INFO'] ?? '/';
    $metodo = $_SERVER['REQUEST_METHOD'];

    //Cria uma string que serve como chave para acessar o array de rotas
    $chave = "$metodo|$caminho";

    //Verifica se a chave existe no array de rotas
    if (array_key_exists($chave, $rotas)) {

        //Cria um array igual ao da rota identificada
        [$classeController, $metodo, $videoDAO] = $rotas[$chave];
        
        //Instancia o controller adequado e chama o método correspondente
        $controller = new $classeController($videoDAO);
        $controller->$metodo();

    } else {

        //A rota é desconhecida, então instanciamos o controller de erro 404
        [$classeController, $metodo, $videoDAO] = $rotas['DEFAULT'];
        $controller = new $classeController($videoDAO);
        http_response_code(404);
        $controller->$metodo();

    }