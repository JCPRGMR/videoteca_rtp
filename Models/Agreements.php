<?php
    include_once '../Connection/Connection.php';
    class Agreements extends Connection
    {
        public static function Insertar($post)
        {
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
        public static function BuscarParaEditar($post)
        {
            try {
                $sql = "SELECT * FROM agreement WHERE id_agreement = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Editar($post){
            try {
                $sql = "UPDATE agreement SET 
                    nro_agreement = ?,
                    agreement = ?,
                    agreement_expiration = ?,
                    agreement_update = ?
                    WHERE id_agreement = ?";
                    $stmt = Connection::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $post->nro_contrato, PDO::PARAM_STR);
                    $stmt->bindParam(2, $post->contrato, PDO::PARAM_STR);
                    $stmt->bindParam(3, $post->contrato_expiracion, PDO::PARAM_STR);
                    $stmt->bindParam(4, Connection::$date_hour, PDO::PARAM_STR);
                    $stmt->bindParam(5, $post->id_agrement, PDO::PARAM_STR);
                    $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }
