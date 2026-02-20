<?php

    namespace MD;

    use MD\Video;
    use PDO;

    class VideoDAO{

        private PDO $pdo;

        public function __construct(PDO $pdo){
            $this->pdo=$pdo;
        }

        //Retorna todos os vídeos cadastrados no banco de dados como objtos da classe Video
        public function getVideos(): array{

            $sql = "SELECT id, titulo, link FROM phpweb4_tests.videos;";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $videosDados = $statement->fetchAll();

            $videos = [];
            foreach($videosDados as $videoDados){
                $video = new Video(
                    $videoDados['id'],
                    $videoDados['titulo'],
                    $videoDados['link']
                );
                $videos[] = $video;
            }

            return $videos;

        }

        //Método para inserir vídeos na tabela
        public function insertVideo(Video $video) : bool{

            $sql = "INSERT INTO phpweb4_tests.videos (titulo, link) VALUES (:titulo, :link);";
            $statement = $this->pdo->prepare($sql);
            
            return $statement->execute([
                ":titulo" => $video->titulo,
                ":link" => $video->link
            ]);

        }

        //Método para excluir vídeos da tabela
        public function deleteVideo(int $id) : bool{
        
            $sql = "DELETE FROM phpweb4_tests.videos WHERE id = :id;";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([
                ":id" => $id
            ]);

        }

        //Método para atualizar os dados de um vídeo já cadastrado
        public function updateVideo(Video $video) : bool{

            $sql = "UPDATE phpweb4_tests.videos SET titulo = :titulo, link = :link WHERE id = :id;";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([
                ":titulo" => $video->titulo,
                ":link" => $video->link,
                ":id" => $video->id
            ]);

        }

        //Método para buscar um vídeo específico a partir do id
        public function selectVideo(int $id) : ?Video{

            $sql = "SELECT * FROM phpweb4_tests.videos WHERE id = :id;";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                ":id" => $id
            ]);

            $videoDados = $statement->fetch();

            if($videoDados){
                return new Video(
                    $videoDados['id'],
                    $videoDados['titulo'],
                    $videoDados['link']
                );
            }

            return null;

        }

    }