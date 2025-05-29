<?php

session_destroy();

include_once './Config/connexion.php';

$connexion = connexion();

?>

<h1>Vous vous êtes déconnecté avec succès !</h1>
<h3>S'identifier : </h3>
<a href="index.php?action=se_connecter">Se connecter</a>

<h3>S'inscrire : </h3>
<a href="index.php?action=inscription">S'inscrire</a>