<?php
require_once ("db.php");

session_start();

if(!$_SESSION)
{
    header("Location: ./inloggen.php?error=2");
}

$userid;
$aantal = 1;
$date = '';
$time = '';
$duur = '';

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
    $role = $_SESSION['role'];
}

if (isset($_POST['submit']))    {
    $datum = $_POST['datum'];
    $tijdstip = $_POST['tijdstip'];
    $duur = $_POST['duur'];

    $query = "INSERT INTO ikbenk_afspraak(gebruiker_id, datum, tijdstip, aantal, duur) VALUES ('$userid', '$datum', '$tijdstip', '$aantal', '$duur')";

    mysqli_query($db, $query);

    mysqli_close($db);

    header("Location: ./mijnafspraken.php");
}

else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Praktijk ik ben ik</title>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="js/pickadate.js-3.5.6/lib/themes/default.css" id="theme_base">
        <link rel="stylesheet" href="js/pickadate.js-3.5.6/lib/themes/default.date.css" id="theme_date">
        <link rel="stylesheet" href="js/pickadate.js-3.5.6/lib/themes/default.time.css" id="theme_time">
        <script src="js/script.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/pickadate.js-3.5.6/lib/picker.js"></script>
        <script src="js/pickadate.js-3.5.6/lib/picker.date.js"></script>
        <script src="js/pickadate.js-3.5.6/lib/picker.time.js"></script>
    </head>

    <body>
    <div class="container">

        <header>

            <nav class="navigation">
                <ul class="navigation">
                    <li class="navigation"><a class="navigation" href="index.php">Home</a></li>
                    <li class="navigation"><a class="navigation" href="agenda.php"><b>Afspraak maken</b></a></li>
                    <li class="navigation"><a class="navigation" href="mijnafspraken.php">Mijn afspraken</a></li>
                    <li class="navigation"><a class="navigation" href="contact.php">Contact</a></li>
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

            <div class="logo">
                <img class="logo" src="images/logo-ikbenik-metal-brush1.png"/>
            </div>

        </header>

        <main>

            <div class="welkom">
                <h1 class="pagetitle">Agenda</h1>
            </div>

            <div class="articles3">
                <h1>Kies een datum en tijd</h1>
                <form class="afspraak" method="post" action="">
                    <input name= "datum" class="datepicker" type="text" placeholder="Kies een datum"><br>
                    <input name= "tijdstip" class="timepicker" type="text" placeholder="Kies een tijdstip"><br>
                    <input name= "duur" type="text" placeholder="Tijdsduur in minuten"><br>
                    <input type="submit" name="submit" value="bevestigen">
                </form>

                <?php
                if (isset($_POST['submit']))    {
                    echo "uw afspraak is gemaakt";
                }
                ?>

            </div>

        </main>

        <?php

        include_once "footer.php";

        ?>

    </div>

    <script src="js/script.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/pickadate.js-3.5.6/lib/picker.js"></script>
    <script src="js/pickadate.js-3.5.6/lib/picker.date.js"></script>
    <script src="js/pickadate.js-3.5.6/lib/picker.time.js"></script>

    </body>
    </html>

    <?php
}
    ?>

