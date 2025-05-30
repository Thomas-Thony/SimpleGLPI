<?php
include_once './connexion.php';
$connexion = connexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo']);
    $password = trim($_POST['password']);

    if (empty($pseudo) || empty($password)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE Pseudo = ?");
    $stmt->execute([$pseudo]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['Mot_De_Passe'])) {
            session_start();
            $_SESSION["Gestionnaire"] = [
                "Prenom" => $user['Prenom'],
                "Nom" => $user['Nom'],
                "Pseudo" => $user['Pseudo'],
                "Email" => $user['Mail'],
                "id" => $user['idCompte']
            ];

            header("Location: ../index.php?action=tableau_de_bord");
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur introuvable.";
    }
}
?>
