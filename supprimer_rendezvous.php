<?php

$connexion = mysqli_connect('localhost:8889', 'root', 'root', 'ProjetWebInscription');

if (!$connexion) {
    die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
}

// Vérifier si l'ID du rendez-vous est présent dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_rendezvous = $_GET['id'];

    // Supprime le rendez-vous de la base de données
    $query_supprimer = "DELETE FROM rendezvous WHERE id = $id_rendezvous";
    mysqli_query($connexion, $query_supprimer) or die(mysqli_error($connexion));

    // Redirige vers la page des rendez-vous après la suppression
    header('Location: rendezvous.php');
} else {
    // Si l'ID du rendez-vous n'est pas valide, rediriger vers accueil
    header('Location: accueil.html');
}

// Fermer la connexion
mysqli_close($connexion);
?>
