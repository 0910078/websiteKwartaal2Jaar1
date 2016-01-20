<?php
require_once('db.php');

session_start();

$gebruikersnaam = '';
$wachtwoord = '';
$error = "";

$error = isset($_GET["error"]) ? $_GET['error'] : "";

$userid;

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
    $role = $_SESSION['role'];

}

function specialchar($data) {
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])) {
    $gebruikersnaam = specialchar($_POST['gebruikersnaam']);
    $wachtwoord = specialchar($_POST['wachtwoord']);

    $query = "SELECT * FROM ikbenik_gebruiker WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord'";

    $result1 = mysqli_query($db, $query);

    $result2 = mysqli_fetch_assoc ($result1);

    if ($result2['gebruikersnaam'] == $gebruikersnaam && $result2['wachtwoord'] == $wachtwoord)    {
        $_SESSION["login"] = $result2['id'];
        $_SESSION["role"] = $result2['role'];
        header("Location: index.php");
    }

    else{
        echo "Gebruikersnaam of wachtwoord is onjuist";
    }

    mysqli_close($db);
 }
else  {

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

    <main class="registreren">
        <div class="welkom">
            <h1 class="pagetitle">Inloggen</h1>
        </div>

        <div class="register">
            <h1>Vul a.u.b. de volgende gegevens in:</h1>
            <form method="post" action="">
                <div class="vraag">
                    <label for="gebruikersnaam">Gebruikersnaam:</label>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" value="<?= $gebruikersnaam ?>"><br>
                </div>
                <div class="vraag">
                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" name="wachtwoord" id="wachtwoord" value="<?= $wachtwoord ?>"><br>
                </div>
                <input type="submit" value="inloggen" name="submit">
            </form>
            <p class= "error">
                <?php
                if ($error == 2) {
                echo 'Je moet ingelogd zijn om een afspraak te kunnen maken';
                }
            ?>
                <?php
                if ($error == 3) {
                    echo 'Je moet ingelogd zijn om uw afspraken te kunnen bekijken';
                }
                ?>
            </p>
            <p>
                Nog geen account? Klik <a href="registreren.php">Hier</a> om te registreren
            </p>
        </div>
    </main>

    <?php

    include_once "footer.php";

    ?>

</div>
</body>
</html>
