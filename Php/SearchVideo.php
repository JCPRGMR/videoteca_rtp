<?php
    include_once '../Models/Videos.php';
    include_once '../Models/Departaments.php';

    $_POST['Departament'] = Departaments::BuscarId($_POST['Departament']);

    $result = match ($_POST['Departament']) {
         1 => Videos::BuscarPrensa((object) $_POST),
         2 => Videos::BuscarProgramacion((object) $_POST),
    };
    // $result = Videos::Buscar((object) $_POST);
    // echo json_encode($_POST['Departament']);
    echo json_encode($result);
