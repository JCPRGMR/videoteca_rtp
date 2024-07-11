<?php require_once '../Templates/Header.php'?>
<?php require_once '../Models/Users.php'?>
<!-- <link rel="stylesheet" href="../Css/videos_list.css"> -->
<?php if(isset($_POST['videos_de_usuario'])):?>
    <div class="w100p h100p color7 overflow-auto">
        <table class="w100p collapse txtwhite">
            <thead class="color1 sticky top0">
                <th class="p10">USUARIO</th>
                <th class="p10">ROL</th>
                <th class="p10">VIDEOS SUBIDO</th>
                <th class="p10">AREA DE COBERTURA</th>
                <th class="p10">TIPO DE CONTENIDO</th>
                <th class="p10">FECHA DE SUBIDA</th>
                <th class="p10">ACCIONES</th>
            </thead>
            <tbody id="tbody">
                <?php foreach(Users::Videos_de_usuario($_POST['videos_de_usuario']) as $item):?>
                    <tr class="odd8" title="video subido desde la IP [<?= $item->ip_user ?>]">
                        <td class="center p10"><?= $item->username ?></td>
                        <td class="center p10"><?= $item->user_permission ?></td>
                        <td class="center p10"><?= $item->path_play ?></td>
                        <td class="center p10"><?= $item->des_area ?></td>
                        <td class="center p10"><?= $item->des_kind ?></td>
                        <td class="center p10"><?= $item->video_create ?></td>
                        <td class="center p10 f-row jc-c">
                            <form action="Player.php" method="post">
                                <button type="submit" name="ver_video" class="color2 negrita mayus" value="<?= $item->id_video ?>">Ver</button>
                            </form>
                            <form action="../Php/VideoDelete.php" method="post" id="deleteForm">
                                <button type="submit" name="video" id="EliminarVideo" class="color4 negrita mayus txtwhite" value="<?= $item->id_video ?>">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
<?php else:?>
<div class="w100p h100p color7 overflow-auto">
    <table class="w100p collapse txtwhite">
        <thead class="color1 sticky top0">
            <th class="p10">NOMBRE DE USUARIO</th>
            <th class="p10">ROL</th>
            <th class="p10">VIDEOS SUBIDOS</th>
        </thead>
        <tbody id="tbody">
            <?php foreach(Users::Historial_de_subida() as $item):?>
                <tr class="odd8">
                    <td class="center p10">
                        <form action="" method="post">
                            <button type="submit" name="videos_de_usuario" value="<?= $item->id_user ?>" class="negrita color3 fz15 pointer w150px" title="Ver videos de <?= $item->username ?>">
                                <?= $item->username ?>
                            </button>
                        </form>
                    </td>
                    <td class="center p10"><?= $item->user_permission ?></td>
                    <td class="center p10 videos_list"><?= $item->videos_subidos ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php endif;?>