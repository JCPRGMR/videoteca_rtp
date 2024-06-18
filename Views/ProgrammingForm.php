<?php require_once '../Templates/Header.php'?>
<?php require_once '../Models/Departaments_areas.php'?>
<?php require_once '../Models/Departaments_kinds.php'?>
<?php require_once '../Models/Departaments.php'?>
<link rel="stylesheet" href="../Css/Spin_01.css">

<div class="color7_a w100p h100vh f-col a-c jc-c gap20 fixed top0 v-hidden noselect" id="spin_load">
    <div class="negrita txtwhite" id="spin_text">Subiendo video...</div>
    <div class="text6 br50p h100px w100px overflow-hidden color9 f-row jc-c a-c">
        <img src="../Images/rtp_icono.png" alt="" class="loading-animation w100p h100p">
    </div>
</div>

<div class="w100p h100p color7 overflow-auto">
    <div class="f-col p30 gap20">
        <div class="f-col gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">TITULO</label>
                <input type="search" name="titulo" id="titulo" placeholder="Descripción del evento" class="p10 br5">
            </div>
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Categoria</label>
                <input type="search" name="area" id="area" placeholder="Categoria" class="p10 br5">
                <div class="relative">
                    <div class="f-col absolute w100p v-hidden" id="g_area">
                        <?php foreach(Departaments_areas::Mostrar(Departaments::BuscarId("PROGRAMACION")) as $item):?>
                            <label for="" class="p20 color8 hover7 pointer txtwhite negrita" onclick="LabelToInput('area', this)"><?= $item->des_area?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Tipo de contenido</label>
                <input type="search" name="tipo" id="tipo" placeholder="Tipo de contenido" class="p10 br5">
                <div class="relative">
                    <div class="f-col absolute w100p v-hidden" id="g_tipo">
                        <?php foreach(Departaments_kinds::Mostrar(Departaments::BuscarId("PROGRAMACION")) as $item):?>
                            <label for="" class="p20 color8 hover7 pointer txtwhite negrita" onclick="LabelToInput('tipo', this)"><?= $item->des_kind?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Duracion</label>
                <input type="search" name="duracion" id="duracion" placeholder="00:00:00" class="p10 br5">
            </div>
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Sinopsis</label>
                <textarea type="search" name="detalles" id="detalles" placeholder="Sinopsis" class="p10 br5"></textarea>
            </div>
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Nro de contrato</label>
                <input type="search" name="nro_contrato" id="nro_contrato" placeholder="Nro de contrato" class="p10 br5">
            </div>
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Proveedor</label>
                <input type="search" name="proveedor" id="proveedor" placeholder="Proveedor" class="p10 br5">
            </div>
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">fecha de vencimiento</label>
                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" placeholder="Fecha del evento" class="p10 br5" value="<?= date('Y-m-d') ?>">
            </div>
        </div>
        <div class="f-col p5 gap10 flex-1 txtwhite" id="filecontainer">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Seleccionar miniatura</label>
                <input type="file" name="" id="PhotoContainer">
            </div>
        </div>
        <div class="f-col p5 gap10 flex-1 txtwhite a-c" id="filecontainer">
            <img src="" alt="MINIATURA" width="200" height="250" class="color8" id="ImgPortrait">
        </div>
        <div class="f-col p5 gap10 flex-1 txtwhite" id="filecontainer">
            <div class="f-col p5 gap10 flex-1">
                <label for="" class="mayus txtwhite space-nw negrita">Seleccionar video</label>
                <input type="file" name="" id="VideoContainer">
            </div>
        </div>
        <div class="f-row gap20 wrap">
            <div class="f-col p5 gap10 flex-1">
                <button type="submit" class="p10 negrita color5 mayus pointer space-nw" id="subirVideo" title="SI EL VIDEO SE SUBIRA AL SERVIDOR">Subir Video</button>
            </div>
            <div class="f-col p5 gap10 flex-1">
                <button type="submit" class="p10 negrita color2 mayus space-nw" id="subirenlace" title="SI EL VIDEO YA SE ENCUENTRA EN EL SERVIDOR">Enlazar</button>
            </div>
            <div class="f-col p5 gap10 flex-1">
                <a href="Press.php" class="p10 negrita color4 txtwhite mayus pointer center space-nw">Volver atras</a>
            </div>
        </div>
    </div>
</div>
<script src="../JavaScripts/ProgrammingLink2.js"></script>
<script src="../JavaScripts/Portrait.js"></script>
<script src="../JavaScripts/Select.js"></script>