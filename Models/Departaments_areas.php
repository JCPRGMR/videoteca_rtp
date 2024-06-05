<?php
    Class Departaments_areas extends Connection{
        public static function Existe($post){
            try {
                $sql = "SELECT COUNT(*) FROM departaments_areas WHERE id_fk_departament = ? AND id_fk_area = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->departamento, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->area, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return ($resultado > 0);
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO departaments_areas(
                    id_fk_departament,
                    id_fk_area,
                    departaments_areas_create,
                    departaments_areas_update
                ) VALUES(?,?,?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->departamento, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->area, PDO::PARAM_STR);
                $stmt->bindParam(3, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(4, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }