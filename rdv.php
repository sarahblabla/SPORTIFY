<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="rdv.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sportify</title>



    <title>Sportify</title>

    <div id="logo">
        <h1>
            <img src="sportify.png" width="200" height="100">
        </h1>

    </div>
    <div class="banner">
        <span>Bienvenue sur Votre Site !</span>
        <div class="login-form">
            <a href="#login">Se connecter</a>
            <a href="#signup">S'inscrire</a>
        </div>
    </div>

    <div id="header">
        <h1>

            Sportify: Rendez vous

        </h1>
        <img src="snow.webp" width="200" height="100">


    </div>



    <div id="nav">
        <a href="acceuil.html" class="nav-button">Acceuil</a>
        <a href="tout_parcourir.html" class="nav-button">Tout Parcourir</a>
        <a href="rechercher.html" class="nav-button">Rechercher</a>
        <a href="rdv.html" class="nav-button">Rendez-Vous</a>
        <a href="votre_compte.html" class="nav-button">Votre Compte</a>
    </div>
</head>

<body>
<?php
    // Connexion à la base de données
    $serveur = "localhost";
    $nomUtilisateur = "root";
    $mdp = "";
    $nomBaseDeDonnees = "sportify";

    $connexion = new mysqli($serveur, $nomUtilisateur, $mdp, $nomBaseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// ID du coach (à changer selon le coach souhaité)


// Requête SQL pour récupérer les disponibilités du coach
$requete = "SELECT , heure_debut, heure_fin FROM disponibilite WHERE idcoach = $idCoach";

// Exécution de la requête
$resultat = $connexion->query($requete);
?>


</body>
</html>