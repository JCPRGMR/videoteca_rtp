<?php require_once '../Templates/Header.php'?>
<?php require_once '../Models/Videos.php'?>
<div class="w100p h100p color7 overflow-auto">
    <table class="w100p collapse txtwhite">
        <thead class="color1 ">
            <th class="p10">AREA DE COBERTURA</th>
            <th class="p10">TIPO DE CONTENIDO</th>
            <th class="p10">DESCRIPCION DEL EVENTO</th>
            <th class="p10">DETALLE DE CONTENIDO</th>
            <th class="p10">FECHA DE REGISTRO</th>
            <th class="p10">ACCIONES</th>
        </thead>
        <tbody id="tbody">
    <?php for($i=0; $i<50; $i++):?>
            <?php foreach(Videos::MostrarProgramacion() as $item):?>
                <tr class="odd8">
                    <td class="center p10"><?= $item->des_area ?></td>
                    <td class="center p10"><?= $item->des_kind ?></td>
                    <td class="center p10"><?= $item->title ?></td>
                    <td class="center p10"><?= $item->details ?></td>
                    <td class="center p10"><?= date_format(new DateTime($item->video_create), "d/m/Y") ?></td>
                    <td class="center p10 f-row">
                        <?php if($item->path_play != null):?>
                            <form action="Player.php" method="post">
                                <button type="submit" name="ver_video" class="color2 negrita mayus" value="<?= $item->id_video ?>">Ver</button>
                            </form>
                            <?php if($_SESSION['usuario']["user_permission"] == "Administrador"):?>
                                <form action="../Php/VideoDelete.php" method="post" id="deleteForm">
                                    <button type="submit" name="video" id="EliminarVideo" class="color4 negrita mayus txtwhite" value="<?= $item->id_video ?>">Eliminar</button>
                                </form>
                            <?php endif;?>
                        <?php else:?>
                            Irreconocible...
                            <?php if($_SESSION['usuario']["user_permission"] == "Administrador"):?>
                                <form action="../Php/VideoDelete.php" method="post" id="deleteForm">
                                    <button type="submit" name="video" id="EliminarVideo" class="color4 negrita mayus txtwhite" value="<?= $item->id_video ?>">Eliminar</button>
                                </form>
                            <?php endif;?>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
    <?php endfor;?>
        </tbody>
    </table>
</div>
<script src="../JavaScripts/SearchVideo0.js"></script>
<script src="../JavaScripts/VideoDelete1.js"></script>