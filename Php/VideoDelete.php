<?php
    include_once '../Models/Videos.php';
    
    echo $departamento = Videos::BuscarDeptoPorVideo($_POST['video']);

    Videos::Eliminar($_POST['video']);

    switch ($departamento) {
        case 1:
            header("Location: ../Views/Press.php");
            break;
        case 2:
            header("Location: ../Views/Programming.php");
        default:
            header("Location: ../Views/Programming.php");
            break;
    }