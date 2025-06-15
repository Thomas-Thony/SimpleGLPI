<?php 

include_once '../connexion.php';

$idType = $_POST['typeMachine'] ?? null;
$nomMachine= $_POST['nomMachine'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($idType && $nomMachine) {
        try {
            $connexion = connexion();
            $stmt = $connexion->prepare("INSERT INTO inventaire (nomMateriel, idTypeMateriel) VALUES (:nom, :type)");
            $stmt->bindParam(':nom', $nomMachine);
            $stmt->bindParam(':type', $idType);
            $stmt->execute();

            header('Location: ../../index.php?action=inventaire&success=2');
            exit;
        } catch (Exception $e) {
            die("Erreur lors de l'ajout : " . $e->getMessage());
        }
    } else {
        die("Tous les champs sont requis.");
    }
}