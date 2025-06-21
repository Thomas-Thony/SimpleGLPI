<h1>Vos routeurs</h1><?php

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
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($inventaire as $item):
          $id = $item['idMateriel'];
          $nom = $item['nomMateriel'];
          $type = $item['TypeMachine'];
      ?>
        <tr>
          <td><?= htmlspecialchars($id) ?></td>
          <td><?= htmlspecialchars($nom) ?></td>
          <td><?= htmlspecialchars($type) ?></td>
          <td class="action">
            <!-- Bouton ouvrir modale modifier -->
            <button class="boutonModal" data-toggle="modal" data-target="#modal-modifier-<?= $id ?>">Modifier</button>

            <!-- Bouton ouvrir modale supprimer -->
            <button class="boutonModal" data-toggle="modal" data-target="#modal-supprimer-<?= $id ?>">Supprimer</button>

            <!-- Inclusion modales dynamiques -->
            <?php include './modalModifier.php'; ?>
            <?php include './modalSupprimer.php'; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <center>
    <button class="boutonModal" data-toggle="modal" data-target="#modal-ajouter">
      Ajouter un routeur
    </button>
  </center>
  <?php include './modalAjouter.php'; ?>
</body>