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
    <header class="p10 f-row jc-b">
        <div class="f-row gap20 a-c">
            <img src="../Images/rtp_logo_blanco.png" alt="" width="75">
            <div class="f-row gap10">
                <a href="../Views/Press.php" class="txtwhite negrita mayus txthover1 p5 <?= ($_SERVER['REQUEST_URI'] == '/Views/Press.php' || $_SERVER['REQUEST_URI'] == '/Views/PressForm.php')? 'text1 b1-bot' : ''; ?>">prensa</a>
                <a href="../Views/Programming.php" class="txtwhite negrita mayus txthover1 p5 <?= ($_SERVER['REQUEST_URI'] == '/Views/Programming.php' || $_SERVER['REQUEST_URI'] == '/Views/ProgrammingForm.php')? 'text1 b1-bot' : ''; ?>">programacion</a>
            </div>
        </div>
        <div class="relative f-row gap10 a-c">
            <?php if($_SERVER['REQUEST_URI'] === '/Views/Press.php'):?>
                <input type="search" name="" id="" placeholder="Buscador" class="p10 br10 color7 txtwhite">
                <a href="PressForm.php" class="p10 color9 br10 pointer overflow-hidden txtwhite negrita">
                    Subir video
                </a>
            <?php elseif($_SERVER['REQUEST_URI'] === '/Views/Programming.php'):?>
                <input type="search" name="" id="" placeholder="Buscador" class="p10 br10 color7 txtwhite">
                <a href="ProgrammingForm.php" class="p10 color9 br10 pointer overflow-hidden txtwhite negrita">
                    Subir video
                </a>
            <?php endif;?>
            <div class="w50px h50px br50p color1 pointer overflow-hidden">
                <img src="../Images/rtp_mundo.jpg" alt="" width="50">
            </div>
        </div>
    </header>
    <main class="w100p h100p border-box p10">
        <!-- CUERPO DE LAS TABLAS -->