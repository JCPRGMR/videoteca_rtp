<?php
$headers = getallheaders();

$archivo = (!isset($headers["archivo"]) ? null : $headers["archivo"]);
$contador = (!isset($headers["contador"]) ? "" : $headers["contador"]);

if ($archivo && $contador !== "") {
    $rutaArchivo = 'D:/videoteca_rtp/prensa/' . $archivo;

    if (file_exists($rutaArchivo) && $contador === "0") {
        unlink($rutaArchivo);
    }

    $stream = fopen("php://input", 'r');
    $rpta = "";
    if (file_put_contents($rutaArchivo, $stream, FILE_APPEND)) {
        $rpta = "OK";
    }

    echo $rpta;
}