<?php

    use MD\Video;
    use MD\VideoDAO;
    use MD\BancoPrincipal;

    $novoVideo = new Video(
        null,
        $_POST['titulo'] ?? '',
        $_POST['link'] ?? ''
    );

    $pdo = BancoPrincipal::conectar();
    $pdoVideo = new VideoDAO($pdo);

    if (!$novoVideo->validarVideo() || !$pdoVideo->insertVideo($novoVideo)) {
        header("Location: /?cadastro=erro");
        exit;
    }

    header("Location: /?cadastro=sucesso");
    exit;