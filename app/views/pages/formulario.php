<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AluraTube - Novo Vídeo</title>
        <link rel="stylesheet" href="/styles.css">
        <?php

            use MD\Video;
            use MD\VideoDAO;
            use MD\BancoPrincipal;
            
            $pdo = BancoPrincipal::conectar();
            $pdoVideo = new VideoDAO($pdo);

            $video = null;

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if ($id !== false && $id !== null){
                $video = $pdoVideo->selectVideo($id);
            }
            
        ?>
    </head>
    <body>
        <?php require_once __DIR__ . "/../layout/header.php"; ?>
        <main class="centraliza">

            <h2>Preencha corretamente o formulário com os dados do vídeo.</h2>
            <form 
                class="formularioPd centraliza" 
                action="<?= ($id === false || $id === null) ? '/insertVideo' : '/updateVideo'; ?>" 
                method="POST"
            >

                <h3>Formulário do Vídeo</h3>
                <p>Preencha o formulário com os dados desejados.</p>

                <div class="campoInput">
                    <input 
                        name="titulo" 
                        id="titulo" 
                        placeholder="Digite o título do vídeo" 
                        type="text"
                        value="<?= $video?->titulo; ?>"
                    >
                    <label for="titulo">Título</label>
                </div>

                <div class="campoInput">
                    <input 
                        name="link" 
                        id="link" 
                        placeholder="Digite o link do vídeo" 
                        type="text" 
                        value="<?= $video?->link; ?>"
                    >
                    <label for="link">Link</label>
                </div>

                <input 
                    type="hidden" 
                    name="id" 
                    value="<?= 
                    $video?->id; ?>"
                >

                <input type="submit" value="Salvar">

            </form>
        </main>
        <?php require_once __DIR__ . "/../layout/footer.php"; ?>
    </body>
</html>