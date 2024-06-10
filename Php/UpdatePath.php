<?php
    include_once '../Models/Videos.php';
    include_once '../Models/Activities.php';
    include_once '../Models/Users_activities.php';
    session_start();
    (!Activities::Existe("VIDEO SUBIDO CORRECTAMENTE")) && Activities::Insertar("VIDEO SUBIDO CORRECTAMENTE");

    $array = [
        "id_user" => $_SESSION['usuario']['id_user'],
        "id_video" => Videos::BuscarId($_POST['cod_video']),
        "id_activity" => Activities::BuscarId("VIDEO SUBIDO CORRECTAMENTE"),
        "ip" => ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") ? "localhost" : $_SERVER['REMOTE_ADDR'],
        "details" => "EL VIDEO DE LA IP " . $_SERVER['REMOTE_ADDR'] . ' SE CARGO CORRECTAMENTE',
    ];
    Users_activities::Insert((object) $array);
    Videos::UpdatePath((object) $_POST);