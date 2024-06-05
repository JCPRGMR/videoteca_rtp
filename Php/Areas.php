<?php
    include_once '../Models/Areas.php';
    $_POST['area'] = strtoupper($_POST['area']);
    (!Areas::Existe($_POST['area'])) && Areas::Insertar($_POST['area']);
    $_POST['area'] = Areas::BuscarId($_POST['area']);