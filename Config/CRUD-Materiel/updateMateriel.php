<?php
    include_once '../connexion.php';

    $id = $_POST['idMateriel'] ?? null;
    $nom = $_POST['nomMachine'] ?? null;
    $type = $_POST['typeMachine'] ?? null;
    $idReseauMachine = $_POST['reseauMachine'] ?? null;
    if ($idReseauMachine === 'null') {
        $idReseauMachine = null; // Assigner null si "Aucun" est sélectionné
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($id && $nom && $type) {
            try {
                $connexion = connexion();
                $stmt = $connexion->prepare("UPDATE inventaire SET nomMateriel =    :nomMateriel, idReseau = :idReseauMachine, idType = :type WHERE id = :id");
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':idReseauMachine', $idReseauMachine);
                $stmt->execute();

                header('Location: listeMateriels.php?modification=success');
                exit;
            } catch (Exception $e) {
                die("Erreur lors de la modification : " . $e->getMessage());
            }
        } else{
            die("Tous les champs sont requis.");
        }
    }