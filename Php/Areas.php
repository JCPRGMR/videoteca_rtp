<?php
    include_once '../Models/Areas.php';
    (!Areas::Existe($_POST['area'])) && Areas::Insertar($_POST['area']);
    $_POST['area'] = Areas::BuscarId($_POST['area']);