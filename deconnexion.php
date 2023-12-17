<?php
session_start();

// Détruire la session
session_unset();
session_destroy();

// Supprimer le cookie persistant
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, '/');
}

// Rediriger l'utilisateur vers la page de connexion
header('Location: PageConnexion.html');
exit();
?>
