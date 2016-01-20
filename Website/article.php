<?php
require_once("db.php");
session_start();

$userid;

$role = 'user';
$id = $_GET['id'];

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
    $role = $_SESSION['role'];
}

$query = "SELECT * FROM ikbenik_artikel WHERE id = $id";

$result = mysqli_query($db, $query);

$articles = [];
while ($row = mysqli_fetch_assoc($result))  {
    $articles[] = $row;
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
            <h1 class="pagetitle">Welkom bij praktijk Ik ben ik!</h1>
        </div>

        <div class="articles">

            <h1>
            <?php
                echo $articles[0]['titel'];
            ?>
            </h1>
            <p>
            <?php
                echo $articles[0]['tekst'];
            ?>
            </p>

        </div>

    </main>

    <?php

    include_once "footer.php";

    ?>

</div>
</body>
</html>
