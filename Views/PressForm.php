<?php require_once '../Templates/Header.php'?>
<link rel="stylesheet" href="../Css/Spin_01.css">

<div class="color7_a w100p h100vh f-col a-c jc-c gap20 fixed top0 v-hidden noselect" id="spin_load">
    <div class="negrita txtwhite" id="spin_text">Subiendo video...</div>
    <div class="text6 br50p h100px w100px overflow-hidden color9 f-row jc-c a-c">
        <img src="../Images/rtp_icono.png" alt="" class="loading-animation w100p h100p">
    </div>
</div>

<div class="w100p h100p color7 overflow-auto">
    <div action="" method="post" class="f-col p30 gap20">
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Area de cobertura</label>
                <input type="search" name="area" id="area" placeholder="Area de cobertura" class="p10 br5">
            </div>
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Tipo de contenido</label>
                <input type="search" name="tipo" id="tipo" placeholder="Tipo de contenido" class="p10 br5">
            </div>
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Fecha del evento</label>
                <input type="date" name="fecha" id="fecha" placeholder="Fecha del evento" class="p10 br5" value="<?= date('Y-m-d') ?>">
            </div>
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Descripción del evento</label>
                <input type="search" name="descripcion" id="descripcion" placeholder="Descripción del evento" class="p10 br5">
            </div>
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Detalles de contenido</label>
                <input type="search" name="detalles" id="detalles" placeholder="Detalles de contenido" class="p10 br5">
            </div>
        </div>
        <div class="f-col p5 gap10 flex-1 txtwhite">
            <input type="file" name="" id="VideoContainer">
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <button type="submit" class="p10 negrita color5 mayus pointer space-nw" id="subirVideo">Subir Video</button>
            </div>
            <div class="f-col p5 gap10 flex-1">
                <a href="Press.php" class="p10 negrita color4 txtwhite mayus pointer center space-nw">Volver atras</a>
            </div>
        </div>
    </div>
</div>
<script src="../JavaScripts/SubirVideo7.js"></script>