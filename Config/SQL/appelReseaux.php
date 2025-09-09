<?php

include_once './Config/connexion.php';
$connexion = connexion();

//Récupère tous les routeurs
$stmt = $connexion->prepare("SELECT * FROM reseaux;");
$stmt->execute();
$reseaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Compte tous les réseaux de l'inventaire
$stmt = $connexion->prepare("SELECT COUNT(*) AS totalReseaux FROM reseaux;");
$stmt->execute();
$totalReseaux = $stmt->fetch(PDO::FETCH_ASSOC)['totalReseaux'];

//Compte le nombre de matériel par réseau
$stmt = $connexion->prepare("SELECT reseaux.idReseau, reseaux.nomReseau, COUNT(inventaire.idMateriel) AS totalMateriel
FROM reseaux 
LEFT JOIN inventaire ON inventaire.idReseau = reseaux .idReseau
GROUP BY reseaux.idReseau, reseaux.nomReseau;");
$stmt->execute();
$nombreMaterielParReseau = $stmt->fetchAll(PDO::FETCH_ASSOC);   

//Selectione le réseau en fonction de son ID
$stmt = $connexion->prepare("SELECT 
    inventaire.idMateriel,
    inventaire.nomMateriel,
    inventaire.adresseIPV4,
    inventaire.sousMasque,
    reseaux.idReseau AS reseau_id,
    reseaux.nomReseau,
    typemateriel.TypeMachine,
    typemateriel.IdType
    FROM inventaire
    JOIN reseaux ON reseaux.idReseau = inventaire.idReseau
    JOIN typemateriel ON inventaire.idTypeMateriel = typemateriel.IdType;
    WHERE reseaux.idReseau = :idReseau;");
$stmt->bindParam(':idReseau', $idReseau);
$stmt->execute();
$reseauSelectionne = $stmt->fetchAll(PDO::FETCH_ASSOC);