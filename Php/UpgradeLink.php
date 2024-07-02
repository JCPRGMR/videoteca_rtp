<?php
    include_once '../Models/Videos.php';
    include_once '../Models/Activities.php';
    include_once '../Models/Users_activities.php';
    include_once '../Models/Agreements.php';
    session_start();

    $valor = strtoupper(substr($_POST['area'], 0, 3));
    $fecha = new DateTime();
    $fecha_formateada = $fecha->format("Ymd");
    $codigo = $fecha_formateada . $valor;
    $num_cod = Videos::BuscarCodVideo($codigo) + 1;
    $codigo .= sprintf("%03d", $num_cod);

    include_once '../Php/Areas.php';
    include_once '../Php/Tipos.php';
    include_once '../Php/Departamentos.php';
    $_POST['cod_video'] = $codigo;
    $_POST['file'] = pathinfo($_POST['file'], PATHINFO_FILENAME);
    $_POST['path_file'] = pathinfo($_POST['path_file'], PATHINFO_FILENAME) . "." . pathinfo($_POST['path_file'], PATHINFO_EXTENSION);

    # SI SE MANDO UN ARCHIVO MOVERLO
    if(isset($_FILES['img_update']) && strlen($_FILES['img_update']['name']) > 0) {
        $rutaArchivo = "E:/videoteca_rtp/programacion/portraits/" . $codigo . "." . pathinfo($_FILES['img_update']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['img_update']['tmp_name'], $rutaArchivo);
        $_POST['portrait'] = $codigo . "." . pathinfo($_FILES['img_update']['name'], PATHINFO_EXTENSION);
    }

    Videos::InsertarEnlace((object) $_POST);

    # INSERTAR PARA CONTRATO
    if (isset($_POST['nro_agreement'])) {
        $_POST['id_fk_video'] = Videos::BuscarId($codigo);
        Agreements::Insertar((object) $_POST);
    }

    # INSERTAR PARA ACTIVIDADES
    if (!Activities::Existe("ENLAZAR VIDEO")) {
        Activities::Insertar("ENLAZAR VIDEO");
    }

    $array = [
        "id_user" => $_SESSION['usuario']['id_user'],
        "id_video" => Videos::BuscarId($codigo),
        "id_activity" => Activities::BuscarId("ENLAZAR VIDEO"),
        "ip" => ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") ? "localhost" : $_SERVER['REMOTE_ADDR'],
        "details" => "EL USUARIO ENLAZO UN VIDEO DESDE LA IP " . $_SERVER['REMOTE_ADDR'],
    ];
    Users_activities::Insert((object) $array);

    echo json_encode(["img_update" => $_FILES['img_update']['name'] ?? '']);