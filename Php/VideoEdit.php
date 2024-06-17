<pre>
<?php
    include_once '../Connection/Connection.php';
    // include_once '../Php/Areas.php';
    // include_once '../Php/Tipos.php';
    include_once '../Models/Videos.php';
    $_POST['id_video'] = (int)$_POST['id_video'];
    var_dump($_POST);
    var_dump(Videos::VerificarParaEditar($_POST['id_video']));

