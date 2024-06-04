<?php
    require_once '../Connection/Connection.php';
    Class Videos extends Connection{
        public static function BuscarCodVideo($cod_video){
            $cod_video = "%". $cod_video ."%";
            try {
                $sql = "SELECT COUNT(*) FROM videos WHERE cod_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $cod_video, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return intval($resultado);
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO videos(
                    cod_video,
                    title,
                    details,

                    id_fk_area,
                    id_fk_kind,
                    id_fk_departament,

                    video_create,
                    video_update
                ) VALUES(?,?,?,?, ?,?,?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->cod_video, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->descripcion, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->detalles, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->area, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->tipo, PDO::PARAM_STR);
                $stmt->bindParam(6, $post->departamento, PDO::PARAM_STR);
                $stmt->bindParam(7, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(8, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }