<!--Verificando mensagens de sucesso e erro-->
<?php if ($statusCadastro === 'sucesso'): ?>
    <p class='mensagem sucesso sumir-suave'>Vídeo cadastrado com sucesso!</p>
<?php elseif ($statusCadastro === 'erro'): ?>
    <p class='mensagem erro sumir-suave'>Erro ao cadastrar vídeo. Tente novamente.</p>
<?php endif; ?>

<?php if ($statusExclusao === 'sucesso'): ?>
    <p class='mensagem sucesso sumir-suave'>Vídeo excluído com sucesso!</p>
<?php elseif ($statusExclusao === 'erro'): ?>
    <p class='mensagem erro sumir-suave'>Erro ao excluir vídeo. Tente novamente.</p>
<?php endif; ?>

<?php if ($statusAtualizacao === 'sucesso'): ?>
    <p class='mensagem sucesso sumir-suave'>Vídeo atualizado com sucesso!</p>
<?php elseif ($statusAtualizacao === 'erro'): ?>
    <p class='mensagem erro sumir-suave'>Erro ao atualizar vídeo. Tente novamente.</p>
<?php endif; ?>

<?php require_once __DIR__ . "/header.php"; ?>
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
                <form class="opcVideo editar" action="/formulario" method="GET">
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
<?php require_once __DIR__ . "/footer.php"; ?>