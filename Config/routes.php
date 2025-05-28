<?php
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case("tableau_de_bord"):
            $content = "./HTML/accueil.php";
            $title = "GLPI Inside | Le gestionnaire de parc informatique open source";
            break;

        /**Connexion-Inscription-Déconnexion*/
        case("se_connecter"):
            $content = "./CRUD/authentification.php";
            $title = "GLPI Inside | S'authentifier";
            break;

        case("inscription"):
                $content = "./CRUD/inscription.php";
                $title = "GLPI Inside | S'authentifier";
                break;
        case("deconnexion"):
            $content = "./CRUD/deconnexion.php";
            $title = "GLPI Inside | S'authentifier";
            break;

        default:
            $content = "./HTML/404.php";
            $title = "Page non trouvée | Find Me App";
            break;
    }
} else {
    $content = "./HTML/accueil.php";
    $title = "GLPI Inside | Le gestionnaire de parc informatique open source";
}
?>