<?php

    namespace Controller;

    use MD\VideoDAO;

    class HomeController{

        public function __construct(private VideoDAO $videoDAO){
        }

        public function processaRequisicao(): void{

            $statusCadastro = filter_input(INPUT_GET, 'cadastro', FILTER_SANITIZE_SPECIAL_CHARS);
            $statusExclusao = filter_input(INPUT_GET, 'exclusao', FILTER_SANITIZE_SPECIAL_CHARS);
            $statusAtualizacao = filter_input(INPUT_GET, 'atualizar', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $videos = $this->videoDAO->getVideos();
            $pagina = "home";
            
            require_once __DIR__ . '/../views/home.php';

        }
    }