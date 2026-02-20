
<!DOCTYPE html>
<html lang="pt-br>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AluraTube</title>
        <link rel="stylesheet" href="/styles.css">
    </head>
    <body>
        
        <header>
            <nav class="centraliza">
            <img src="/assets/icons/logo.png" alt="icone logo" class="logo">
            <h1>AluraTube</h1>
            <ul class="centraliza">
                <a href="https://github.com/DevMathArantes/PhpWeb4">Git-Hub</a>
                <a href="https://cursos.alura.com.br/dashboard">Alura</a>
                <a href="<?= $pagina === "home" ? "/formulario" : "/" ?>" class="linkPrincipal centraliza">
                    <span><?= $pagina === "home" ? "Novo Video" : "Cancelar" ?></span>
                    <img src="<?= $pagina === "home" ? "../assets/icons/novoVideo.png" : "/assets/icons/cancelar.png" ?>" alt="icone cancelar">
                </a>
            </ul>
            </nav>
            <div class="rolarTxt">
                <p>
                    Este é o projeto prático da formação de php para a web da ALURA (curso 4/6) com foco em padrão MVC.
                </p>
            </div>
            <img class="imgPrincipal" src="/assets/images/alura.jpg" alt="imagem da alura">
        </header>
        