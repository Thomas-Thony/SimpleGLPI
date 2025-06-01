<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bandeau.css">
</head>
<body>
    <nav class="bandeau">
<!--Titre du bandeau du bandeau menu-->
        <h1>Simple GLPI</h1>
        <hr>

<!--Logo de l'utilisateur-->
<center>
<a class="lienCompteUtilisateur" href="index.php?action=user">
    <img class="avatarUtilisateur" src="./Sources/user.png" alt="Logo utilisateur">
    <br><?php echo $_SESSION["Gestionnaire"]["Pseudo"]; ?></a>
</center>

<!--Menu de navigation-->
        <ul class="bandeau-menu">
            <li class="bandeau-item"><a href="index.php?action=tableau_de_bord">Tableau de bord</a></li>
            <li class="bandeau-item"><a href="index.php?action=inventaire">Inventaire</a></li>
            <li class="bandeau-item"><a href="index.php?action=reseaux">Réseaux</a></li>
            <li class="bandeau-item"><a href="index.php?action=utilisateurs">Utilisateurs</a></li>
            <li class="bandeau-item"><a href="./logout.php">Se déconnecter</a></li>
        </ul>
    </nav>
</body>
</html>