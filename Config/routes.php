<?php
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case("tableau_de_bord"):
            $content = "./HTML/accueil.php";
            $title = "GLPI Inside | Le gestionnaire de parc informatique open source";
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