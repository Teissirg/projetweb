<?php
$db_host = "localhost:8889";
$db_username = "root";
$db_password = "root";
$db_name = "ProjetWebInscription";

// Créer une connexion à la base de données
$db = new mysqli($db_host, $db_username, $db_password, $db_name);

// Vérifier la connexion
if ($db->connect_error) {
    die("Erreur de connexion à la base de données : " . $db->connect_error);
}
?>
