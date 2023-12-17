<?php
session_start();

// Définir les informations de connexion à la base de données
$db_username = "root";
$db_password = "root";
$db_name = "ProjetWebInscription";
$db_host = "localhost:8889";

// Se connecter à la base de données
$db = new mysqli($db_host, $db_username, $db_password, $db_name);

// Vérifier la connexion
if ($db->connect_error) {
    die("Erreur de connexion à la base de données : " . $db->connect_error);
}

// Récupérer les données de l'utilisateur
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$numero_etudiant = $_POST['numero_etudiant'];

// Crypter le mot de passe
$password = password_hash($password, PASSWORD_DEFAULT);

// Insérer les données de l'utilisateur dans la base de données
$sql = "INSERT INTO DonneeUtilisateur (nom, prenom, numero_etudiant, email, username, password) VALUES ('$nom', '$prenom','$numero_etudiant', '$email', '$username', '$password')";
$result = $db->query($sql);

// Si l'insertion est réussie, afficher un message de confirmation
if ($result) {
    header("Location: PageInscriptionReussie.html");
} else {
    echo "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
}

// Fermer la connexion à la base de données
$db->close();
?>

