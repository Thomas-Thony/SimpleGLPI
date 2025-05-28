<?php
function connexion(): PDO {
    $host = 'localhost';
    $db   = 'glpi_inside';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$db;";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    } catch (PDOException $e) {
        exit('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}
?>