<?php

include_once './Config/connexion.php';
$connexion = connexion();

//Récupère tous les ordinateurs de l'inventaire (Fixes ou portables)
$stmt = $connexion->prepare("SELECT * FROM inventaire INNER JOIN typemateriel ON inventaire.idTypeMateriel = typemateriel.IdType WHERE inventaire.idTypeMateriel IN (1, 2);");
$stmt->execute();
$inventaire = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Compte tous les ordinateurs de l'inventaire (Fixes ou portables)
$stmt = $connexion->prepare("SELECT COUNT(*) AS total FROM inventaire WHERE idTypeMateriel IN (1, 2);");
$stmt->execute();
$totalOrdinateurs = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Récupère les types de machines uniques (Ordinateurs fixes et portables)
$stmt = $connexion->prepare("
    SELECT DISTINCT typemateriel.IdType AS idTypeMateriel, typemateriel.TypeMachine
    FROM typemateriel
    INNER JOIN inventaire ON inventaire.idTypeMateriel = typemateriel.IdType
    WHERE inventaire.idTypeMateriel IN (1, 2)
");
$stmt->execute();
$typesOrdinateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);