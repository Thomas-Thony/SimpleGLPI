<?php
    include_once '../connexion.php';

    $id = $_POST['idMateriel'] ?? null;
    $nom = $_POST['nomMachine'] ?? null;
    $type = $_POST['typeMachine'] ?? null;
    $idReseauMachine = $_POST['reseauMachine'] ?? null;
    if ($idReseauMachine === 'null') {
        $idReseauMachine = null; // Assigner null si "Aucun" est sélectionné
    }
    $ipv4 = $_POST['adresseIPV4'] ?? null;
    $ip_bin = inet_pton($ipv4);//Conversion en binaire pour le stockage

    $sousMasque = $_POST['sousMasque'] ?? null; 
    $sousMasque_bin = inet_pton($sousMasque);//Conversion en binaire pour le stockage

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($id && $nom && $type) {
            try {
                $connexion = connexion();
                $stmt = $connexion->prepare("UPDATE inventaire SET nomMateriel =    :nomMateriel, idReseau = :idReseauMachine, adresseIPV4 = :ipv4 , sousMasque = :sousMasque, idTypeMateriel = :type WHERE idMateriel = :id");
                $stmt->bindParam( ':nomMateriel', $nom);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':idReseauMachine', $idReseauMachine);
                $stmt->bindParam(':ipv4', $ip_bin);
                $stmt->bindParam(':sousMasque', $sousMasque_bin);
                $stmt->execute();

                header('Location: ../../index.php?action=inventaire&success=2');
                exit;
            } catch (Exception $e) {
                die("Erreur lors de la modification : " . $e->getMessage());
            }
        } else{
            die("Tous les champs sont requis." . var_dump($id, $nom, $type));
        }
    }