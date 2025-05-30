<?php
include_once './Config/connexion.php';

$connexion = connexion();


?>

<head>
    <link rel="stylesheet" href="./CSS/authentification.css">
    <meta charset="UTF-8">
</head>

<body>
    <h1>GLPI Inside</h1>
    
    <form action="./Config/traitementConnexion.php" method="POST">
    <h2>S'identifier</h2>
    <div class="formulaire">
        <div class="saisie">
            <input type="text" name="pseudo" placeholder="Pseudo" required />
            <br>
            <small class="consignes" id="fullname"> Le pseudo peut contenir des lettres, des    espaces, des chiffres ou des tirets.</small>
        </div>

        <div class="saisie">
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <br>
            <small class="consignes" id="mot_de_passe">Votre mot de passe peut contendes    chiffres, des lettres, et les caractères -, *, !, et %</small>
        </div>

        <div>
            <input type="submit" value="Se connecter" />
        </div>
    </div>
    </form>
    <p>Vous n'avez pas de compte ? <a href="./register.php">Inscrivez-vous</a></p>
</body>