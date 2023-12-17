<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['utilisateur'])) {
    $utilisateur = $_SESSION['utilisateur'];
} else {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header('Location: PageConnexion.html');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="CSSACCUEIL.css" rel="stylesheet">
    <style type="text/css">
        
        .rectangle1 {
    width: 500px;
    height: 450px;
    background-color: #ffffff;
    border: 2px solid #000000;
    margin-top: 30px;
    padding: 10px;
    box-sizing: border-box; /* Garantit que la taille inclut la bordure et le rembourrage */
    font-family: 'Helvetica', sans-serif;
    margin-left: auto; /* Centre le rectangle horizontalement */
    margin-right: auto; /* Centre le rectangle horizontalement */
}

.rectangle1 p {
    margin: 0; /* Supprime la marge par défaut du paragraphe à l'intérieur du rectangle */
}
    </style>
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
</div class="content">

<!-- RAJOUTER LE CODE ICI NE PAS TOUCHER AUX AUTRES PARTIES -->


<div class="rectangle1" style="margin-bottom: 20px;">


<div style="text-align: center"><h1>Bienvenue, <?php echo $utilisateur['username']; ?>  !</h1></div>


<div style="position: center;">
<img src="photoprofil.png" height="100" width="100" alt="ProfilImg">

<dl>
<dt>Vos informations :</dt>

    <dd>Nom d'utilisateur : <?php echo $utilisateur['username']; ?></dd>
    <dd>Nom : <?php echo $utilisateur['nom']; ?></dd>
    <dd>Prénom : <?php echo $utilisateur['prenom']; ?></dd>
    <dd>Numéro étudiant : <?php echo $utilisateur['numero_etudiant']; ?></dd>
    <dd>Email : <?php echo $utilisateur['email']; ?></dd>
    <!-- Ajoutez ici d'autres éléments à afficher -->
    <dd><a href="deconnexion.php"> <input type="button" class="boutoninscription" value='DECONNEXION' align="center"></a></dd>
    <dd><?php
    // Vérifier si l'utilisateur est un administrateur (en fonction de l'ID)
    if ($utilisateur['id'] == 1) {
?>
<!-- Afficher le bouton uniquement si l'utilisateur est un administrateur -->
<a href="admin.php"><input type="button" class="boutoninscription" value="ADMINISTRATION" align="center"></a>
<?php
    }
?></dd>
</dl>

</div>








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
