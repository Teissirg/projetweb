<?php
session_start();

// Vérifier si l'utilisateur est connecté et est un administrateur
if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['id'] == 1) {
    // Inclure le fichier de connexion à la base de données
    include 'db_connection.php';

    // Récupérer la liste des utilisateurs depuis la base de données
    $query = "SELECT id, nom, prenom FROM DonneeUtilisateur";
    $result = $db->query($query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des Utilisateurs</title>
    </head>
    <body>
        <h1>Liste des Utilisateurs</h1>
        <ul>
            <?php
            while ($user = $result->fetch_assoc()) {
                echo "<li>{$user['nom']} {$user['prenom']} - <a href=\"ban_user.php?user_id={$user['id']}\">Bannir</a></li>";
            }
            ?>
        </ul>
    </body>
    </html>
    <?php
    // Libérer le résultat de la requête et fermer la connexion à la base de données
    $result->close();
    $db->close();
} else {
    // Si l'utilisateur n'est pas un administrateur, rediriger vers la page de connexion
    header('Location: PageConnexion.html');
    exit();
}
?>
