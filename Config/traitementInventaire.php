<?php
include_once './connexion.php';
$connexion = connexion();

/*Traitement de la récupération de l'inventaire*/
$stmt = $connexion->prepare("La requete SQL qui compte chaque élément de l'inventaire par champ et catégorie");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>