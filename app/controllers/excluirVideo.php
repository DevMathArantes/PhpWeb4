<?php

    use MD\VideoDAO;
    use MD\BancoPrincipal;

    $pdo = BancoPrincipal::conectar();
    $pdoVideo = new VideoDAO($pdo);

    $pdoVideo->deleteVideo($_POST['id']);

    if($pdoVideo->deleteVideo($_POST['id'])){
        header("Location: /?exclusao=sucesso");
        exit;
    } else {
        header("Location: /?exclusao=erro");
        exit;
    }