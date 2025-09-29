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
        <div>
            <table class="tableauInventaireReseaux ">
                <thead>
                    <tr>
                        <th scope="col">Identifiant du réseau</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Nombre d'appareils</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="index.php?action=tableauReseau" method="post">
                            <input type="text" name="idReseau" value="<?php echo $reseau['idReseau'] ?>" hidden>
                            <th><?php echo $reseau['idReseau'] ?></th>
                            <th><?php echo $reseau['nomReseau'] ?></th>
                            <th>
                                <button type="submit">
                                    <?php echo $reseau['totalMateriel']?>appareil(s)
                                </button> 
                            </th>
                        </form>
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