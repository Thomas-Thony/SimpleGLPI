<?php
include_once './connexion.php';
$connexion = connexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $pseudo = trim($_POST['pseudo']);
    $mail = trim($_POST['mail']);
    $password = trim($_POST['password']); // juste trim, pas htmlspecialchars
    
    if (empty($prenom) || empty($nom) || empty($pseudo) || empty($mail) || empty($password)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    // Vérifier si pseudo ou mail existe déjà
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE Pseudo = ? OR Mail = ?");
    $stmt->execute([$pseudo, $mail]);

    if ($stmt->rowCount() > 0) {
        echo "Le pseudo ou l'email est déjà utilisé.";
        exit;
    }

    // Hasher le mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insérer l'utilisateur
    $stmt = $connexion->prepare("INSERT INTO utilisateurs (Prenom, Nom, Pseudo, Mail, Mot_De_Passe) VALUES (?, ?, ?, ?, ?)");
    $success = $stmt->execute([$prenom, $nom, $pseudo, $mail, $passwordHash]);

    if ($success) {
        session_start();
        $idCompte = $connexion->lastInsertId();

        $_SESSION["Gestionnaire"] = [
            "Prenom" => $prenom,
            "Nom" => $nom,
            "Pseudo" => $pseudo,
            "Email" => $mail,
            "id" => $idCompte
        ];

        header("Location: ../index.php?action=tableau_de_bord");
        exit;
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
