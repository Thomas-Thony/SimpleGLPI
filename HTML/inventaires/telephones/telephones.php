<h1>Vos téléphones</h1>
<?php
  include_once './Config/SQL/appelTelephones.php';
  include_once './Config/SQL/appelReseaux.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/inventaires/telephonesPortables.css">
</head>

<body>
  <table class="tableauInventaireTelephonesPortables">
  <thead>
    <tr>
      <th scope="col">Numéro de série</th>
      <th scope="col">Nom</th>
      <th scope="col">Type de machine</th>
      <th scope="col">Réseau</th>
      <th scope="col">Adresse</th>
      <th scope="col">Sous-masque</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($inventaire as $item) {
          $id = $item['idMateriel'];
          $nom = $item['nomMateriel'];
          $type = $item['TypeMachine'];
          $idReseau= $item['idReseau'];
          $ipv4 = $item['adresseIPV4'];
          $sousMasque = $item['sousMasque'];
          //Joindre la table inventaire et reseaux pour afficher le nom du réseau
          $stmt = $connexion->prepare("SELECT nomReseau FROM reseaux WHERE idReseau = :idReseau");
          $stmt->bindParam(':idReseau', $idReseau, PDO::PARAM_INT);
          $stmt->execute();
          $reseau = $stmt->fetch(PDO::FETCH_ASSOC);
          if($reseau) {
            $idReseau = $reseau['nomReseau'];
          }else{
            $idReseau = "Aucun réseau assigné";
          }
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['idMateriel']) . "</td>";
            echo "<td>" . htmlspecialchars($item['nomMateriel']) . "</td>";
            echo "<td>" . htmlspecialchars($item['TypeMachine']) . "</td>";
            echo "<td>" . $idReseau . "</td>";
            echo "<td>" . inet_ntop($item['adresseIPV4']) . "</td>";//Affichage sous forme d'ip
            echo "<td>" . inet_ntop($item['sousMasque']) . "</td>";//Affichage sous forme d'ip
    ?>
   <td class="action">
            <!-- Bouton ouvrir modale modifier -->
            <button class="boutonModalModifier" data-toggle="modal" data-target="#modal-modifier-<?= $id ?>">Modifier</button>

            <!-- Bouton ouvrir modale supprimer -->
            <button class="boutonModalSupprimer" data-toggle="modal" data-target="#modal-supprimer-<?= $id ?>">Supprimer</button>

            <!-- Inclusion modales dynamiques -->
            <?php include './HTML/inventaires/telephones/modalsTelephones/modalModifier.php'; ?>
            <?php include './HTML/inventaires/telephones/modalsTelephones/modalSupprimer.php'; ?>
          </td>
    <?php
            echo "</tr>";
        }
    ?>
  </tbody>
</table>
</table>
  <br>
  <center>
    <button class="boutonModalAjouter" data-toggle="modal" data-target="#modal-ajouter">
      Ajouter un téléphone
    </button>
  </center>
  <?php include './HTML/inventaires/telephones/modalsTelephones/modalAjouter.php'; ?>
  <br>
</body>