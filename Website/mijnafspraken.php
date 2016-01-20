<?php
require_once ("db.php");

session_start();

//force to login first
if(!$_SESSION)
{
    header("Location: ./inloggen.php?error=3");
}

else {

$userid;

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
    $role = $_SESSION['role'];
}

    //get results from db
$query = "SELECT * FROM ikbenik_afspraak WHERE gebruiker_id = $userid";

$result = mysqli_query($db, $query);

$afspraken = [];
while ($row = mysqli_fetch_assoc($result))
{
    $afspraken[] = $row;
}

mysqli_close($db);

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
                    <li class="navigation"><a class="navigation" href="agenda.php">Afspraak maken</a></li>
                    <li class="navigation"><a class="navigation" href="mijnafspraken.php"><b>Mijn afspraken</b></a></li>
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
                <h1 class="pagetitle">Mijn afspraken</h1>
            </div>

            <div class="articles3">
                <table>
                    <tr class="afspraakh">
                        <td class="c1">Datum</td>
                        <td class="c2">Tijdstip</td>
                        <td class="c3">Tijdsduur</td>
                        <td>Verwijderen</td>
                    </tr>
                <?php
                foreach ($afspraken as $afspraak)
                {
                    ?>
                    <tr class="afspraak">
                        <td class="c1"><?= $afspraak['datum']; ?></td>
                        <td class="c2"><?= $afspraak['tijdstip']; ?></td>
                        <td class="c3"><?= $afspraak['duur']; ?></td>
                        <td class="c4"><a class="c4" href="./verwijderafspraak.php?id=<?= $afspraak['id']; ?>">Verwijder</a></td>
                    </tr>
                    <?php
                }
                ?>
                </table>
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
