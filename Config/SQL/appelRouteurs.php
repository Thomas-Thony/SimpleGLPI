<?php

include_once './Config/connexion.php';
$connexion = connexion();

//Récupère tous les routeurs
$stmt = $connexion->prepare("SELECT * FROM inventaire INNER JOIN typemateriel ON inventaire.idTypeMateriel = typemateriel.IdType WHERE inventaire.idTypeMateriel = 6;");
$stmt->execute();
$inventaire = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Compte tous les routeurs de l'inventaire
$stmt = $connexion->prepare("SELECT COUNT(*) AS total FROM inventaire WHERE idTypeMateriel = 6;");
$stmt->execute();
$totalRouteurs = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Récupère les types de machines uniques
$stmt = $connexion->prepare("
    SELECT DISTINCT typemateriel.IdType AS idTypeMateriel, typemateriel.TypeMachine
    FROM typemateriel
    INNER JOIN inventaire ON inventaire.idTypeMateriel = typemateriel.IdType
    WHERE inventaire.idTypeMateriel = 6
");
$stmt->execute();
$typesRouteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);