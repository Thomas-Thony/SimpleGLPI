<h1>Vos téléphones</h1>
<?php
include_once './Config/SQL/appelTelephones.php';
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
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($inventaire as $item) {
          $id = $item['idMateriel'];
          $nom = $item['nomMateriel'];
          $type = $item['TypeMachine'];
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['idMateriel']) . "</td>";
            echo "<td>" . htmlspecialchars($item['nomMateriel']) . "</td>";
            echo "<td>" . htmlspecialchars($item['TypeMachine']) . "</td>";
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