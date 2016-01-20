<?php
session_start();

$userid;

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
    $role = $_SESSION['role'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Praktijk ik ben ik</title>
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="container">

    <header>

        <nav class="navigation">
            <ul class="navigation">
                <li class="navigation"><a class="navigation" href="index.php">Home</a></li>
                <li class="navigation"><a class="navigation" href="agenda.php">Afspraak maken</a></li>
                <li class="navigation"><a class="navigation" href="mijnafspraken.php">Mijn afspraken</a></li>
                <li class="navigation"><a class="navigation" href="contact.php"><b>Contact</b></a></li>
                <li class="navigation"><a class="navigation" href="registreren.php">Registreren</a></li>
                <?php
                if (empty($userid)) {
                ?>
                <li class="navigation"><a class="navigation" href=inloggen.php>Inloggen</a></li>
                    <?php
                }
                ?>
                <?php
                if (!empty($userid)) {
                    ?>
                    <li class="navigation"><a class="navigation" href="uitloggen.php">Uitloggen</a></li>
                    <?php
                }
                ?>
                <?php
                    if ($role == 'admin')   {
                        ?>
                        <li class="navigation"><a class="navigation" href="admin.php">Admin pagina</a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>

        <div class ="logo">
            <img class="logo" src="images/logo-ikbenik-metal-brush1.png"/>
        </div>

    </header>

    <main>

        <div class="welkom">
            <h1 class="pagetitle">Contact</h1>
        </div>

        <iframe frameborder="0" scrolling="no" src="https://maps.google.com/maps?hl=en&q=Herman Heijermanssingel 74&ie=UTF8&t=roadmap&z=16&iwloc=B&output=embed"></iframe>

        <div id="info1">
            <h3>Over mij</h3>
            <p>Miranda de Moor</p>
            <p>Natuurgeneeskundig therapeut</p>
            <h3>Adres</h3>
            <p>Herman Heijermanssingel 74</p>
            <p>3241 DE Middelharnis</p>
        </div>
        <div id="info2">
            <h3>Telefoon</h3>
            <p>+31 06 44383598</p>
            <h3>E-mail</h3>
            <p>info@ikbenik.eu</p>
        </div>

    </main>

    <?php

    include_once "footer.php";

    ?>

</div>
</body>
</html>
