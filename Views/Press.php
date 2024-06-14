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
            <?php foreach(Videos::Mostrar(1) as $item):?>
                <tr class="odd8">
                    <td class="center p10"><?= $item->des_area ?></td>
                    <td class="center p10"><?= $item->des_kind ?></td>
                    <td class="center p10"><?= $item->title ?></td>
                    <td class="center p10"><?= $item->details ?></td>
                    <td class="center p10"><?= date_format(new DateTime($item->video_create), "Y-m-d") ?></td>
                    <td class="center p10">
                        <?php if($item->path_play != null):?>
                            <form action="Player.php" method="post">
                                <button type="submit" name="ver_video" class="color2 negrita mayus" value="<?= $item->id_video ?>">Ver</button>
                            </form>
                        <?php else:?>
                            <form action="Player.php" method="post" class="relative overflow-hidden">
                                <label for="link_video" class="pointer p10 color2 black negrita mayus" aria-valuetext="<?= $item->id_video?>">enlazar</label>
                                <input type="file" name="" id="link_video" class="absolute v-hidden">
                            </form>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="../JavaScripts/SearchVideoPress3.js"></script>