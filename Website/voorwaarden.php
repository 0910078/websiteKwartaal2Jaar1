<?php
require_once("db.php");
session_start();

$userid;

$role = 'user';

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

        <div class ="logo">
            <img class="logo" src="images/logo-ikbenik-metal-brush1.png"/>
        </div>

    </header>

    <main>

        <div class="welkom">
            <h1 class="pagetitle">Algemene voorwaarden</h1>
        </div>

        <div class="articles">

            <h1>
                Ik ben Ik Praktijk voor yoga, massage en coaching
            </h1>
            <p>
                Deze overeenkomst wordt aangedaan voor de duur van cursus.
            </p>
            <p>
                1. Het cursusbedrag dient zoals aangegeven op de brief overgemaakt te zijn 1 week voor aanvang van de cursus,
                tenzij anders is overeengekomen.
                Wanneer het cursusgeld niet binnen de gestelde betalingstermijn op onze rekening staat ,
                wordt de inschrijving geannuleerd. Wij brengen dan wel &euro;10,- administratiekosten in rekening.
                </p>
            <p>
                2. Bij andere afspraken omtrent betaling wordt dit bevestigd in een brief en door de cursist ondertekend.
                ( Bij priv&eacute;lessen graag contant betalen na de les. Je krijgt een factuur van de gevolgde les.
                </p>
            <p>
                3. Bij annulering van een cursus voor aanvang vanaf 2 weken wordt een bedrag van &euro;10,- annulerings-en administratiekosten in rekening gebracht.
                Bij annulering van een cursus voor aanvang  vanaf 1 week wordt het volledige cursusbedrag in rekening gebracht. ( er mag wel iemand anders in plaats van uzelf )
                </p>
            <p>
                4. Bij het niet vooraf schriftelijk melden van medische klachten of aandoeningen (zie intakeformulier) is Ik ben Ik niet aansprakelijk voor enig letsel voortvloeiend uit oefeningen en/of adviezen,
                indien het letsel betrekking heeft op die klacht of aandoening.
                </p>
            <p>
                5. Stop je tijdens de cursus met het deelnemen van de lessen geeft Ik ben Ik geen cursusgeld terug. Ook voor lessen die je mist ,
                wordt geen geld teruggeven, tenzij er gestopt moet  worden wegens aantoonbare medische redenen.
                U dient dan een doktersverklaring te overhandigen. Wel zijn er mogelijkheden om de les in te halen.
                </p>
            <p>
                6. Voor het volgen van de wekelijkse hoogzwangerenles wordt per les contant betaald.
                </p>
            <p>
                7. Een afspraak voor een les of een consult dient bij verhindering 24 uur voor de tijd van de afspraak te worden afgezegd.
                In geval van niet tijdige afzegging of 'niet-afzegging' wordt het consult of de training in rekening gebracht.
                Betreffende afspraken op een dag volgend op een zondag of op &eacute;&eacute;n of meer erkende feestdagen wordt bedoelde termijn van 24 uur geacht in te gaan om 18.00 uur op de laatste voorafgaande gewone werkdag.
                Betreffende een gewone maandag gaat de termijn derhalve in om 18.00 uur op de voorafgaande vrijdag.
            </p>

        </div>

    </main>

    <?php

    include_once "footer.php";

    ?>

</div>
</body>
</html>
