<?php
session_start();
session_destroy();
unset($_SESSION['Gestionnaire']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GLPI Inside | Se connecter</title>
    <link rel="stylesheet" href="./CSS/logout.css">
</head>
<body>
    <?php include './CRUD/deconnexion.php'; ?>
</body>
</html>
