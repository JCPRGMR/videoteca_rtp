<pre>
<?php
    include_once '../Connection/Connection.php';
    include_once '../Models/Videos.php';
    $_POST['id_video'] = (int)$_POST['id_video'];
    // print_r($_POST);
    // print_r(Videos::VerificarParaEditar($_POST['id_video']));
    
    if(count(Videos::VerificarParaEditar($_POST['id_video'])) != count($_POST)){
        include_once '../Models/Agreements.php';
        // EDITAR VIDEO
        $data = [
            "descripcion" => Videos::VideoDataPro($_POST['id_video'])->title,
            "detalle" => Videos::VideoDataPro($_POST['id_video'])->details,
            "area" => Videos::VideoDataPro($_POST['id_video'])->des_area,
            "tipo" => Videos::VideoDataPro($_POST['id_video'])->des_kind,
            "id_video" => Videos::VideoDataPro($_POST['id_video'])->id_video,
        ];
        $array = [
            "descripcion" => $_POST['descripcion'],
            "detalle" => $_POST['detalle'],
            "area" => $_POST['area'],
            "tipo" => $_POST['tipo'],
            "id_video" => $_POST['id_video'],
        ];
        if($array != $data){
            include_once '../Php/Areas.php';
            include_once '../Php/Tipos.php';
            // Videos::Editar((object) $_POST);
            echo 'Editar video de programacion';
        }
        // EDITAR CONTRATO
        $data = [
            "nro_contrato" => Videos::VideoDataPro($_POST['id_video'])->nro_agreement,
            "contrato" => Videos::VideoDataPro($_POST['id_video'])->agreement,
            "contrato_expiracion" => Videos::VideoDataPro($_POST['id_video'])->agreement_expiration,
            "id_video" => Videos::VideoDataPro($_POST['id_video'])->id_fk_video,
        ];
        $array = [
            "nro_contrato" => $_POST['nro_contrato'],
            "contrato" => $_POST['contrato'],
            "contrato_expiracion" => $_POST['fecha_evento'],
            "id_video" => $_POST['id_video'],
        ];
        if($array != $data){
            Agreements::Editar((object) ($array + ["id_agrement" => Videos::VideoDataPro($_POST['id_video'])->id_agreement]));
        }
    }elseif(count(Videos::VerificarParaEditar($_POST['id_video'])) == count($_POST)){
        if($_POST != Videos::VerificarParaEditar($_POST['id_video'])){
            include_once '../Php/Areas.php';
            include_once '../Php/Tipos.php';
            Videos::Editar((object) $_POST);
        }
    }
    if(isset($_POST['nro_contrato']) && strlen($_POST['nro_contrato']) > 0){
        # PROCEDIMIENTO PARA MODIFICAR EL CONTRATO
    }
    switch (Videos::BuscarDeptoPorVideo($_POST['id_video'])) {
        case 1:
            header("Location: ../Views/Press.php");
            break;
        case 2:
            header("Location: ../Views/Programming.php");
            break;
        default:
            header("Location: ../Templates/header.php");
            break;
    }