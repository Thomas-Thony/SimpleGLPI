<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <h1>Tableau de bord</h1>
    <div class="containerTableauDeBord">
        <p class="texteAccueil">
            Bienvenue sur votre tableau de bord. Ici, vous pouvez gérer et visualiser l'état de votre réseau et de vos équipements. Utilisez les menus pour naviguer entre les différentes sections et accéder aux fonctionnalités disponibles.
        </p>
        <div class="boutonsContainer">
            <button class="boutonLien">
                <a class="lienInventaire" href="index.php?action=inventaire">
                    Inventaire
                </a>
            </button>

            <button class="boutonLien">
                <a class="lienReseaux" href="index.php?action=reseaux">
                    Réseaux
                </a>
            </button>
            <button class="boutonLien">
                <a href="index.php?action=utilisateurs">
                    Utilisateurs
                </a>
            </button>
            <button class="boutonLien">
                <a href="index.php?action=user">
                    Mon compte
                </a>
            </button>
        </div> 
    </div>
</body>
</html>