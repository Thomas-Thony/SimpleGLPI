<?php
include_once './Config/connexion.php';
include_once './Config/routes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php include_once './HTML/bandeau.php'; ?>
    <section>
        <?php include_once $content ?>
    </section>
    
    <?php
        if(connexion()){
            echo "Connexion réussie !";
        } else {
            echo "Échec de la connexion.";
        }
    ?>
</body>
</html>