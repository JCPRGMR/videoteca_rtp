<?php 
    require_once '../Templates/Header.php';
    require_once '../Models/Videos.php';
    include_once '../Models/Activities.php';
    include_once '../Models/Users_activities.php';
    (isset($_POST['ver_video'])) ? $v = Videos::VideoData($_POST['ver_video']) : header("Location: Press.php");
    (!$v) && header("Location: Press.php");
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
<?php require_once '../Models/Departaments_areas.php'?>
<?php require_once '../Models/Departaments_kinds.php'?>
<div class="w100p h100p color7 f-row gap10 wrap" id="mainconteiner">
    <div class="w100p" id="videoContainer">
        <video controls class="w100p h100p" controlsList="nodownload" id="playVideo">
            <source src="/<?= ($v->id_fk_departament == 2) ? "videoteca_rtp_programacion_2" : "videoteca_rtp_prensa_2" ?>/<?= $v->path_play ?>" type="">
        </video>
    </div>
    <div class="w100p h100p">
        <?php if($v->id_fk_departament == 1):?>
            <form action="" method="post" class="p10" id="FormularioEditar">
                <div class="f-col gap10 noselect color7 p10">
                    <div class="f-col gap10">
                        <label for="" class="txtwhite negrita">Descripción del evento</label>
                        <textarea name="descripcion" id="descripcion" placeholder="Descripcion del evento" class="negrita fz15 p10 txtwhite color8" readonly="true"><?= $v->title?></textarea>
                    </div>
                    <div class="f-col gap10">
                        <label for="" class="txtwhite negrita">Detalles de contenido</label>
                        <textarea name="detalle" id="detalle" placeholder="Detalle de contenido" class="p10 txtwhite color8" readonly="true"><?= $v->details ?></textarea>
                    </div>
                    <div class="f-col">
                        <label for="" class="txtwhite negrita">Area de cobertura</label>
                        <input type="search" name="area" id="area" placeholder="Area de cobertura" class="p10 txtwhite color8" value="<?= $v->des_area ?>" readonly="true">
                        <div class="relative">
                            <div class="f-col absolute w100p v-hidden" id="g_area">
                                <?php foreach(Departaments_areas::Mostrar($v->id_fk_departament) as $item):?>
                                    <label for="" class="p10 color9 hover7 pointer txtwhite negrita" onclick="LabelToInput('area', this)"><?= $item->des_area?></label>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="f-col">
                        <label for="" class="txtwhite negrita">Tipo de contenido</label>
                        <input type="search" name="tipo" id="tipo" placeholder="Tipo de contenido" class="p10 txtwhite color8" value="<?= $v->des_kind ?>" readonly="true">
                        <div class="relative">
                            <div class="f-col absolute w100p v-hidden" id="g_tipo">
                                <?php foreach(Departaments_kinds::Mostrar($v->id_fk_departament) as $item):?>
                                    <label for="" class="p10 color9 hover7 pointer txtwhite negrita" onclick="LabelToInput('tipo', this)"><?= $item->des_kind?></label>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="f-col gap10">
                        <label for="" class="txtwhite negrita">Fecha del evento</label>
                        <input type="date" name="fecha_evento" id="fecha_evento" value="<?= $v->date_user ?>" readonly="true" class="p10 txtwhite color8">
                    </div>
                    <div class="f-row gap10 p10" id="btnGroupFinal">
                        <a href="/<?= ($v->id_fk_departament == 2) ? "videoteca_rtp_programacion_2" : "videoteca_rtp_prensa_2" ?>/<?= $v->path_play ?>" aria-valuetext="<?= $v->cod_video ?>" id="d_video" class="p10 color3 negrita mayus center br10" download="">Descargar</a>
                        <?php if($_SESSION['usuario']["user_permission"] == "Administrador"):?>
                            <div class="p10 color2 negrita mayus center br10 pointer" id="btnEditar" aria-valuetext="<?= $v->id_video ?>">Editar</div>
                        <?php endif;?>
                    </div>
                </div>
            </form>
        <?php elseif($v->id_fk_departament == 2):?>
        <?php endif;?>
    </div>
</div>
<!-- <script src="../JavaScripts/PlayerValidated.js"></script> -->
<script src="../JavaScripts/DownloadH.js"></script>
<script src="../JavaScripts/ActivarFormulario.js"></script>