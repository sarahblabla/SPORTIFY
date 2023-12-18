
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos Rendez vous</title>
    <link rel="stylesheet" href="rdv.css">

    <div id="logo">
        <h1>
            <img src="sportify.png" alt="Musculation" width="200" height="100">
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

            Sportify: Activité Sportive  </h1>

    </div>



    <div id="nav">
        <a href="acceuil.html" class="nav-button">Acceuil</a>
        <a href="tout_parcourir.html" class="nav-button">Tout Parcourir</a>
        <a href="rechercher.html" class="nav-button">Rechercher</a>
        <a href="rdv.php" class="nav-button">Rendez-Vous</a>
        <a href="votre_compte.html" class="nav-button">Votre Compte</a>
    </div>


</head>
<body>

<?php

// Récupérer les paramètres d'URL
$idCoach = isset($_GET['idCoach']) ? $_GET['idCoach'] : null;
$idClient = isset($_GET['idclient']) ? $_GET['idclient'] : 1; // Définissez l'ID du client selon vos besoins
$salle = isset($_GET['salle']) ? $_GET['salle'] : null;
$adresse = isset($_GET['adresse']) ? $_GET['adresse'] : null;

// ...

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
$idCoach = 1;

// Requête SQL pour récupérer les rendez-vous du client
$requeteRendezvous = "SELECT idrendezvous, idcoach, date, heure_debut FROM rendezvous WHERE idclient = $idClient";

// Exécution de la requête
$resultatRendezvous = $connexion->query($requeteRendezvous);

// Vérifier si la requête a réussi
if (!$resultatRendezvous) {
    die("Erreur dans la requête : " . $connexion->error);
}
// Afficher les rendez-vous du client dans un tableau HTML
echo "<div id='table-container'>";
echo "<table>";
echo "<tr><th>ID Rendez-vous</th><th>ID Coach</th><th>Date</th><th>Heure de début</th></tr>";

// Afficher les rendez-vous du client
while ($row = $resultatRendezvous->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['idrendezvous'] . "</td>";
    echo "<td>" . $row['idcoach'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['heure_debut'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";
?>
</body>
</html>