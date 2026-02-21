<?php

    namespace Controller;

    use MD\VideoDAO;

    class Error404Controller{

        public function __construct(private VideoDAO $videoDAO){
        }

        public function processaRequisicao(): void{

            require_once __DIR__ . '/../views/erro404.php';

        }
    }