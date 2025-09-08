<?php
    include_once './Config/connexion.php';
    $connexion = connexion();
    include_once './Config/SQL/appelReseaux.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/modal.css">
    <script src="./SCRIPTS/modal.js" defer></script>
</head>
<body>
<!-- Formulaire avec modale -->
<form action="./Config/CRUD-Materiel/updateMateriel.php" method="post">
    <div class="modal" id="modal-modifier-<?=$id?>" role="dialog">
        <div class="modal-content">
            
            <div class="modal-close" data-dismiss="dialog">
                X
            </div>

            <div class="modal-header">
                <p>Modifier <?=$item['nomMateriel']?></p>
            </div>

            <div class="modal-body">
                <div class="champModifs">
                    <input type="hidden" name="idMateriel" value="<?= $id ?>">
                    <label for="nomMachine">Nom :</label>
                    <input type="text" name="nomMachine" id="nomMachine" placeholder=<?= htmlspecialchars($item['nomMateriel'])?> value="<?php echo $item['nomMateriel'] ?>" required>
                </div>

                <div class="champModifs">
                    <label for="typeMachine">Type de machine</label>
                    <select name="typeMachine" id="typeMachine" required>
                        <option value="<?php echo $item['idTypeMateriel'] ?>" selected><?php echo $item['TypeMachine'] ?></option>
                        <?php foreach ($inventaire as $unItem): ?>
                            <option value="<?= htmlspecialchars($unItem['idTypeMateriel']) ?>">
                                <?= htmlspecialchars($unItem['TypeMachine']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="champModifs">
                    <label for="reseauMachine">Réseau associé :</label>
                    <select name="reseauMachine" id="reseauMachine" required>
                        <option value="null">Aucun</option>
                        <?php foreach ($reseaux as $reseau): ?>
                            <option value="<?= $reseau['idReseau'] ?>">
                                <?= htmlspecialchars($reseau['nomReseau']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="champModifs">
                    <label for="ipv4">Adresse (IPV4)</label>
                    <input type="text" name="adresseIPV4" id="adresseIPV4" placeholder="xxx.xxx.xxx.xxx" value="<?php echo inet_ntop($item['adresseIPV4']) ?>" required>
                </div>
                
                <div class="champModifs">
                    <label for="ipv4">Sous-masque</label>
                    <input type="text" name="sousMasque" id="sousMasque" placeholder="xxx.xxx.xxx.xxx"
                        value="<?php echo inet_ntop($item['sousMasque']) ?>" required>
                </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-close" role="button" data-dismiss="dialog">Fermer</a>
                <button class="btn" type="submit">Modifier</button>
            </div>
        </div>
    </div>
</form>

</body>
</html>
