<?php

    require_once __DIR__ . "/../vendor/autoload.php";

    $caminho = $_SERVER['PATH_INFO'] ?? '/';
    $metodo = $_SERVER['REQUEST_METHOD'];

    if ($metodo === 'POST') {

        $controller = new Controller\VideoController(new MD\VideoDAO(MD\BancoPrincipal::conectar()));

        switch ($caminho) {
            case '/insertVideo':
            
                $controller->insertVideo(); 
                break;
            
            case '/deleteVideo':
            
                $controller->deleteVideo();
                break;

            case '/updateVideo':
            
                $controller->updateVideo();
                break;
            
            default:

                http_response_code(404);
                require_once __DIR__ . "/../app/views/erro404.php";
                break;
        }
    } 
    elseif ($metodo === 'GET') {

        switch ($caminho) {

            case '/':

                $controller = new Controller\HomeController(new MD\VideoDAO(MD\BancoPrincipal::conectar()));
                $controller->processaRequisicao(); 
                break;

            case '/formulario':

                $controller = new Controller\FormController(new MD\VideoDAO(MD\BancoPrincipal::conectar()));
                $controller->processaRequisicao(); 
                break;

            default:

                http_response_code(404);
                require_once __DIR__ . "/../app/views/erro404.php";
                break;

        }
    }