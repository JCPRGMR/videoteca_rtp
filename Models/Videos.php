<?php
    require_once '../Connection/Connection.php';
    Class Videos extends Connection{
        public static function MostrarPrensa(){
            try {
                $sql = "SELECT * FROM view_videos_prensa ORDER BY video_create DESC";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function MostrarProgramacion(){
            try {
                $sql = "SELECT * FROM view_videos_programacion ORDER BY video_create DESC";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function BuscarPrensa($post) {
            $valor = "%" . $post->buscar . "%";
            try {
                $sql = "SELECT * FROM view_videos_prensa WHERE des_area LIKE :area OR des_kind LIKE :kind";
                $post->buscar = explode(" ", $post->buscar);
                $titleConditions = [];
                $detailConditions = [];
                for ($i = 0; $i < count($post->buscar); $i++) {
                    $titleConditions[] = "title LIKE :title_" . $i;
                    $detailConditions[] = "details LIKE :detail_" . $i;
                }
                if (!empty($titleConditions)) {
                    $sql .= " OR (" . implode(" AND ", $titleConditions) . ")";
                }
                if (!empty($detailConditions)) {
                    $sql .= " OR (" . implode(" AND ", $detailConditions) . ")";
                }
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindValue(":area", $valor);
                $stmt->bindValue(":kind", $valor);
                foreach ($post->buscar as $i => $word) {
                    $likeWord = "%" . $word . "%";
                    $title = ":title_" . $i;
                    $detail = ":detail_" . $i;
                    $stmt->bindValue($title, $likeWord);
                    $stmt->bindValue($detail, $likeWord);
                }
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function BuscarProgramacion($post) {
            $valor = "%" . $post->buscar . "%";
            try {
                $sql = "SELECT * FROM view_videos_programacion WHERE des_area LIKE :area OR des_kind LIKE :kind";
                $post->buscar = explode(" ", $post->buscar);
                $titleConditions = [];
                $detailConditions = [];
                for ($i = 0; $i < count($post->buscar); $i++) {
                    $titleConditions[] = "title LIKE :title_" . $i;
                    $detailConditions[] = "details LIKE :detail_" . $i;
                }
                if (!empty($titleConditions)) {
                    $sql .= " OR (" . implode(" AND ", $titleConditions) . ")";
                }
                if (!empty($detailConditions)) {
                    $sql .= " OR (" . implode(" AND ", $detailConditions) . ")";
                }
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindValue(":area", $valor);
                $stmt->bindValue(":kind", $valor);
                foreach ($post->buscar as $i => $word) {
                    $likeWord = "%" . $word . "%";
                    $title = ":title_" . $i;
                    $detail = ":detail_" . $i;
                    $stmt->bindValue($title, $likeWord);
                    $stmt->bindValue($detail, $likeWord);
                }
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        public static function BuscarId($cod_video){
            try {
                $sql = "SELECT id_video FROM videos WHERE cod_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $cod_video, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function InsertarEnlace($post){
            try {
                $sql = "INSERT INTO videos(
                    cod_video,
                    title,
                    details,
                    path_play,
                    name_file,

                    id_fk_area,
                    id_fk_kind,
                    id_fk_departament,

                    date_user,
                    video_create,
                    video_update
                ) VALUES(?,?,?,?, ?,?,?,?,?, ?,?)";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->cod_video, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->descripcion, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->detalles, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->path_file, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->file, PDO::PARAM_STR);
                $stmt->bindParam(6, $post->area, PDO::PARAM_STR);
                $stmt->bindParam(7, $post->tipo, PDO::PARAM_STR);
                $stmt->bindParam(8, $post->departamento, PDO::PARAM_STR);
                $stmt->bindParam(9, $post->fecha, PDO::PARAM_STR);
                $stmt->bindParam(10, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(11, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function VerificarParaEditar($id_video){
            try {
                $sql = "SELECT title as descripcion, details as detalle, des_area as area, des_kind as tipo, date_user as fecha_evento, id_video FROM view_videos WHERE id_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id_video, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Editar($post){
            try {
                $sql = "UPDATE videos SET
                    title = ?,
                    details = ?,
                    id_fk_area = ?,
                    id_fk_kind = ?,
                    date_user = ?,
                    video_update = ?
                WHERE id_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->descripcion, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->detalle, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->area, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->tipo, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->fecha_evento, PDO::PARAM_STR);
                $stmt->bindParam(6, Connection::$date_hour, PDO::PARAM_STR);
                $stmt->bindParam(7, $post->id_video, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function BuscarDeptoPorVideo($id_video){
            try {
                $sql = "SELECT id_fk_departament FROM videos WHERE id_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id_video, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Eliminar($id_video){
            try {
                $sql = "DELETE FROM videos WHERE id_video = ?";
                $stmt = Connection::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id_video, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }