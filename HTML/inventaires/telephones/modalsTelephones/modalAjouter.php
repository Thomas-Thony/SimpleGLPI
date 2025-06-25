<?php
include_once './Config/connexion.php';
$connexion = connexion();
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
<form action="./Config/CRUD-Materiel/addMateriel.php" method="post">
    <div class="modal" id="modal-ajouter" role="dialog">
        <div class="modal-content">
            
            <div class="modal-close" data-dismiss="dialog">
                X
            </div>

            <div class="modal-header">
                <p>Ajouter un téléphone</p>
            </div>

            <div class="modal-body">
                <div class="champModifs">
                    <label for="nomMachine">Nom :</label>
                    <input type="text" name="nomMachine" id="nomMachine" placeholder="Nom de la machine" required>
                </div>

                <div class="champModifs">
                    <label for="typeMachine">Type de machine</label>
                    <select name="typeMachine" id="typeMachine" required>
                        <option value="" disabled selected>Choisir le type de la machine</option>
                        <?php foreach ($typesOrdinateurs as $type): ?>
                            <option value="<?= htmlspecialchars($type['idTypeMateriel']) ?>">
                                <?= htmlspecialchars($type['TypeMachine']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-close" role="button" data-dismiss="dialog">Fermer</a>
                <form action="ajouterMateriel.php" method="post">
                    <button class="btn" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</form>
</body>
</html>
