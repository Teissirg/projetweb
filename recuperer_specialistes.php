<?php

$connexion = mysqli_connect('localhost:8889', 'root', 'root', 'ProjetWebInscription');

if (!$connexion) {
    die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
}

// Récupérer les spécialistes depuis la base de données
$query = "SELECT * FROM specialiste";
$result = mysqli_query($connexion, $query);


$specialistes = array();

while ($row = mysqli_fetch_assoc($result)) {
    $specialistes[] = $row;
}


foreach ($specialistes as $specialiste) {
    echo 'ID: ' . $specialiste['id'] . '<br>';
    echo 'Nom: ' . $specialiste['nom'] . '<br>';
    echo 'Prénom: ' . $specialiste['prenom'] . '<br>';
    echo '---------------------<br>';
}


// Fermer la connexion
mysqli_close($connexion);
?>
