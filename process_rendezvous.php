<?php

$connexion = mysqli_connect('localhost:8889', 'root', 'root', 'ProjetWebInscription');

if (!$connexion) {
    die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
}

// Récupérer les données du formulaire
$date = $_POST['date'];
$plage_horaire = $_POST['plage_horaire'];
$id_specialiste = $_POST['id_specialiste'];

session_start();

// Vérifiez si l'utilisateur est connecté et que l'ID de l'utilisateur est valide
if (isset($_SESSION['utilisateur']['id']) && is_numeric($_SESSION['utilisateur']['id'])) {
    $id_utilisateur = $_SESSION['utilisateur']['id'];

    // Calcule de l'heure de début et l'heure de fin en fonction de la plage horaire sélectionnée
    if ($plage_horaire == '10-12') {
        $heure_debut = '10:00';
        $heure_fin = '12:00';
    } elseif ($plage_horaire == '18-20') {
        $heure_debut = '18:00';
        $heure_fin = '20:00';
    }


    // Insérez le rendez-vous dans la base de données en associant l'ID de l'utilisateur et la date
$query = "INSERT INTO rendezvous (id_utilisateur, id_specialiste, heure_debut, heure_fin, date_rendezvous) VALUES ('$id_utilisateur', '$id_specialiste', '$heure_debut', '$heure_fin', '$date')";
mysqli_query($connexion, $query) or die(mysqli_error($connexion));

// Redirige vers la page des rendez-vous après la prise de rendez-vous
header('Location: rendezvous.php');
} else {
    // L'utilisateur n'est pas connecté
    header('Location: profil.php');
}

// Fermer la connexion
mysqli_close($connexion);
?>
