<?php
    include_once '../Models/Users.php';
    session_start();
    // (!isset($_SESSION['usuario'])) && header("Location: ../");
    (!Users::Validated_login((object) $_SESSION['usuario'])) && header("Location: ../");
?>
<!DOCTYPE html>
<html lang="es/ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Style01.css">
    <link rel="shortcut icon" href="../Images/rtp_icono.ico" type="image/x-icon">
    <title>Videoteca - RTP</title>
</head>
<body class="m0 color8 f-col h100vh">
    <header class="p10 f-row jc-b wrap gap10">
        <div class="f-row gap10 a-c">
            <img src="../Images/rtp_logo_blanco.png" alt="" width="75">
            <div class="f-row gap10 wrap">
                <a href="../Views/Press.php" class="txtwhite negrita mayus txthover1 p5 <?= ($_SERVER['REQUEST_URI'] == '/videoteca_rtp/Views/Press.php' || $_SERVER['REQUEST_URI'] == '/videoteca_rtp/Views/PressForm.php')? 'text1 b1-bot' : ''; ?>">prensa</a>
                <a href="../Views/Programming.php" class="txtwhite negrita mayus txthover1 p5 <?= ($_SERVER['REQUEST_URI'] == '/videoteca_rtp/Views/Programming.php' || $_SERVER['REQUEST_URI'] == '/videoteca_rtp/Views/ProgrammingForm.php')? 'text1 b1-bot' : ''; ?>">programacion</a>
                <a href="../Views/Gallery.php" class="txtwhite negrita mayus txthover1 p5 <?= ($_SERVER['REQUEST_URI'] == '/videoteca_rtp/Views/Gallery.php')? 'text1 b1-bot' : ''; ?>">GALERIA</a>
            </div>
        </div>
        <div class="relative f-row gap10 a-c wrap">
            <?php if($_SERVER['REQUEST_URI'] === '/Views/Press.php' || $_SERVER['REQUEST_URI'] === '/videoteca_rtp/Views/Press.php'):?>
                <input type="search" name="" aria-valuetext="PRENSA" id="search" placeholder="Buscador" class="p10 br10 color7 txtwhite">
                <a href="PressForm.php" class="p10 pointer overflow-hidden txtwhite negrita b2-bot txthover1 mayus">
                    nuevo video
                </a>
            <?php elseif($_SERVER['REQUEST_URI'] === '/Views/Programming.php' || $_SERVER['REQUEST_URI'] === '/videoteca_rtp/Views/Programming.php'):?>
                <input type="search" name="" aria-valuetext="PROGRAMACION" id="search" placeholder="Buscador" class="p10 br10 color7 txtwhite">
                <a href="ProgrammingForm.php" class="p10 pointer overflow-hidden txtwhite negrita b2-bot txthover1 mayus">
                    nuevo video
                </a>
            <?php elseif($_SERVER['REQUEST_URI'] === '/Views/Gallery.php' || $_SERVER['REQUEST_URI'] === '/videoteca_rtp/Views/Gallery.php'):?>
                <input type="search" name="" aria-valuetext="PROGRAMACION" id="search" placeholder="Buscador" class="p10 br10 color7 txtwhite">
                <a href="ProgrammingForm.php" class="pointer overflow-hidden txtwhite negrita b5-bot txthover1 mayus" title="Nuevo video">
                    <svg width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <path id="upload-a" d="M6.29289322,0.292893219 C6.68341751,-0.0976310729 7.31658249,-0.0976310729 7.70710678,0.292893219 C8.09763107,0.683417511 8.09763107,1.31658249 7.70710678,1.70710678 L5.70710678,3.70710678 C5.31658249,4.09763107 4.68341751,4.09763107 4.29289322,3.70710678 C3.90236893,3.31658249 3.90236893,2.68341751 4.29289322,2.29289322 L6.29289322,0.292893219 Z M0,11 L16,11 L16,13 L0,13 L0,11 Z"/>
                            <path id="upload-c" d="M11,3.41421356 L11,12.0014708 C11,12.5529433 10.5522847,13 10,13 C9.44771525,13 9,12.5529433 9,12.0014708 L9,3.41421356 L6.70710678,5.70710678 C6.31658249,6.09763107 5.68341751,6.09763107 5.29289322,5.70710678 C4.90236893,5.31658249 4.90236893,4.68341751 5.29289322,4.29289322 L9.29289322,0.292893219 C9.68341751,-0.0976310729 10.3165825,-0.0976310729 10.7071068,0.292893219 L14.7071068,4.29289322 C15.0976311,4.68341751 15.0976311,5.31658249 14.7071068,5.70710678 C14.3165825,6.09763107 13.6834175,6.09763107 13.2928932,5.70710678 L11,3.41421356 Z M18,16 L18,10 C18,9.44771525 18.4477153,9 19,9 C19.5522847,9 20,9.44771525 20,10 L20,17 C20,17.5522847 19.5522847,18 19,18 L1,18 C0.44771525,18 0,17.5522847 0,17 L0,10 C0,9.44771525 0.44771525,9 1,9 C1.55228475,9 2,9.44771525 2,10 L2,16 L18,16 Z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd" transform="translate(2 3)">
                            <mask id="upload-d" fill="#ffffff">
                            <use xlink:href="#upload-c"/>
                            </mask>
                            <use fill="#000000" fill-rule="nonzero" xlink:href="#upload-c"/>
                            <g fill="#fff" mask="url(#upload-d)">
                            <rect width="24" height="24" transform="translate(-2 -3)"/>
                            </g>
                        </g>
                    </svg>
                </a>
            <?php endif;?>
            <div class="color9 derecha0 p5 f-row">
                <div class="color9 txtwhite f-row jc-c a-c p10">
                    <?= $_SESSION['usuario']['username'] ?>
                </div>
                <form action="../Php/Exit.php" method="post" class="space-nw color1 f-row jc-c a-c txtwhite color4">
                    <button type="submit" name="salir" class="space-nw color1 h100p pointer txtwhite color8 hover4 p10" value="<?= $_SESSION['usuario']['id_user'] ?>">CERRAR SESION</button>
                </form>
            </div>
        </div>
    </header>
    <main class="w100p h100p border-box p10">