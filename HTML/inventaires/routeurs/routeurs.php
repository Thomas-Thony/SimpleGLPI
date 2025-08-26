<h1>Vos routeurs</h1>
<?php

include_once './Config/SQL/appelRouteurs.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inventaires/routeurs.css">
</head>

<body>
<table class="tableauInventaireRouteurs">
    <thead>
      <tr>
        <th>Numéro de série</th>
        <th>Nom</th>
        <th>Type de machine</th>
        <th>Réseau</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($inventaire as $item):
        $id = $item['idMateriel'];
        $nom = $item['nomMateriel'];
        $type = $item['TypeMachine'];
        $idReseau = $item['idReseau'];
        //Joindre la table inventaire et reseaux pour afficher le nom du réseau
        $stmt = $connexion->prepare("SELECT nomReseau FROM reseaux WHERE idReseau = :idReseau");
        $stmt->bindParam(':idReseau', $idReseau, PDO::PARAM_INT);
        $stmt->execute();
        $reseau = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($reseau) {
          $idReseau = $reseau['nomReseau'];
        } else {
          $idReseau = "Aucun réseau assigné";
        }
        echo "<tr>";
        echo "<td>" . htmlspecialchars($item['idMateriel']) . "</td>";
        echo "<td>" . htmlspecialchars($item['nomMateriel']) . "</td>";
        echo "<td>" . htmlspecialchars($item['TypeMachine']) . "</td>";
        echo "<td>" . $idReseau . "</td>";
      ?>
       <td class="action">
         <!-- Bouton ouvrir modale modifier -->
         <button class="boutonModalModifier" data-toggle="modal" data-target="#modal-modifier-<?= $id ?>">Modifier</button>

         <!-- Bouton ouvrir modale supprimer -->
         <button class="boutonModalSupprimer" data-toggle="modal" data-target="#modal-supprimer-<?= $id ?>">Supprimer</button>

         <!-- Inclusion modales dynamiques -->
         <?php include './HTML/inventaires/routeurs/modalsRouteurs/modalModifier.php'; ?>
         <?php include './HTML/inventaires/routeurs/modalsRouteurs/modalSupprimer.php'; ?>
       </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br>
  <center>
    <button class="boutonModalAjouter" data-toggle="modal" data-target="#modal-ajouter">
      Ajouter un routeur
    </button>
  </center>
  <?php include './HTML/inventaires/routeurs/modalsRouteurs/modalAjouter.php'; ?>
  <br>
</body>