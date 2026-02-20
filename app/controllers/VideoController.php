<?php

    namespace Controller;

    use MD\{
        Video, 
        VideoDAO, 
        BancoPrincipal
    };
    use PDO;

    class VideoController {
        
        public function __construct(private VideoDAO $videoDAO){
        }

        //Controller para inserir um novo vídeo
        public function insertVideo(): void {
            $novoVideo = new Video(
                null,
                $_POST['titulo'] ?? '',
                $_POST['link'] ?? ''
            );

            if (!$novoVideo->validarVideo() || !$this->videoDAO->insertVideo($novoVideo)) {
                header("Location: /?cadastro=erro");
                exit;
            }

            header("Location: /?cadastro=sucesso");
            exit;
        }
        
        //Controller para editar um vídeo já cadastrado
        public function updateVideo(): void {

            $videoEditado = new Video(
                $_POST['id'] ?? null,
                $_POST['titulo'] ?? '',
                $_POST['link'] ?? ''
            );
            
            if(!$videoEditado->validarVideo() || $videoEditado->id === null || !$this->videoDAO->updateVideo($videoEditado)){
                header("Location: /?atualizar=erro");
                exit;
            };

            header("Location: /?atualizar=sucesso");
            exit;
        }

        //Controller para excluir um vídeo já cadastrado
        public function deleteVideo(): void {

            if($this->videoDAO->deleteVideo($_POST['id'])){
                header("Location: /?exclusao=sucesso");
                exit;
            } else {
                header("Location: /?exclusao=erro");
                exit;
            }

        }

    }