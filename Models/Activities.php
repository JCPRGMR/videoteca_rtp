<?php
    require_once '../Connection/Connection.php';
    class Activities extends Connection{
        public static function BuscarId($valor){
            try {
                $sql = "SELECT id_activity FROM activities WHERE des_activity = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $valor, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return $resultado;
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }
        public static function Insertar($valor){
            try {
                $sql = "INSERT INTO activities(
                    des_activity,
                    activity_create,
                    activity_update
                ) VALUES(?,?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $valor, PDO::PARAM_STR);
                $stmt->bindParam(2, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(3, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }
        public static function Existe($valor){
            try {
                $sql = "SELECT * FROM activities WHERE des_activity = ? LIMIT 1";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $valor, PDO::PARAM_STR);
                $stmt->execute();
                $resutlado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resutlado;
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }
    }