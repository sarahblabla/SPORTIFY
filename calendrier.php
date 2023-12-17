<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendrier Semainier du Coach</title>

    <style>
        #calendar-title {
            font-size: 20px;
            width: 100%;
            text-align: center;
        }

        #calendar-container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            vertical-align: center;
        }

        .day {
            display: inline-block;
            width: 14.28%; /* 100% / 7 jours */
            box-sizing: border-box;
            padding: 10px;
            text-align: center;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .not-available {
            background-color: #ccc;
        }

        .available {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer; /* Ajout de la propriété cursor pour indiquer que le bouton est cliquable */
        }

        .time-slot {
            font-size: 12px;
            margin-top: 5px;
        }

        #reservation-form {
            display: none; /* Caché par défaut */
        }

        .reservation-input {
            margin-bottom: 10px;
        }
    </style>
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
    $idCoach = 1;
    $idclient = 1;
    $salle = Salle_de_muscu;

    $adresse =Allée_de_la_muscu;


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

<div id="reservation-form">
    <h2>Réserver un créneau</h2>
    <form action="" method="post">
        <button type="submit" name="reservation">Réserver</button>
    </form>
</div>

<script>
    $insert_query = "INSERT INTO rendezvous (idclient, idcoach, date, heure_debut, adresse, salle) VALUES ('$idclient', '$idcoach', '$date','$heure', '$adresse', '$salle')";

</script>

</body>
</html>
