<?php
    include_once '../Models/Kinds.php';
    $_POST['tipo'] = strtoupper($_POST['tipo']);
    (!Kinds::Existe($_POST['tipo'])) && Kinds::Insertar($_POST['tipo']);
    $_POST['tipo'] = Kinds::BuscarId($_POST['tipo']);