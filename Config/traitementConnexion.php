<?php
include_once './connexion.php';
$connexion = connexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*Récupération des données saisies pour l'inscription*/
    /* htmlspecialchars est utilisé pour éviter les injections XSS et trim pour enlever les espaces inutiles */
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $mail = htmlspecialchars(trim($_POST['mail']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validation des données (toutes saisies sont requises)
    if (empty($prenom) || empty($nom) || empty($pseudo) || empty($mail) || empty($password)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    // Vérification du pseudo et de l'email
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE Pseudo = ? OR mail = ?");
    $stmt->execute([$pseudo, $mail]);
    if ($stmt->rowCount() > 0) {
        echo "Le pseudo ou l'email est déjà utilisé.";
        exit;
    }

    // Insertion dans la BDD
    $stmt = $connexion->prepare("INSERT INTO utilisateurs (Prenom, Nom, Pseudo, Mail, Mot_De_Passe) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$prenom, $nom, $pseudo, $mail, password_hash($password, PASSWORD_DEFAULT)])) {
        echo "Inscription réussie !";
        header("Location: index.php?action=se_connecter");
        exit;
    } else {
        echo "Erreur lors de l'inscription.";
    }
}

?>