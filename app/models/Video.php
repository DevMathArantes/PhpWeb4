<?php

    namespace MD;

    class Video{

        //Nova sintaxe do php V8.0
        public function __construct(
            public readonly ?int $id, 
            public readonly string $titulo, 
            public readonly string $link){
        }

        //Verifica os dados do vídeo, retornando true se forem válidos e false caso contrário
        public function validarVideo(): bool {

            $tituloSanitizado = filter_var($this->titulo, FILTER_SANITIZE_SPECIAL_CHARS);
            
            if (empty(trim($tituloSanitizado)) || $tituloSanitizado !== $this->titulo) {
                return false;
            }

            if (!filter_var($this->link, FILTER_VALIDATE_URL) || !str_starts_with($this->link, "https://www.youtube.com/embed/")) {
                return false;
            }

            return true;
        }

    }