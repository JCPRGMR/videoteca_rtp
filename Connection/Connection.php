<?php
    date_default_timezone_set('America/Caracas');
    $_POST = array_map(function($value) {
        return strtoupper(trim($value));
    }, $_POST);
    class Connection{
        private static string $host = "localhost";
        private static string $database = "videoteca_rtp";
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