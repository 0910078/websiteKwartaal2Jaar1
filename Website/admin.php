<?php
require_once("db.php");
session_start();

$userid;

$role = 'user';

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
    $role = $_SESSION['role'];
}

if ($role == 'user')    {
    header("Location: index.php");
}

$query = "SELECT * FROM ikbenik_afspraak ORDER BY datum";

$result = mysqli_query($db, $query);

$afspraken = [];
while ($row = mysqli_fetch_assoc($result))  {
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
</head>

<body>
<div class="container">

    <header>

        <nav class="navigation">
            <ul class="navigation">
                <li class="navigation"><a class="navigation" href="index.php"><b>Home</b></a></li>
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
            <h1 class="pagetitle">Admin</h1>
        </div>

        <div class="articles">

            <a class="article" href="create.php">Schrijf nieuw artikel</a>

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
                        <td class="c4"><a class="c4" href="verwijderafspraak.php?id=<?= $afspraak['id']; ?>">Verwijder</a></td>
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
</body>
</html>
