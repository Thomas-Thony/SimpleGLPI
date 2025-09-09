<?php
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case("tableau_de_bord"):
            $content = "./HTML/accueil.php";
            $title = "GLPI Inside | Le gestionnaire de parc informatique open source";
            break;
        /*Patie inventaire*/
        case("inventaire"):
            $content = "./HTML/inventaire.php";
            $title = "GLPI Inside | L'inventaire de votre parc informatique";
            break;
        
        case("ordintateurs"):
            $content = "./HTML/inventaires/ordinateurs/ordinateurs.php";
            $title = "GLPI Inside | L'inventaire de vos ordinateurs";
            break;

        case("telephones"):
            $content = "./HTML/inventaires/telephones/telephones.php";
            $title = "GLPI Inside | L'inventaire de vos télephones";
            break;

        case("switchs"):
            $content = "./HTML/inventaires/switchs/switchs.php";
            $title = "GLPI Inside | L'inventaire de vos switchs";
            break;

        case("routeurs"):
            $content = "./HTML/inventaires/routeurs/routeurs.php";
            $title = "GLPI Inside | L'inventaire de vos routeurs";
            break;
        case("deconnexion"):
            $content = "./CRUD/deconnexion.php";
            $title = "GLPI Inside | S'authentifier";
            break;

        case ("user"):
            $content = "./CRUD/userSpace/monCompte.php";
            $title = "GLPI Inside | Mon compte";
            break;

        case ("reseaux"): 
            $content = "./HTML/reseaux.php";
            $title = "GLPI Inside | Gestion des réseaux";
            break;
        
        case ("tableauReseau"):
            $content = "./HTML/reseaux/tableauReseau.php";
            $title = "GLPI Inside | Détail du réseau";
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