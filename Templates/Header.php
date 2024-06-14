<?php
    session_start();
    (!isset($_SESSION['usuario'])) && header("Location: ../");
?>
<!DOCTYPE html>
<html lang="en">
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
            <?php endif;?>
            <div class=" h50px br50p color1 pointer f-row wrap">
                <img src="../Images/rtp_mundo.jpg" alt="" width="50">
                <div class="color9 txtwhite f-row jc-c a-c p10">
                    <?= $_SESSION['usuario']['username'] ?>
                </div>
                <form action="../Php/Exit.php" method="post" class="color1 f-row jc-c a-c txtwhite color4">
                    <button type="submit" name="salir" class="color1 h100p pointer txtwhite color4" value="<?= $_SESSION['usuario']['id_user'] ?>">SALIR</button>
                </form>
            </div>
        </div>
    </header>
    <main class="w100p h100p border-box p10">
        <!-- CUERPO DE LAS TABLAS -->