<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    if(isset($_SESSION["Gestionnaire"]) && !empty($_SESSION["Gestionnaire"]["Pseudo"])) {
    echo '<p>Bienvenue ' .  $_SESSION["Gestionnaire"]["Pseudo"]. ' !</p>';
} else {
        echo "Pour un accueil personalisé, veuillez vous connecter.";
    }
?>
    
    <h1>Tableau de bord</h1>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Error eius aperiam amet quod modi corporis nobis ad unde velit et ducimus, aut ratione soluta neque adipisci illo numquam dolorem repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error eius aperiam amet quod modi corporis nobis ad unde velit et ducimus, aut ratione soluta neque adipisci illo numquam dolorem repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error eius aperiam amet quod modi corporis nobis ad unde velit et ducimus, aut ratione soluta neque adipisci illo numquam dolorem repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error eius aperiam amet quod modi corporis nobis ad unde velit et ducimus, aut ratione soluta neque adipisci illo numquam dolorem repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error eius aperiam amet quod modi corporis nobis ad unde velit et ducimus, aut ratione soluta neque adipisci illo numquam dolorem repellendus.
</body>
</html>