<?php
    $file_exists = file_exists('../Connection/Connection.php');
    require_once $file_exists ? '../Connection/Connection.php' : 'Connection/Connection.php';

    class Users extends Connection{
        public static function Validated_login(object $post){
            try {
                $sql = "SELECT * FROM users WHERE username = ? AND passkey = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->username, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->passkey, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch(PDO::FETCH_ASSOC);
                return $response;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Historial_de_subida(){
            try {
                $sql = "SELECT * FROM view_history_videos_upgrade";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->execute();
                $response = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $response;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
            
        }
        public static function Videos_de_usuario($id_usuario){
            try {
                $sql = "SELECT * FROM view_user_videos WHERE id_user = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id_usuario, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $response;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }