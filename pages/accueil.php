<?php
    require 'connexion_déconnexion/bdd_connexion.php';
    // Début
    session_start();
    //Si le client ne s'est pas connecté on renvoie à la page de connexion
    if (empty($_SESSION['username'])) {
        header('location: ../pages/connexion.php');
        exit();
    }

    if (!empty($_POST['emailI'])) {
        $email_user = htmlspecialchars($_POST['emailI']);
        if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) {
            header('location: ../pages/accueil.php?error=1&message=Adresse email invalide');
            exit();
        }


    }
?>

<!Doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ludus-Net : Accueil</title>
    <script src="../src/scripts/main.js" defer></script>
    <link type="text/css" rel="stylesheet" href="../src/style/accueil.css"/>
</head>
<body>
    <header>
        <h2 style="margin-left: .4em">Bienvenue <?php echo $_SESSION['username'];?></h2>
        <?php echo '<img width="70" height="70" style="margin-right: .9em; border-radius: 80px;" src="'.$_SESSION['pdp'].'"
        alt="Photo de Profil de: '.$_SESSION['username'].'">'?>
        <ul>
            <li><a href="account_settings.php">Mon compte</a></li>
        </ul>
    </header>

    <div id="main">
        <button type="button" id="btn_form">Demander le document</button>
        <form method="POST" id="form-mail">

        </form>
        <button type="button" onclick="location.href = 'connexion_déconnexion/deconnexion.php'">Déconnectez-vous</button>
    </div>
</body>
</html>
