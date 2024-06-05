<?php require_once '../Templates/Header.php'?>
<?php require_once '../Models/Videos.php'?>
<?php (isset($_POST['ver_video'])) ? $v = Videos::VideoData($_POST['ver_video']) : header("Location: Press.php");?>
<div class="w100p h100p color7 f-row gap10 wrap">
    <div class="w100p h100p flex-1">
        <video controls class="w100p h100p" controlsList="nodownload">
            <source src="/prensa/<?= $v->path_play ?>" type="">
        </video>
    </div>
    <div class="w20p h100p">
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
                <a href="/prensa/<?= $v->path_play ?>" class="p10 color3 negrita mayus" download="">Descargar</a>
            </div>
        </form>
    </div>
</div>