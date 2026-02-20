<?php

    require_once __DIR__ . "/../vendor/autoload.php";

    // Captura o caminho ou define '/' como padrão se estiver vazio
    $caminho = $_SERVER['PATH_INFO'] ?? '/';

    if ($caminho === '/') {

        require_once __DIR__ . "/../app/views/pages/home.php";

    } elseif ($caminho === '/formulario') {

        require_once __DIR__ . "/../app/views/pages/formulario.php";
        
    } elseif ($caminho === '/deleteVideo') {

        require_once __DIR__ . "/../app/controllers/excluirVideo.php";

    } elseif ($caminho === '/updateVideo') {

        require_once __DIR__ . "/../app/controllers/editarVideo.php";

    } elseif ($caminho === '/insertVideo') {

        require_once __DIR__ . "/../app/controllers/novoVideo.php";

    } else {

        http_response_code(404);
        require_once __DIR__ . "/../app/views/pages/erro404.php";
    
    }