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
                    <td class="center"><?= $item->des_area ?></td>
                    <td class="center"><?= $item->des_kind ?></td>
                    <td class="center"><?= $item->title ?></td>
                    <td class="center"><?= $item->details ?></td>
                    <td class="center"><?= date_format(new DateTime($item->video_create), "d/m/Y") ?></td>
                    <td class="center">
                        <form action="Player.php" method="post">
                            <button type="submit" name="" value="<?= $item->id_video ?>">Ver video</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="../JavaScripts/SearchVideoPress.js"></script>