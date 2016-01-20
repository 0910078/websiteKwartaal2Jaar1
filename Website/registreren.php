<?php
require_once('db.php');

session_start();

$userid;

if (!empty($_SESSION['login']))    {
    $userid = $_SESSION['login'];
}

$voornaam = '';
$achternaam = '';
$email = '';
$gebruikersnaam = '';
$wachtwoord = '';

function specialchar($data) {
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])) {
    $voornaam = specialchar($_POST['voornaam']);
    $achternaam = specialchar($_POST['achternaam']);
    $email = specialchar($_POST['email']);
    $gebruikersnaam = specialchar($_POST['gebruikersnaam']);
    $wachtwoord = specialchar($_POST['wachtwoord']);

    $compare = '';
    $compare2 = "SELECT email FROM ikbenik_gebruiker WHERE email = $email";
    if ($compare == $compare2) {
        echo "Deze email bestaat al";
    }

    else{

    if ($voornaam == '' || $achternaam == '' || $email == '' || $gebruikersnaam == '' || $wachtwoord == '') {
        echo 'Alle velden moeten ingevuld zijn';
    }

    else    {
        $query = "INSERT INTO ikbenik_gebruiker(voornaam,achternaam,email,gebruikersnaam,wachtwoord,role) VALUES  ('$voornaam','$achternaam','$email','$gebruikersnaam','$wachtwoord','user')";

        mysqli_query($db, $query);

        mysqli_close($db);

        header("location: inloggen.php");
    }
}
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
                <li class="navigation"><a class="navigation" href=#>Mijn afspraken</a></li>
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

    <main class="registreren">
        <div class="welkom">
            <h1 class="pagetitle">Registreren</h1>
        </div>

        <div class="register">
            <h1>Vul a.u.b. de volgende gegevens in:</h1>
            <form method="post" action="">

                    <label for="voornaam">Voornaam:</label>
                    <input id="voornaam" type="text" name="voornaam" value="<?= $voornaam ?>"><br>

                    <label for="achternaam">Achternaam:</label>
                    <input type="text" name="achternaam" id="achternaam" value="<?= $achternaam ?>"><br>

                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email" value="<?= $email ?>"><br>


                    <label for="gebruikersnaam">Gebruikersnaam:</label>
                    <input type="text" name="gebruikersnaam" id="email" value="<?= $gebruikersnaam ?>"><br>


                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" name="wachtwoord" id="wachtwoord" value="<?= $wachtwoord ?>"><br>

                    <input type="submit" value="registreren" name="submit">
            </form>
        </div>
    </main>

    <footer id="info5">
        <ul class="footer">
            <li class="footerh">Openingstijden</li>
            <li class="footert">Maandag:</li>
            <li class="footert">Dinsdag:</li>
            <li class="footert">Woensdag:</li>
            <li class="footert">Donderdag:</li>
            <li class="footert">Vrijdag:</li>
            <li class="footert">Zaterdag:</li>
            <li class="footert">Zondag:</li>
        </ul>

        <ul class="footer">
            <li class="footerh">Social media</li>
            <li class="footert"><a href="https://www.facebook.com/Praktijk-Ik-ben-Ik-169655019854413/"><img class="socialmedia" src="http://usc.ago.org/wp-content/uploads/sites/18/2014/08/facebook-icon-transparent-background.png"/></a></li>
        </ul>

        <ul class="footerfix">
            <li class="footerh">Contact</li>
            <li class="footert">Miranda de Moor</li>
            <li class="footert">+ 31 06 44383598</li>
            <li class="footert">info@ikbenik.nl</li>
            <li class="footert">Herman Heijermanssingel 74</li>
            <li class="footert">3241DE Middelharnis</li>
        </ul>
    </footer>

</div>
</body>
</html>
