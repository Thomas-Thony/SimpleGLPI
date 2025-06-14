<h1>Vos téléphones</h1>
<?php

include_once './Config/connexion.php';
$connexion = connexion();

$stmt = $connexion->prepare("SELECT * FROM inventaire INNER JOIN typemateriel ON inventaire.idTypeMateriel = typemateriel.IdType WHERE inventaire.idTypeMateriel = 4;");
$stmt->execute();
$inventaire = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['idMateriel']) . "</td>";
            echo "<td>" . htmlspecialchars($item['nomMateriel']) . "</td>";
            echo "<td>" . htmlspecialchars($item['TypeMachine']) . "</td>";
    ?>
    <td>
        <?= include_once './modalModifier.php'; ?>
        <?= include_once './modalSupprimer.php'; ?>
        <button type="button" class="btn btn-supprimer" data-id="<?= $item['idMateriel'] ?>"data-action="delete">
            Supprimer
        </button>
    </td>
    <?php
            echo "</tr>";
        }
    ?>
  </tbody>
</table>
</body>