<?php
require_once("db.php");
session_start();

$userid;
$role = 'user';

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
    $role = $_SESSION['role'];
}

if(isset($_POST['submit'])) {
    $titel = htmlentities($_POST['titel']);
    $tekst = htmlentities($_POST['tekst']);
    $query = "INSERT INTO ikbenik_artikel(titel, tekst) VALUES ('$titel', '$tekst')";

    mysqli_query($db, $query);

    mysqli_close($db);

    header("Location: index.php");
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
            </ul>
        </nav>

        <div class ="logo">
            <img class="logo" src="images/logo-ikbenik-metal-brush1.png"/>
        </div>

    </header>

    <main>

        <div class="welkom">
            <h1 class="pagetitle">Artikel schrijven</h1>
        </div>

        <div class="articles">

            <form method="post" action="">
                <label for="titel"></label>
                <input id="titel" type="text" name="titel">
                <label for="tekst"></label>
                <textarea id="tekst" name="tekst"></textarea>
                <input  type="submit" value="Opslaan" name="submit">
            </form>

        </div>

    </main>

    <?php

    include_once "footer.php";

    ?>

</div>
</body>
</html>
