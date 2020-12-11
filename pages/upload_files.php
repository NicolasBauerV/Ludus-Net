<?php
    require 'connexion_déconnexion/bdd_connexion.php';
    if (!empty($_FILES['fichier']) && $_FILES['fichier']['error'] === 0) {
        if ($_FILES['fichier']['size'] <= 5000000) { //5Mo max
            // Récupérer les informations du fichier
            $file_info = pathinfo($_FILES['fichier']['name']);
            // On récupère son extension
            $file_extension = $file_info['extension'];
            //Extension(s) acceptée(s)
            $array_extension = array('pdf', 'PDF'); // PDF Only
            // Répertoire par défaut + nom du fichier
            $address = '../src/files_to_upload/'.$_FILES['fichier']['name'];


            // Si les extensions sont bonnes alors on envoie
            if (in_array($file_extension, $array_extension)) {
                move_uploaded_file($_FILES['fichier']['tmp_name'], $address);
                // Envoie à la bdd
                $request = $bdd -> prepare('INSERT INTO files (name, url) VALUES (?, ?)');
                $request -> execute(array($_FILES['fichier']['name'], $address));
                header('location: ../src/pages/upload_files.php?success=1');
                exit();
            } else {
                header('location: ../pages/upload_files.php?error=1&extension=1');
                exit();
            }
        }
        header('location: ../pages/upload_files.php?error=1');
        exit();
    }
?>

<!Doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Upload-Files to BDD</title>
</head>
<body>
    <h1>Choisissez un fichier à envoyer sur la base de donnée</h1>
    <?php
     if (isset($_GET['error'])) {
        if (isset($_GET['extension'])) {
            echo '<p style="background-color: darkred; color: white; padding: .5em; width: max-content;">Vérifier l\'extension du fichier</p>';
        }
     } elseif (isset($_GET['error'])) {
        echo '<p style="background-color: darkred; color: white; padding: .5em; width: max-content;">Envoie échoué</p>';
    } elseif (isset($_GET['success'])) {
        echo '<p style="background-color: green; color: white; padding: .5em; width: max-content;">Envoie effectué</p>';
    } ?>
    <form method="POST" action="upload_files.php" enctype="multipart/form-data">
        <input type="file" name="fichier">
        <br>
        <button type="submit">Envoyer le fichier</button>
    </form>
</body>
</html>
