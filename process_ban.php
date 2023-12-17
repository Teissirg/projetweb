<?php
session_start();

// Vérifier si l'utilisateur est connecté et est un administrateur
if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['id'] == 1) {
    // Vérifier si des données de formulaire ont été soumises
    if (isset($_POST['user_id'])) {
        // Inclure le fichier de connexion à la base de données
        include 'db_connection.php';

        // Récupérer l'ID de l'utilisateur à bannir depuis le formulaire
        $user_id = $_POST['user_id'];

        // Préparer et exécuter la requête de suppression
        $query = "DELETE FROM DonneeUtilisateur WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Fermer la requête et la connexion à la base de données
        $stmt->close();
        $db->close();

        // Rediriger l'utilisateur après la suppression
        header('Location: admin.php');
        exit();
    } else {
        // Si l'ID de l'utilisateur n'est pas fourni, rediriger vers la page appropriée
        header('Location: page_d_erreur.php');
        exit();
    }
} else {
    // Si l'utilisateur n'est pas un administrateur, rediriger vers la page de connexion
    header('Location: PageConnexion.html');
    exit();
}
?>
