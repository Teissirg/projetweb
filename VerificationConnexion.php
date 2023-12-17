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

// Fonction pour définir un cookie de connexion persistante
function setPersistentCookie($username, $password) {
    $cookieExpire = time() + (30 * 24 * 3600); // Expire dans 30 jours
    setcookie('remember_me', $username . '|' . $password, $cookieExpire, '/');
}

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    // Récupération des données de connexion
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Rechercher l'utilisateur dans la base de données
    $sql = "SELECT * FROM DonneeUtilisateur WHERE username = '$username'";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Vérifier le mot de passe
        if (password_verify($password, $row['password'])) {
            // L'utilisateur est connecté
            // Définir une variable de session pour stocker les informations de l'utilisateur
            $_SESSION['utilisateur'] = $row;

            // Vérifier si l'utilisateur veut rester connecté
            if (!empty($_POST['remember_me'])) {
                // Définir un cookie de connexion persistante
                setPersistentCookie($username, $row['password']);
            }

            // Rediriger l'utilisateur vers la page de profil
            header('Location: profil.php');
            exit();
        } else {
            // Mot de passe incorrect
            header('Location: PageConnexionRefuser.html');
        }
    } else {
        // Le compte n'existe pas
        header('Location: PageConnexionRefuser.html');
    }
} else {
    // Les informations de connexion ne sont pas renseignées
    echo '<p class="erreur">Veuillez renseigner les informations de connexion.</p>';
}

// Fermer la connexion à la base de données
$db->close();
?>
