<?php
    include_once '../Models/Activities.php';
    include_once '../Models/Users_activities.php';
    session_start();

    
    (!Activities::Existe("CERRAR SESION")) && Activities::Insertar("CERRAR SESION");

    $array = [
        "id_user" => $_SESSION['usuario']['id_user'],
        "id_video" => null,
        "id_activity" => Activities::BuscarId("CERRAR SESION"),
        "ip" => ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") ? "localhost" : $_SERVER['REMOTE_ADDR'],
        "details" => "SE CERRO SESION DESDE LA IP: " . $_SERVER['REMOTE_ADDR'] ,
    ];
    var_dump($_SERVER);
    Users_activities::Insert((object) $array);

    header("Location: ../");
    session_destroy();