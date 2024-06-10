<?php
    require_once '../Connection/Connection.php';

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
    }