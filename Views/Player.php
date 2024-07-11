<?php
require_once '../Templates/Header.php';
require_once '../Models/Videos.php';
include_once '../Models/Activities.php';
include_once '../Models/Users_activities.php';
(isset($_POST['ver_video'])) ? $v = (Videos::BuscarDeptoPorVideo($_POST['ver_video']) == 2)? Videos::VideoDataPro($_POST['ver_video']) : Videos::VideoData($_POST['ver_video'])  : header("Location: Press.php");
// (!$v) && header("Location: Press.php");
(!Activities::Existe("VISUALIZANDO VIDEO")) && Activities::Insertar("VISUALIZANDO VIDEO");

$array = [
    "id_user" => $_SESSION['usuario']['id_user'],
    "id_video" => Videos::BuscarId($v->cod_video),
    "id_activity" => Activities::BuscarId("VISUALIZANDO VIDEO"),
    "ip" => ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") ? "localhost" : $_SERVER['REMOTE_ADDR'],
    "details" => "EL USUARIO VIZUALIZO EL VIDEO " . $v->path_play . " DESDE LA IP " . $_SERVER['REMOTE_ADDR'],
];
Users_activities::Insert((object) $array);
?>
<?php require_once '../Models/Departaments_areas.php' ?>
<?php require_once '../Models/Departaments_kinds.php' ?>
<div class="w100p h100p color7 f-row gap10 wrap" id="mainconteiner">
    <div class="w100p" id="videoContainer">
        <video controls class="w100p h100p" controlsList="nodownload" id="playVideo">
            <source src="/<?= ($v->id_fk_departament == 2) ? "videoteca_rtp_programacion_2" : "videoteca_rtp_prensa_2" ?>/<?= $v->path_play ?>" type="">
        </video>
    </div>
    <div class="w100p h100p">
        <?php if ($v->id_fk_departament == 1) : ?>
            <form action="" method="post" class="p10" id="FormularioEditar">
                <div class="f-col gap10 noselect color7 p10">
                    <div class="f-col gap10">
                        <label for="" class="txtwhite negrita">Descripción del evento</label>
                        <textarea name="descripcion" id="descripcion" placeholder="Descripcion del evento" class="negrita fz15 p10 txtwhite color8" readonly="true"><?= $v->title ?></textarea>
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
                                <?php foreach (Departaments_areas::Mostrar($v->id_fk_departament) as $item) : ?>
                                    <label for="" class="p10 color9 hover7 pointer txtwhite negrita" onclick="LabelToInput('area', this)"><?= $item->des_area ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="f-col">
                        <label for="" class="txtwhite negrita">Tipo de contenido</label>
                        <input type="search" name="tipo" id="tipo" placeholder="Tipo de contenido" class="p10 txtwhite color8" value="<?= $v->des_kind ?>" readonly="true">
                        <div class="relative">
                            <div class="f-col absolute w100p v-hidden" id="g_tipo">
                                <?php foreach (Departaments_kinds::Mostrar($v->id_fk_departament) as $item) : ?>
                                    <label for="" class="p10 color9 hover7 pointer txtwhite negrita" onclick="LabelToInput('tipo', this)"><?= $item->des_kind ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="f-col gap10">
                        <label for="" class="txtwhite negrita">Fecha del evento</label>
                        <input type="date" name="fecha_evento" id="fecha_evento" value="<?= $v->date_user ?>" readonly="true" class="p10 txtwhite color8">
                    </div>
                    <div class="f-row gap10 p10" id="btnGroupFinal">
                        <a href="/<?= ($v->id_fk_departament == 2) ? "videoteca_rtp_programacion_2" : "videoteca_rtp_prensa_2" ?>/<?= $v->path_play ?>" aria-valuetext="<?= $v->id_video ?>" id="d_video" class="p10 color3 negrita mayus center br10" download="">Descargar</a>
                        <?php if ($_SESSION['usuario']["user_permission"] == "Administrador") : ?>
                            <div class="p10 color2 negrita mayus center br10 pointer" id="btnEditar" aria-valuetext="<?= $v->id_video ?>">Editar</div>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        <?php elseif ($v->id_fk_departament == 2) : ?>
            <form action="" method="post" class="" id="FormularioEditar">
                <div class="f-col gap10 noselect color7 p10">
                    <div class="f-row wrap jc-a">
                        <div class="f-col flex-1 p10">
                            <div class="f-col gap10">
                                <label for="" class="txtwhite negrita">Titulo</label>
                                <textarea name="descripcion" id="descripcion" placeholder="Titulo" class="negrita fz15 p10 txtwhite color8" readonly="true"><?= $v->title ?></textarea>
                            </div>
                            <div class="f-col gap10 h100p">
                                <label for="" class="txtwhite negrita">Sinopsis</label>
                                <textarea name="detalle" id="detalle" placeholder="Sinopsis" class="p10 txtwhite color8 h100p" readonly="true"><?= $v->details ?></textarea>
                            </div>
                        </div>
                        <?php if($_SESSION['usuario']["user_permission"] == "Administrador"):?>
                            <div class="relative overflow-hidden">
                                <label for="edit_portrait" class="color2 f-row jc-c a-c absolute br50p p10 pointer opacity08" title="Editar imagen">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z" fill="#0F0F0F"/>
                                    </svg>
                                </label>
                                <input type="file" name="" id="edit_portrait" class="v-hidden absolute">
                                <img src="/videoteca_rtp_programacion_2_img/<?= $v->portrait ?>" alt="Portrait" width="200">
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="f-col">
                        <label for="" class="txtwhite negrita">Categoria</label>
                        <input type="search" name="area" id="area" placeholder="Categoria" class="p10 txtwhite color8" value="<?= $v->des_area ?>" readonly="true">
                        <div class="relative">
                            <div class="f-col absolute w100p v-hidden" id="g_area">
                                <?php foreach (Departaments_areas::Mostrar($v->id_fk_departament) as $item) : ?>
                                    <label for="" class="p10 color9 hover7 pointer txtwhite negrita" onclick="LabelToInput('area', this)"><?= $item->des_area ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="f-col">
                        <label for="" class="txtwhite negrita">Tipo de contenido</label>
                        <input type="search" name="tipo" id="tipo" placeholder="Tipo de contenido" class="p10 txtwhite color8" value="<?= $v->des_kind ?>" readonly="true">
                        <div class="relative">
                            <div class="f-col absolute w100p v-hidden" id="g_tipo">
                                <?php foreach (Departaments_kinds::Mostrar($v->id_fk_departament) as $item) : ?>
                                    <label for="" class="p10 color9 hover7 pointer txtwhite negrita" onclick="LabelToInput('tipo', this)"><?= $item->des_kind ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="color2 mayus negrita p10 br10">Datos del ultimo contrato</div>
                    <div class="f-col">
                        <label for="" class="txtwhite negrita">Nro. Contrato</label>
                        <input type="search" name="nro_contrato" id="nro_contrato" placeholder="Nro. Contrato" class="p10 txtwhite color8" value="<?= $v->nro_agreement ?>" readonly="true">
                    </div>
                    <div class="f-col">
                        <label for="" class="txtwhite negrita">Proveedor/Contrato</label>
                        <input type="search" name="contrato" id="contrato" placeholder="Proveedor/Contrato" class="p10 txtwhite color8" value="<?= $v->agreement ?>" readonly="true">
                    </div>
                    <div class="f-col gap10">
                        <label for="" class="txtwhite negrita">Vencimiento del contrato</label>
                        <input type="date" name="fecha_evento" id="fecha_evento" value="<?= $v->agreement_expiration ?>" readonly="true" class="p10 txtwhite color8">
                    </div>
                    <div class="f-row gap10 p10" id="btnGroupFinal">
                        <a href="/<?= ($v->id_fk_departament == 2) ? "videoteca_rtp_programacion_2" : "videoteca_rtp_prensa_2" ?>/<?= $v->path_play ?>" aria-valuetext="<?= $v->id_video ?>" id="d_video" class="p10 color3 negrita mayus center br10" download="">Descargar</a>
                        <?php if ($_SESSION['usuario']["user_permission"] == "Administrador") : ?>
                            <div class="p10 color2 negrita mayus center br10 pointer" id="btnEditar" aria-valuetext="<?= $v->id_video ?>">Editar</div>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php if($v->id_fk_departament == 1):?>
    <script src="../JavaScripts/ActivarFormulario_press_0.js"></script>
<?php elseif($v->id_fk_departament == 2):?>
    <script src="../JavaScripts/ActivarFormulario1.js"></script>
<?php endif; ?>
<!-- <script src="../JavaScripts/PlayerValidated.js"></script> -->
<script src="../JavaScripts/DownloadH1.js"></script>