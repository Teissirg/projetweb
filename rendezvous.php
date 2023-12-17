
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="CSSACCUEIL2.css" rel="stylesheet">
</head>
<body>

<img class="logo" src="LOGO.png" alt="Logo">
<div class="menu">
<nav>
    <a href="accueil.html">Accueil</a>

    <!-- Bouton déroulant -->
    <div class="sousmenu">
        <button class="sousmenu-selection">Tout Parcourir</button>
        <div class="sousmenu-contenu">
            <div class="sousmenu-contenu1">
            <a href="#">Activités sportives</a>
            <div class="sous-sous-menu">
                <a href="pagemuscu.html">Musculation</a>
                <a href="pagefitness.html">Fitness</a>
                <a href="pagebiking.html">Biking</a>
                <a href="pagecardio.html">Cardio-Training</a>
                <a href="pagecollectif.html">Cours Collectifs</a>
            </div>
            </div>
            <div class="sousmenu-contenu2">
            <a href="#">Les sports de compétition</a>
            <div class="sous-sous-menu1">
                <a href="Basketpro.html">Basketball</a>
                <a href="Footpro.html">Football</a>
                <a href="Rugbypro.html">Rugby</a>
                <a href="Tennispro.html">Tennis</a>
                <a href="Natationpro.html">Natation</a>
                <a href="Plongeonpro.html">Plongeon</a>
            </div>
            </div>
            <a href="salledesport.html">Salle de sport Omnes</a>
        </div>
    </div>

    <a href="#">Recherche</a>
    <a href="Rendezvous.php">Rendez-vous</a>
    <a href="profil.php">Votre compte</a>
</nav>
</div>
<div class="content">
<!-- RAJOUTER LE CODE ICI NE PAS TOUCHER AUX AUTRES PARTIES -->

<div class="prisederendezvous-container">
    <h1>Prise de Rendez-vous</h1>

    <form action="process_rendezvous.php" method="post" name="rendezvous">
        <label>Date :</label>
        <input type="date" name="date" required>

        <label>Plage horaire :</label>
        <select name="plage_horaire" required>
            <option value="10-12">10h-12h</option>
            <option value="18-20">18h-20h</option>
        </select>

        <label>Spécialiste :</label>
        <select name="id_specialiste" required>
            <?php
       
            $connexion = mysqli_connect('localhost:8889', 'root', 'root', 'ProjetWebInscription');

            if (!$connexion) {
                die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
            }

            // Récupérer les spécialistes depuis la base de données
            $query = "SELECT * FROM specialiste";
            $result = mysqli_query($connexion, $query);

            // Afficher les options du sélecteur
            while ($specialiste = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $specialiste['id'] . '">';
                echo $specialiste['nom'] . ' ' . $specialiste['prenom'];
                echo '</option>';
            }

            // Fermer la connexion
            mysqli_close($connexion);
            ?>
        </select>

        <input type="submit" value="Prendre Rendez-vous">
    </form>
</div>
<div class="rendezvous-container" style="margin-bottom: 20px;">
    <h1>Rendez-vous pris</h1>
    <ul>
        <?php

$connexion = mysqli_connect('localhost:8889', 'root', 'root', 'ProjetWebInscription');

if (!$connexion) {
    die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
}

session_start();

if (isset($_SESSION['utilisateur']['id']) && is_numeric($_SESSION['utilisateur']['id'])) {
    $id_utilisateur = $_SESSION['utilisateur']['id'];

// Récupére les rendez-vous depuis la base de données avec les informations du spécialiste
$query_rendezvous = "
    SELECT r.*, s.nom, s.prenom
    FROM rendezvous r
    INNER JOIN specialiste s ON r.id_specialiste = s.id
    WHERE r.id_utilisateur = '$id_utilisateur'
";

$result_rendezvous = mysqli_query($connexion, $query_rendezvous);

// Afficher les rendez-vous
echo "<ul>";
while ($rendezvous = mysqli_fetch_assoc($result_rendezvous)) {
    echo '<li>';
    echo 'Coach : ' . $rendezvous['nom'] . ' ' . $rendezvous['prenom'];
    echo ', De ' . $rendezvous['heure_debut'] . ' à ' . $rendezvous['heure_fin'];
    
    // Formater la date selon le format français
    $date_formattee = date("d/m/Y", strtotime($rendezvous['date_rendezvous']));
    
    echo ', Date : ' . $date_formattee;
    echo ' <a href="supprimer_rendezvous.php?id=' . $rendezvous['id'] . '">Supprimer</a>';
    echo '</li>';
}
echo "</ul>";

} else {
    // L'utilisateur n'est pas connecté
    header('Location: profil.php');
}

// Fermer la connexion
mysqli_close($connexion);
?>
</div>

    </ul>
</div>
<footer>
    <p>
        Pour toute assistance ou question, n'hésitez pas à nous contacter :
        <br><br>
        Adresse e-mail : support@sportify.fr
        <br>
        Service clientèle : 01 23 45 67 89
        <br><br>
        Notre équipe est là pour vous aider du lundi au vendredi, de 9h à 18h.
        <br><br>
        Adresse postale :<br>
        Sportify Headquarters<br>
        123 Rue Sportive<br>
        75001 Ville Sportive<br>
        France<br><br>

        Suivez-nous sur les réseaux sociaux :
        <br>
        Facebook : @SportifyOfficiel<br>
        X : @SportifySupport<br>
        Instagram : @Sportify_Officiel<br>

    </p>
</footer>

</body>
</html>
