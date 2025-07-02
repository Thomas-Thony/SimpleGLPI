<?php
include_once './Config/connexion.php';
$connexion = connexion();


$idMateriel = $_POST['idMateriel'] ?? null;

if ($idMateriel) {
    $stmt = $connexion->prepare("SELECT * FROM inventaire WHERE idMateriel = :id");
    $stmt->bindParam(':id', $idMateriel, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item) {
        die("Aucun matériel trouvé avec l'ID spécifié.");
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/modal.css">
    <script src="./SCRIPTS/modal.js" defer></script>
    <title>Document</title>
</head>
<body>
<!-- Formulaire avec modale -->
<form action="./Config/CRUD-Materiel/deleteMateriel.php" method="post">
<div class="modal" id="modal-supprimer-<?=$id?>" role="dialog">
    <div class="modal-content">

        <div class="modal-close" data-dismiss="dialog">X</div>

        <div class="modal-header">
            <p>Supprimer le switch</p>
        </div>

        <div class="modal-body">
            <p>Êtes-vous sûr de vouloir supprimer <?=$item['nomMateriel']?> ?</p>
        </div>

        <div class="modal-footer">
            <a href="#" class="btn btn-close" role="button" data-dismiss="dialog">Annuler</a>
            <form action="supprimerMateriel.php" method="post">
                <input type="hidden" name="idMateriel" value="<?= htmlspecialchars($item['idMateriel']) ?>">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </div>

    </div>
</div>
</form>

</body>
</html>
