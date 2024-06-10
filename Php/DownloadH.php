<?php
    include_once '../Models/Videos.php';
    include_once '../Models/Activities.php';
    include_once '../Models/Users_activities.php';

    session_start();

    $v = Videos::VideoData($_POST['cod_video']);
    
    (!Activities::Existe("DESCARGANDO VIDEO")) && Activities::Insertar("DESCARGANDO VIDEO");

    $array = [
        "id_user" => $_SESSION['usuario']['id_user'],
        "id_video" => Videos::BuscarId($_POST['cod_video']),
        "id_activity" => Activities::BuscarId("SUBIENDO VIDEO"),
        "ip" => ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") ? "localhost" : $_SERVER['REMOTE_ADDR'],
        "details" => "EL USUARIO " . $_SERVER['REMOTE_ADDR'] . " DESCARGO EL VIDEO " . $v->path_play,
    ];
    Users_activities::Insert((object) $array);