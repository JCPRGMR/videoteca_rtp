<?php 
    require_once '../Templates/Header.php';
    require_once '../Models/Videos.php';
?>
<style>
    .relative {
    position: relative;
    }

    .relative .capa {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 0; /* Altura inicial para la animación */
        background: linear-gradient(0deg, rgba(34,193,195,0) 0%, rgba(0,0,0,1) 92%);
        visibility: hidden; /* Oculto inicialmente */
        transition: height 0.3s, visibility 0.3s; /* Transiciones para la altura y visibilidad */
        overflow: hidden;
    }

    .relative:hover .capa {
        height: 250px; /* Altura final para la animación */
        visibility: visible;
    }
</style>
<div class="f-row wrap h100p gap10 overflow-auto" id="box_imgs">
    <?php foreach(Videos::MostrarProgramacion() as $item):?>
        <div class="relative h250px">
            <div class="capa txtwhite negrita center p10 border-box">
                <?= $item->title ?>
            </div>
            <img src="/videoteca_rtp_programacion_2_img/<?= $item->portrait?>" alt="miniatura" width="200" height="250">
            <form action="Player.php" method="post">
                <button type="submit" name="ver_video" class="color2 negrita mayus pointer w100p" value="<?= $item->id_video ?>">Ver</button>
            </form>
        </div>
    <?php endforeach;?>
</div>

<script src="../JavaScripts/GallerySearch.js"></script>