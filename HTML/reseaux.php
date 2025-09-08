<?php
    include_once './Config/SQL/appelReseaux.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/reseaux.css">
</head>

<body>
    <?php if ($totalReseaux == 0): ?>
        <h1>Pas de réseaux</h1>
    <?php else: ?>
        <h1>Vos réseaux</h1>
        <?php
            foreach ($nombreMaterielParReseau as $reseau) {
        ?>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Identifiant du réseau</th>
                        <th>Nom</th>
                        <th>Nombre d'appareils</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><?php echo $reseau['idReseau'] ?></th>
                        <th><?php echo $reseau['nomReseau'] ?></th>
                        <th><a href="#"><?php echo $reseau['totalMateriel']?> appareil(s)</th>
                    </tr>
                </tbody>
            </table>
        </div>   
    <?php
        }
    endif;
    ?>
    <br>
</body>