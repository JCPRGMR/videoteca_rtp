<pre>
<?php
    include_once '../Models/Users.php';
    include_once '../Models/Activities.php';
    include_once '../Models/Users_activities.php';

    
    session_start();
    $location = "";
    if(Users::Validated_login((object) $_POST) > 0){
        $_SESSION['usuario'] = Users::Validated_login((object) $_POST);
        $location = "Views/Press.php";

        (!Activities::Existe("INICIAR SESION")) && Activities::Insertar("INICIAR SESION");

        $array = [
            "id_user" => $_SESSION['usuario']['id_user'],
            "id_video" => null,
            "id_activity" => Activities::BuscarId("INICIAR SESION"),
            "ip" => ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") ? "localhost" : $_SERVER['REMOTE_ADDR'],
            "details" => "EL USUARIO INICIO SESION DESDE LA IP: " . $_SERVER['REMOTE_ADDR'] ,
        ];
        var_dump($_SERVER);
        Users_activities::Insert((object) $array);
    }
    header("Location: ../" . $location);