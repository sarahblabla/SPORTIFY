<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations Utilisateur</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <h1>Informations Utilisateur</h1>
    <div id="infos-utilisateur">
        <?php
            // Connexion à la base de données
            $serveur = "localhost"; 
            $utilisateur = "root"; 
            $motDePasse = ""; 
            $baseDeDonnees = "sportify"; 

            // Connexion
            $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

            // Vérification de la connexion
            if ($connexion->connect_error) {
                die("La connexion a échoué : " . $connexion->connect_error);
            }

            // Récupération des informations de l'utilisateur depuis la base de données
            $id_utilisateur = $_GET['id']; 

            // Requête SQL pour récupérer les informations de l'utilisateur avec son ID
            $sql = "SELECT * FROM utilisateurs WHERE id = $id_utilisateur";
            $resultat = $connexion->query($sql);

            if ($resultat->num_rows > 0) {
                // Affichage des informations de l'utilisateur
                while ($row = $resultat->fetch_assoc()) {
                    echo "nom : " . $row["nom"] . "<br>";
                    echo "prenom : " . $row["prenom"] . "<br>";
                    echo "adresse : " . $row["adresse"] . "<br>";
                    echo "telephone : " . $row["telephone"] . "<br>";
                    echo "courriel : " . $row["courriel"] . "<br>";
                    echo "carte_etudiante : " . $row["carte_etudiante"] . "<br>";
                    echo "info_de_paiement : " . $row["info_de_paiement"] . "<br>";
                }
            } else {
                echo "Aucun utilisateur trouvé avec cet ID.";
            }

            // Fermeture de la connexion
            $connexion->close();
            ?>

    </div>
</body>
</html>