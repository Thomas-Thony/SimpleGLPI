<?php
session_start();

if(isset($_SESSION['Gestionnaire'])){
    header('Location: index.php?action="se_connecter"');
}

include_once './Config/connexion.php';
include_once './Config/routes.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <!--Bandeau de navigation-->
    <?php include_once './HTML/bandeau.php'; ?>

    <!--Contenu en fonction du chemin (Cf ./Config/routes.php)-->
    <section>
        <?php include_once $content ?>
    </section>
</body>
</html>