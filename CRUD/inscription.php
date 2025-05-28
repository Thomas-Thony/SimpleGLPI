<?php

include_once './Config/connexion.php';

$connexion = connexion();

?>

<form action="./config/registerRM.php" method="POST">

    <input type="text" name="prenom" placeholder="Prénom" required />
    <small class="consignes" id="fullname"> Le prénom ne doit contenir que dlettres, des espaces ou des tirets.</small>
    <br>
    <input type="text" name="nom" placeholder="Nom" required />
    <small class="consignes" id="fullname"> Le nom ne doit contenir que dlettres, des espaces ou des tirets.</small>
    <br>
    <input type="text" name="pseudo" placeholder="Pseudo" required />
    <small class="consignes" id="fullname"> Le pseudo peut contenir des lettres, des espaces, des chiffres ou des tirets.</small>
    <br>
    <input type="email" name="mail" placeholder="Adresse E-Mail" required />
    <small class="consignes" id="email">Votre mail peut contenir des chiffrdes lettres, >des underscores _ et des tirets.</small>
    <br>
    <small class="consignes" id="email"></small>
    <label class="connexion_utils">
        <input type="password" name="password" placeholder="Mot de passe required"/>

    </label>
    <small class="consignes" id="password">Votre mot de passe peut contendes chiffres, des lettres, et les caractères -, *, !, et %</small>
    <br>
    <div>
        <input type="submit" value="S'inscrire" />
    </div>
</form>