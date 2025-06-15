<?php
include_once '../connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idMateriel'] ?? null;

    if ($id) {
        try {
            $connexion = connexion();
            $stmt = $connexion->prepare("DELETE FROM inventaire WHERE idMateriel = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: ../../index.php?action=inventaire&success=1');
            exit;
        } catch (Exception $e) {
            die("Erreur lors de la suppression : " . $e->getMessage());
        }
    } else {
        die("ID manquant.");
    }
}
?>
