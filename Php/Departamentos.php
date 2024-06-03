<?php
    include_once '../Models/Departaments.php';
    (!Departaments::Existe($_POST['departamento'])) && Departaments::Insertar($_POST['departamento']);
    $_POST['departamento'] = Departaments::BuscarId($_POST['departamento']);