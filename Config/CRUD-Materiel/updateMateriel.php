<?php
include_once '../connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idMateriel'] ?? null;
    $nom = $_POST['nomMachine'] ?? null;
    $type = $_POST['typeMachine'] ?? null;

    if ($id && $nom && $type) {
        try {
            $connexion = connexion();
            $stmt = $connexion->prepare("UPDATE inventaire SET nomMateriel = :nomMateriel, idType = :type WHERE id = :id");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: listeMateriels.php?modification=success');
            exit;
        } catch (Exception $e) {
            die("Erreur lors de la modification : " . $e->getMessage());
        }
    } else {
        die("Tous les champs sont requis.");
    }
}
?>