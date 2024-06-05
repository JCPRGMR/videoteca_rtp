<?php
    Class Departaments_kinds extends Connection{
        public static function Existe($post){
            try {
                $sql = "SELECT COUNT(*) FROM departaments_kinds WHERE id_fk_departament = ? AND id_fk_kind = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->departamento, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->tipo, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return ($resultado > 0);
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO departaments_kinds(
                    id_fk_departament,
                    id_fk_kind,
                    departaments_kinds_create,
                    departaments_kinds_update
                ) VALUES(?,?,?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->departamento, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->tipo, PDO::PARAM_STR);
                $stmt->bindParam(3, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(4, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }