<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AluraTube</title>
    <link rel="stylesheet" href="/styles.css">
    <?php 

        use MD\Video;
        use MD\VideoDAO;
        use MD\BancoPrincipal;
        
        $pdo = BancoPrincipal::conectar();
        $pdoVideo = new VideoDAO($pdo);
        $videos = $pdoVideo->getVideos();

        //filter_has_var(INPUT_GET, 'x') serve para verificar se um parâmetro GET chamado 'x' existe
        $statusCadastro = filter_input(INPUT_GET, 'cadastro', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($statusCadastro) {
            if ($statusCadastro === 'sucesso') {
                echo "<p class='mensagem sucesso sumir-suave'>Vídeo cadastrado com sucesso!</p>";
            } elseif ($statusCadastro === 'erro') {
                echo "<p class='mensagem erro sumir-suave'>Erro ao cadastrar vídeo. Tente novamente.</p>";
            }
        }

        $statusExclusao = filter_input(INPUT_GET, 'exclusao', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($statusExclusao) {
            if ($statusExclusao === 'sucesso') {
                echo "<p class='mensagem sucesso sumir-suave'>Vídeo excluído com sucesso!</p>";
            } elseif ($statusExclusao === 'erro') {
                echo "<p class='mensagem erro sumir-suave'>Erro ao excluir vídeo. Tente novamente.</p>";
            }
        }

        $statusAtualizacao = filter_input(INPUT_GET, 'atualizar', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($statusAtualizacao) {
            if ($statusAtualizacao === 'sucesso') {
                echo "<p class='mensagem sucesso sumir-suave'>Vídeo atualizado com sucesso!</p>";
            } elseif ($statusAtualizacao === 'erro') {
                echo "<p class='mensagem erro sumir-suave'>Erro ao atualizar vídeo. Tente novamente.</p>";
            }
        }

    ?>

</head>
<body>
    <header>
        <nav class="centraliza">
            <img src="../assets/icons/logo.png" alt="icone logo" class="logo">
            <h1>AluraTube</h1>
            <ul class="centraliza">
                <a href="https://github.com/DevMathArantes/PhpWeb4">Git-Hub</a>
                <a href="https://cursos.alura.com.br/dashboard">Alura</a>
                <a href="/formulario" class="linkPrincipal centraliza">
                    <span>Novo Vídeo</span>
                    <img src="../assets/icons/novoVideo.png" alt="icone novo video">
                </a>
            </ul>
        </nav>
        <div class="rolarTxt">
            <p>
                Este é o projeto prático da formação de php para a web da ALURA (curso 4/6) com foco em padrão MVC.
            </p>
        </div>
        <img class="imgPrincipal" src="../assets/images/alura.jpg" alt="imagem da alura">
    </header>
    <main class="centraliza">

        <h2>Confira o canal da Alura</h2>
        <p>Boas-vindas ao Canal da Alura!</p><br>
        <iframe class="videoPrincipal"
            src="https://www.youtube.com/embed/d_VinJe8mfQ" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
        </iframe><br>
        <p>
            É aqui que você vai encontrar vídeos com conteúdos atualizados e aprofundados sobre os temas mais relevantes 
            e inovadores da tecnologia. 
        </p>

        <ul class="videos">

            <?php foreach($videos as $video): ?>

                <li class="centraliza">
                    <iframe
                        src="<?= $video->link; ?>" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        referrerpolicy="strict-origin-when-cross-origin" 
                        allowfullscreen>
                    </iframe>
                    <h3><?= $video->titulo; ?></h3>
                    <form class="opcVideo editar" action="/formulario" method="POST">
                        <input type="hidden" name="id" value="<?= $video->id; ?>">
                        <input type="submit" value="Editar">
                    </form>
                    <form class="opcVideo excluir" action="/deleteVideo" method="POST">
                        <input type="hidden" name="id" value="<?= $video->id; ?>">
                        <input type="submit" value="Excluir">
                    </form>
                </li>
            <?php endforeach; ?>

        </ul>

    </main>
    <?php require_once __DIR__ . "/../layout/footer.php"; ?>
</body>
</html>