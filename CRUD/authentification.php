<?php

include_once './Config/connexion.php';

$connexion = connexion();

?>

<div class="content_form">
    <div class="form-container">
        <h1>S'identifier</h1>
        <form action="./Config/login.php" method="POST">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" required>
            
            <label for="mot_de_passe">Mot de passe</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Envoyer</button>
        </form>
        <p>Vous n'avez pas de compte ? <a href="index.php?action=inscription">Inscrivez-vous</a></p>
    </div>
</div>