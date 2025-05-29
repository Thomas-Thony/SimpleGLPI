<?php

include_once './Config/connexion.php';

$connexion = connexion();

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inscription.css">
</head>
<h1>GLPI Inside</h1>
<form action="./Config/traitementConnexion.php" method="POST">
    <h2>S'inscrire</h2>
<div class="formulaire">
    <div class="saisie">
        <input type="text" name="prenom" placeholder="Prénom" required />
        <br>
        <small class="consignes" id="fullname"> Le prénom ne doit contenir que des lettres, des espaces ou des tirets.</small>
    </div>

    <div class="saisie">
        <input type="text" name="nom" placeholder="Nom" required />
        <br>
        <small class="consignes" id="fullname"> Le nom ne doit contenir que des lettres, des espaces ou des tirets.</small>
    </div>

    <div class="saisie">
        <input type="text" name="pseudo" placeholder="Pseudo" required />
        <br>
        <small class="consignes" id="fullname"> Le pseudo peut contenir des lettres, des espaces, des chiffres ou des tirets.</small>
    </div>

    <div class="saisie">
        <input type="email" name="mail" placeholder="Adresse E-Mail" required />
        <br>
        <small class="consignes" id="email">Votre mail peut contenir des chiffres, des lettres, des underscores _ et des tirets.</small>
    </div>

    <div class="saisie">
        <input type="password" name="password" placeholder="Mot de passe" required/>
        <br>
        <small class="consignes" id="mot_de_passe">Votre mot de passe peut contendes chiffres, des lettres, et les caractères -, *, !, et %</small>
    </div>

    <div>
        <input type="submit" value="S'inscrire" />
    </div>
</div>
</form>

<p>On se connait non ? <a href="index.php?action=se_connecter">Authentifiez-vous</a></p>