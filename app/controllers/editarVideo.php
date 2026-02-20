<?php

    use MD\Video;
    use MD\VideoDAO;
    use MD\BancoPrincipal;
    
    $pdo = BancoPrincipal::conectar();

    $videoEditado = new Video(
        $_POST['id'] ?? null,
        $_POST['titulo'] ?? '',
        $_POST['link'] ?? ''
    );

    $pdoVideo = new VideoDAO($pdo);
    
    if(!$videoEditado->validarVideo() || $videoEditado->id === null || !$pdoVideo->updateVideo($videoEditado)){
        header("Location: /?atualizar=erro");
        exit;
    };

    header("Location: /?atualizar=sucesso");
    exit;