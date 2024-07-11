<?php
    date_default_timezone_set('America/Caracas');
    $_POST = array_map(function($value) {
        return trim($value);
    }, $_POST);
    class Connection{
        private static string $database = "videoteca_rtp";
        #   BASE DE DATOS PARA EL SERVIDOR
        // private static string $host = "192.168.0.88";
        // private static string $user = "master";
        // private static string $password = "master";

        # BASE DE DATOS PARA LOCAL
        private static string $host = "localhost";
        private static string $user = "root";
        private static string $password = "";
        public static string $date_hour;
        public static function Conectar(){
            try {
                self::$date_hour = date('Y-m-d H:i:s');
                $con = "mysql:host=" . self::$host . ";dbname=" . self::$database;
                $stmt = new PDO($con, self::$user, self::$password);
                $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $stmt;
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }
    }