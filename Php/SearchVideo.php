<?php
    include_once '../Models/Videos.php';
    include_once '../Models/Departaments.php';

    $_POST['Departament'] = Departaments::BuscarId($_POST['Departament']);


    $result = Videos::Buscar((object) $_POST);
    echo json_encode($result);
