<?php

include_once './Config/connexion.php';
$connexion = connexion();

//Récupère tous les téléphones de l'inventaire (Fixes ou portables)
$stmt = $connexion->prepare("SELECT * FROM inventaire INNER JOIN typemateriel ON inventaire.idTypeMateriel = typemateriel.IdType WHERE inventaire.idTypeMateriel = 5;");
$stmt->execute();
$inventaire = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Compte tous les théléphones de l'inventaire (Fixes ou portables)
$stmt = $connexion->prepare("SELECT COUNT(*) AS total FROM inventaire WHERE idTypeMateriel = 5;");
$stmt->execute();
$totalSwitchs = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Récupère les types de machines uniques
$stmt = $connexion->prepare("
    SELECT DISTINCT typemateriel.IdType AS idTypeMateriel, typemateriel.TypeMachine
    FROM typemateriel
    INNER JOIN inventaire ON inventaire.idTypeMateriel = typemateriel.IdType
    WHERE inventaire.idTypeMateriel = 5
");
$stmt->execute();
$typesSwitchs = $stmt->fetchAll(PDO::FETCH_ASSOC);