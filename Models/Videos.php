<?php
    require_once '../Connection/Connection.php';
    Class Videos extends Connection{
        public static function Mostrar($departament){
            try {
                $sql = "SELECT * FROM view_videos WHERE id_fk_departament = ? ORDER BY video_create DESC";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $departament, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function BuscarCodVideo($cod_video){
            $cod_video = "%". $cod_video ."%";
            try {
                $sql = "SELECT COUNT(*) FROM videos WHERE cod_video LIKE ?";
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

                    date_user,
                    video_create,
                    video_update
                ) VALUES(?,?,?,?, ?,?,?,?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->cod_video, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->descripcion, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->detalles, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->area, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->tipo, PDO::PARAM_STR);
                $stmt->bindParam(6, $post->departamento, PDO::PARAM_STR);
                $stmt->bindParam(7, $post->fecha, PDO::PARAM_STR);
                $stmt->bindParam(8, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(9, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function UpdatePath($post){
            try {
                $sql = "UPDATE videos SET 
                path_play = ?,
                name_file = ?,
                video_update = ? WHERE cod_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->path, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->name, PDO::PARAM_STR);
                $stmt->bindParam(3, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->cod_video, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function VideoData($id_video){
            try {
                $sql = "SELECT * FROM view_videos WHERE id_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id_video, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Buscar($list_param) {
            try {
                // Iniciar la consulta SQL
                $sql = "SELECT * FROM view_videos WHERE id_fk_departament = ?";
                $params = [];
                $params[] = $list_param->area;
        
                // Agregar búsqueda en múltiples columnas
                if (!empty($list_param->keywords)) {
                    $keywords = explode(' ', $list_param->keywords);
                    $sql .= " AND (";
                    foreach ($keywords as $index => $keyword) {
                        if ($index > 0) {
                            $sql .= " AND ";
                        }
                        $sql .= "(title LIKE ? OR details LIKE ? OR des_area LIKE ? OR des_king LIKE ? OR video_create LIKE ? OR date_user LIKE ?)";
                        $likeKeyword = '%' . $keyword . '%';
                        $params[] = $likeKeyword; // title
                        $params[] = $likeKeyword; // details
                        $params[] = $likeKeyword; // des_area
                        $params[] = $likeKeyword; // des_king
                        $params[] = $likeKeyword; // video_create
                        $params[] = $likeKeyword; // date_user
                    }
                    $sql .= ")";
                }
        
                // Conectar y preparar la consulta
                $stmt = Connection::Conectar()->prepare($sql);
                foreach ($params as $index => $param) {
                    $stmt->bindValue($index + 1, $param, PDO::PARAM_STR);
                }
        
                // Ejecutar la consulta
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }   
    }