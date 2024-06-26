<?php 
    require_once '../Templates/Header.php';
    require_once '../Models/Videos.php';
?>
<div class="f-row wrap h100p gap10 overflow-auto">
    <?php foreach(Videos::MostrarProgramacion() as $item):?>
        <div class="relative">
            <img src="/videoteca_rtp_programacion_2_img/<?= $item->portrait?>" alt="miniatura" width="200" height="250">
            <form action="Player.php" method="post">
                <button type="submit" name="ver_video" class="color2 negrita mayus pointer w100p" value="<?= $item->id_video ?>">Ver</button>
            </form>
        </div>
    <?php endforeach;?>
</div>