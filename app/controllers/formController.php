<?php

    namespace Controller;

    use MD\VideoDAO;

    class FormController{

        public function __construct(private VideoDAO $videoDAO){
        }

        public function processaRequisicao(): void{

            $video = null;

            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if ($id !== false && $id !== null){
                $video = $this->videoDAO->selectVideo($id);
            }

            $pagina = "formulario";
            require_once __DIR__ . '/../views/formulario.php';

        }
    }