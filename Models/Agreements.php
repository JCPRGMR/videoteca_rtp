<?php
    include_once '../Connection/Connection.php';
    Class Agreements extends Connection{
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO agreement(
                    nro_agreement,
                    agreement,
                    agreement_expiration,

                    id_fk_video,
                    agreement_create,
                    agreement_update
                ) VALUES(?,?,?, ?,?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->nro_agreement, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->agreement, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->agreement_expiration, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->id_fk_video, PDO::PARAM_STR);
                $stmt->bindParam(5, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(6, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }