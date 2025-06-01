<?php
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case("tableau_de_bord"):
            $content = "./HTML/accueil.php";
            $title = "GLPI Inside | Le gestionnaire de parc informatique open source";
            break;
        case("inventaire"):
            $content = "./HTML/inventaire.php";
            $title = "GLPI Inside | L'inventaire de votre parc informatique";
            break;
        /**Connexion-Inscription-Déconnexion*/
        /*case("se_connecter"):
            $content = "./CRUD/authentification.php";
            $title = "GLPI Inside | S'authentifier";
            break;

        case("inscription"):
                $content = "./CRUD/inscription.php";
                $title = "GLPI Inside | S'authentifier";
                break;
        */
        case("deconnexion"):
            $content = "./CRUD/deconnexion.php";
            $title = "GLPI Inside | S'authentifier";
            break;

        case ("user"):
            $content = "./CRUD/userSpace/monCompte.php";
            $title = "GLPI Inside | Mon compte";
            break;

        default:
            $content = "./HTML/404.php";
            $title = "Page non trouvée | GLPI Inside";
            break;
    }
} else {
    $content = "./HTML/accueil.php";
    $title = "GLPI Inside | Le gestionnaire de parc informatique open source";
}
?>