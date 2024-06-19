<pre>
<?php
    include_once '../Connection/Connection.php';
    include_once '../Models/Videos.php';
    $_POST['id_video'] = (int)$_POST['id_video'];
    var_dump($_POST);
    var_dump(Videos::VerificarParaEditar($_POST['id_video']));
    
    if($_POST != Videos::VerificarParaEditar($_POST['id_video'])){
        include_once '../Php/Areas.php';
        include_once '../Php/Tipos.php';
        
        Videos::Editar((object) $_POST);

        if(isset($_POST['nro_contrato']) && strlen($_POST['nro_contrato']) > 0){
            # PROCEDIMIENTO PARA MODIFICAR EL CONTRATO
        }
    }
    switch (Videos::BuscarDeptoPorVideo($_POST['id_video'])) {
        case 1:
            header("Location: ../Views/Press.php");
            break;
        case 2:
            header("Location: ../Views/Programming.php");
        default:
            header("Location: ../Templates/header.php");
            break;
    }