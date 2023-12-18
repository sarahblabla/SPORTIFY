
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
    // Récupérer les paramètres d'URL
    $idCoach = isset($_GET['idCoach']) ? $_GET['idCoach'] : null;
    $idclient = isset($_GET['idclient']) ? $_GET['idclient'] : null;
    $salle = isset($_GET['salle']) ? $_GET['salle'] : null;
    $adresse = isset($_GET['adresse']) ? $_GET['adresse'] : null;

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
                echo $plageDisponible ? "available' onclick='showReservationForm(\"$jour\", \"$heure\", this)'" : "not-available";
                echo "'>";
                echo $heure . ":00 - " . ($heure + 1) . ":00";
                echo "</div>";


            }
            echo "</div>";
        }
    } else {
        echo "Aucune disponibilité trouvée pour ce coach.";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $jour = $_POST["jour"];
        $heure = $_POST["heure"];

        // Ajouter le rendez-vous dans la table rendezvous
        $ajoutRendezVous = "INSERT INTO rendezvous (idclient, idcoach, date, heure_debut) VALUES ('$idclient', '$idCoach', CURDATE(), '$heure')";
        if ($connexion->query($ajoutRendezVous) === TRUE) {
            echo "Rendez-vous ajouté avec succès !";

            // Supprimer la disponibilité réservée
            $supprimerDisponibilite = "DELETE FROM disponibilite WHERE idcoach = '$idCoach' AND jour = '$jour' AND heure_debut = '$heure'";
            if ($connexion->query($supprimerDisponibilite) === TRUE) {
                echo "Disponibilité mise à jour avec succès !";
            } else {
                echo "Erreur lors de la mise à jour de la disponibilité : " . $connexion->error;
            }
        } else {
            echo "Erreur lors de l'ajout du rendez-vous : " . $connexion->error;
        }

    }
  // Fermer la connexion à la base de données
    $connexion->close();
    ?>
</div>

<!-- Ajouter le formulaire pour ajouter un rendez-vous -->
<div id="reservation-form" style="display: none;">
    <form method="post">
        <label for="jour">Jour :</label>
        <input type="text" name="jour" id="jour" readonly>
        <label for="heure">Heure :</label>
        <input type="text" name="heure" id="heure" readonly>
        <input type="submit" value="Réserver">
    </form>
</div>

<script>
    function showReservationForm(jour, heure, element) {
        // Remplir les champs du formulaire avec les données du créneau sélectionné
        document.getElementById('jour').value = jour;
        document.getElementById('heure').value = heure;

        // Changer la couleur du créneau
        var selectedTimeSlot = document.querySelector('.selected-time-slot');
        if (selectedTimeSlot) {
            selectedTimeSlot.classList.remove('selected-time-slot');
        }

        // Ajouter la classe au créneau sélectionné
        element.classList.add('selected-time-slot');

        // Afficher le formulaire
        document.getElementById('reservation-form').style.display = 'block';
    }


</script>

</body>
</html>