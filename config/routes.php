<?php

    use Controller\{
        HomeController,
        FormController,
        VideoController,
        Error404Controller
    };
    use MD\VideoDAO;
    use MD\BancoPrincipal;

    $videoDAO = new VideoDAO(BancoPrincipal::conectar());

    /*
    Ao dar um require neste arquivo, ele retorna um array associativo onde a chave é a rota e o valor é um array 
    contendo a classe do controller, o método a ser chamado e as dependências necessárias para instanciar o 
    controller (neste caso um videoDAO).
    */
    return [
        'GET|/' => [HomeController::class, 'processaRequisicao', $videoDAO],
        'GET|/formulario' => [FormController::class, 'processaRequisicao', $videoDAO],
        'POST|/insertVideo' => [VideoController::class, 'insertVideo', $videoDAO],
        'POST|/deleteVideo' => [VideoController::class, 'deleteVideo', $videoDAO],
        'POST|/updateVideo' => [VideoController::class, 'updateVideo', $videoDAO],
        'DEFAULT' => [Error404Controller::class, 'processaRequisicao', $videoDAO],
    ];