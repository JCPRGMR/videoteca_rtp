<?php 
    require_once '../Templates/Header.php';
    require_once '../Models/Videos.php';
    include_once '../Models/Activities.php';
    include_once '../Models/Users_activities.php';
    (isset($_POST['ver_video'])) ? $v = Videos::VideoData($_POST['ver_video']) : header("Location: Press.php");
    
    
    (!Activities::Existe("VISUALIZANDO VIDEO")) && Activities::Insertar("VISUALIZANDO VIDEO");

    $array = [
        "id_user" => $_SESSION['usuario']['id_user'],
        "id_video" => Videos::BuscarId($v->cod_video),
        "id_activity" => Activities::BuscarId("SUBIENDO VIDEO"),
        "ip" => ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") ? "localhost" : $_SERVER['REMOTE_ADDR'],
        "details" => "EL USUARIO VIZUALIZO EL VIDEO " . $v->path_play . " DESDE LA IP " . $_SERVER['REMOTE_ADDR'],
    ];
    Users_activities::Insert((object) $array);
?>
<div class="w100p h100p color7 f-row gap10 wrap">
    <div class="w100p">
        <video controls class="w100p h100p" controlsList="nodownload">
            <source src="/prensa_videoteca_rtp_2/<?= $v->path_play ?>" type="">
        </video>
    </div>
    <div class="w100p h100p">
        <form action="" method="post" class="p10">
            <div class="f-col gap10">
                <div class="f-col gap10">
                    <label for="" class="txtwhite negrita">Descripción del evento</label>
                <textarea name="" id="" placeholder="Descripcion del evento" class="negrita fz15 p10" readonly><?= $v->title?></textarea>
                </div>
                <div class="f-col gap10">
                    <label for="" class="txtwhite negrita">Detalles de contenido</label>
                <textarea name="" id="" placeholder="Detalle de contenido" class="p10" readonly><?= $v->details ?></textarea>
                </div>
                <div class="f-col gap10">
                    <label for="" class="txtwhite negrita">Area de cobertura</label>
                    <input type="search" name="" id="" placeholder="Area de cobertura" class="p10" value="<?= $v->des_area ?>" readonly>
                </div>
                <div class="f-col gap10">
                    <label for="" class="txtwhite negrita">Tipo de contenido</label>
                    <input type="search" name="" id="" placeholder="Tipo de contenido" class="p10" value="<?= $v->des_kind ?>" readonly>
                </div>
                <div class="f-col gap10">
                    <label for="" class="txtwhite negrita">Fecha del evento</label>
                    <input type="date" name="" id="" value="<?= $v->date_user ?>" readonly class="p10">
                </div>
                <div class="f-col gap10">
                    <label for="" class="txtwhite negrita">Fecha del Subida</label>
                    <input type="datetime" name="" id="" value="<?= $v->video_create ?>" readonly class="p10">
                </div>
                <button type="submit"></button>
                <a href="/prensa/<?= $v->path_play ?>" aria-valuetext="<?= $v->cod_video ?>" id="d_video" class="p10 color3 negrita mayus" download="">Descargar</a>
            </div>
        </form>
    </div>
</div>
<script src="../JavaScripts/DownloadH.js"></script>