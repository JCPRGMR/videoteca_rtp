<?php
    include_once '../Models/Kinds.php';
    (!Kinds::Existe($_POST['tipo'])) && Kinds::Insertar($_POST['tipo']);
    $_POST['tipo'] = Kinds::BuscarId($_POST['tipo']);