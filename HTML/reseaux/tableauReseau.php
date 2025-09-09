<?php
    $idReseau = isset($_POST['idReseau']) ? $_POST['idReseau'] : null;
    include_once './Config/SQL/appelReseaux.php';
    include_once './Config/SQL/appelSwitchs.php';
    include_once './Config/SQL/appelRouteurs.php';
    include_once './Config/SQL/appelTelephones.php';
    include_once './Config/SQL/appelOrdinateurs.php';
?>
<head>
    <link rel="stylesheet" href="./CSS/inventaires/reseaux.css">
</head>

<body>
    <h1>Inventaire du réseau <?php echo $reseauSelectionne[0]['nomReseau']?></h1>
    <table class="tableauInventaireReseau">
        <thead>
          <tr>
            <th>Numéro de série</th>
            <th>Nom</th>
            <th>Type de machine</th>
            <th>Réseau</th>
            <th>Adresse</th>
            <th>Sous-masque</th>
            <th>Action</th>
          </tr>
        </thead>    
    
        <tbody>
            <?php foreach ($reseauSelectionne as $itemDuReseau) : ?>
            <tr>
                <?php
                    $id = $itemDuReseau['idMateriel'];
                    echo "<td>" . $itemDuReseau['idMateriel'] . "</td>";
                    echo "<td>" . $itemDuReseau['nomMateriel'] . "</td>";
                    echo "<td>" . $itemDuReseau['TypeMachine'] . "</td>";
                    echo "<td>" . $idReseau . "</td>";
                    echo "<td>" . inet_ntop($itemDuReseau['adresseIPV4']) . "</td>";//Affichage sous forme d'ip
                    echo "<td>" . inet_ntop($itemDuReseau['sousMasque']) . "</td>";//Affichage sous forme    
                ?>
                <td class="action">
                    <?php
                        //Faire un switch case en fonction de l'id du type de matériel pour adapter le modale à inclure.
                    ?>
                    <!-- Bouton ouvrir modale modifier -->
                    <button class="boutonModalModifier" data-toggle="modal" data-target="#modal-modifier-<?= $id ?>">Modifier</button>
            
                    <!-- Bouton ouvrir modale supprimer -->
                    <button class="boutonModalSupprimer" data-toggle="modal"
                    data-target="#modal-supprimer-<?= $id ?>">Supprimer</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
</body>