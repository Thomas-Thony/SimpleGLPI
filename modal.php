<?php
include_once './Config/connexion.php';
$connexion = connexion();
$stmt = $connexion->prepare("SELECT * FROM typemateriel");
$stmt->execute();
$inventaire = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

<!-- Bouton d'ouverture de modale -->
<a class="boutonModal" href="#" role="button" data-target="#modal" data-toggle="modal">
    Modifier
</a>

<!-- Formulaire avec modale -->
<form action="" method="post">
    <div class="modal" id="modal" role="dialog">
        <div class="modal-content">
            
            <div class="modal-close" data-dismiss="dialog">
                X
            </div>

            <div class="modal-header">
                <p>Modifier le matériel</p>
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
                        <?php foreach ($inventaire as $unItem): ?>
                            <option value="<?= htmlspecialchars($unItem['IdType']) ?>">
                                <?= htmlspecialchars($unItem['TypeMachine']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-close" role="button" data-dismiss="dialog">Fermer</a>
                <button class="btn" type="submit">Valider</button>
            </div>

        </div>
    </div>
</form>

</body>
</html>
