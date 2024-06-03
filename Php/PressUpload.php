<?php
    include_once '../Models/Videos.php';
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

    echo json_encode($_POST);