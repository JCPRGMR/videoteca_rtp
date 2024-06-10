<?php
    class Users_activities extends Connection{
        public static function Insert($post){
            try {
                $sql = "INSERT INTO users_activities(
                    id_fk_user,
                    id_fk_video,
                    id_fk_activity,

                    ip_user,
                    details,
                    user_activity_create,
                    user_activity_update
                ) VALUES(?,?,?, ?,?,?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->id_user, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->id_video, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->id_activity, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->ip, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->details, PDO::PARAM_STR);
                $stmt->bindParam(6, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(7, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }