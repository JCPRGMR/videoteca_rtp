<?php
    include_once '../Models/Videos.php';

    $searchString = $_POST['StringSearch'];
    $tabla = explode(' ', $searchString);

    $params = new stdClass();
    $params->area = $tabla[0]; // Suponiendo que el primer término es el área
    $params->keywords = implode(' ', array_slice($tabla, 1)); // Los demás términos como palabras clave

    $result = Videos::Buscar($params);

    echo json_encode($result);
