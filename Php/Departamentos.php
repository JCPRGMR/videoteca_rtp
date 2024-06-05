<?php
    include_once '../Models/Departaments.php';
    include_once '../Models/Departaments_areas.php';
    include_once '../Models/Departaments_kinds.php';
    (!Departaments::Existe($_POST['departamento'])) && Departaments::Insertar($_POST['departamento']);
    $_POST['departamento'] = Departaments::BuscarId($_POST['departamento']);

    (!Departaments_areas::Existe((object) $_POST)) && Departaments_areas::Insertar((object) $_POST);
    (!Departaments_kinds::Existe((object) $_POST)) && Departaments_kinds::Insertar((object) $_POST);