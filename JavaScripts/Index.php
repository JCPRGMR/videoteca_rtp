<?php
    include_once '../Models/Users.php';
    (!Users::Validated_login((object) $_SESSION['usuario'])) && header("Location: ../");