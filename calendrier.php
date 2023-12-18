
<?php
// Récupérer les paramètres d'URL
$idCoach = isset($_GET['idCoach']) ? $_GET['idCoach'] : null;
$idclient = isset($_GET['idclient']) ? $_GET['idclient'] : null;
$salle = isset($_GET['salle']) ? $_GET['salle'] : null;
$adresse = isset($_GET['adresse']) ? $_GET['adresse'] : null;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendrier Semainier du Coach</title>
    <link rel="stylesheet" href="calendrier.css">

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

<div id="calendar-title">Calendrier Semainier du Coach</div>

<div id="calendar-container">
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
    $requete = "SELECT jour, heure_debut, heure_fin FROM disponibilite WHERE idcoach = $idCoach";

    // Exécution de la requête
    $resultat = $connexion->query($requete);

    if ($resultat->num_rows > 0) {
        // Tableau pour stocker les disponibilités
        $disponibilites = array();

        while ($row = $resultat->fetch_assoc()) {
            $jour = $row["jour"];
            $heureDebut = $row["heure_debut"];
            $heureFin = $row["heure_fin"];

            // Ajouter les disponibilités au tableau
            $disponibilites[$jour][] = array("heure_debut" => $heureDebut, "heure_fin" => $heureFin);
        }

        // Afficher le calendrier
        $joursSemaine = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
        foreach ($joursSemaine as $jour) {
            echo "<div class='day'>$jour";
            for ($heure = 8; $heure <= 20; $heure++) {
                $plageDisponible = false;

                // Vérifier si le créneau est dans la liste des disponibilités
                if (isset($disponibilites[$jour])) {
                    foreach ($disponibilites[$jour] as $plage) {
                        $plageHeureDebut = (int)substr($plage["heure_debut"], 0, 2);
                        $plageHeureFin = (int)substr($plage["heure_fin"], 0, 2);

                        if ($heure >= $plageHeureDebut && $heure < $plageHeureFin) {
                            $plageDisponible = true;
                            break;
                        }
                    }
                }

                echo "<div class='time-slot ";
                // Ajouter la classe en fonction de la disponibilité
                echo $plageDisponible ? "available' onclick='showReservationForm()'" : "not-available";
                echo "'>";
                echo $heure . ":00 - " . ($heure + 1) . ":00";
                echo "</div>";
            }
            echo "</div>";
        }
    } else {
        echo "Aucune disponibilité trouvée pour ce coach.";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
    ?>
</div>

</body>
</html>

