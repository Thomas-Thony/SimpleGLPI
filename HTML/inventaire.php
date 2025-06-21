<?php
    //Récupere toutes les informations sur l'inventaire pour chaque type de matériel
    include_once './Config/SQL/appelOrdinateurs.php';
    include_once './Config/SQL/appelTelephones.php';
    include_once './Config/SQL/appelRouteurs.php';

?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inventaire.css">
    <script src="./SCRIPTS/deleteSuccess.js"></script>
</head>
<body>
    <?php
    //Gestion des messages de succès

    //Confirmation de suppression
    if(isset($_GET['success']) && $_GET['success'] == 1):
        echo "<div class='message-succes'> ✅ Matériel supprimé avec succès.</div>";
        
    //Confirmation d'ajout    
    elseif(isset($_GET['success']) && $_GET['success'] == 2): 
        echo "<div class='message-succes'> ✅ Matériel ajouté avec succès.</div>";
     endif;
?>

    <h1>Inventaire</h1>
    <div class="tableauCategoriesItems">
         <a class="lienInventaire" href="index.php?action=ordintateurs">
            <div class="itemOrdinateurs">
                 <h2 class="titreCategorie">Ordinateurs</h2><!--A remplacer par une icone-->
                <p><?php echo $totalOrdinateurs?> Ordinateur(s)</p>
            </div>
        </a>
        <a class="lienInventaire" href="index.php?action=telephones">
            <div class="itemTelephones">
                 <h2 class="titreCategorie">Téléphones</h2><!--A remplacer par une icone-->
                <p><?php echo $totalTelephones?> Téléphone(s)</p>
            </div>
        </a>
        <a class="lienInventaire" href="index.php?action=switchs">
            <div class="itemSwitchs">
                <h2 class="titreCategorie">Switchs</h2><!--A remplacer par une icone-->
                <p><?php echo "XXX"?> Switch(s)</p>
            </div>
        </a>
        <a class="lienInventaire" href="index.php?action=routeurs">
            <div class="itemRouteurs">
                <h2 class="titreCategorie">Routeurs</h2><!--A remplacer par une icone-->
                <p><?php echo $totalRouteurs?> Routeur(s)</p>
            </div>
        </a>
     </div>
     <br>
 </body>