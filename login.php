<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION["Gestionnaire"])) {
    header("Location: ./index.php?action=tableau_de_bord");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GLPI Inside | Connexion</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <?php include './CRUD/authentification.php'; ?>
</body>
</html>
