<?php
    include_once "./Config/connexion.php";
    $action = $_GET['action'] ?? '';

    if (!isset($_SESSION["Gestionnaire"]) && !in_array($action, ['se_connecter', 'inscription'])) {
        header("Location: ./login.php");
        exit();
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/monCompte.css">
</head>
<body>
    <h1>Bonjour <?php echo $_SESSION["Gestionnaire"]["Pseudo"]?> ! </h1>
    <div class="infosCompte">
        <div class="avatarUtilisateur">
            <img src="./Sources/user.png" alt="Logo utilisateur">
        </div>
        
        <p><strong>Prénom :</strong> <?php echo $_SESSION["Gestionnaire"]["Prenom"]?></p>
        <p><strong>Nom :</strong> <?php echo $_SESSION["Gestionnaire"]["Nom"]?></p>
        <p><strong>Pseudo utilisateur :</strong> <?php echo $_SESSION["Gestionnaire"]
        ["Pseudo"]?></p>
        <p><strong>Email :</strong> <?php echo $_SESSION["Gestionnaire"]["Email"]?></p>
        <p><strong>Numéro du compte :</strong> <?php echo $_SESSION["Gestionnaire"]["id"]?></p>
    </div>
    <br>
</body>
</html>