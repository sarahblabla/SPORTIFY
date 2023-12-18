<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cv.css" rel="stylesheet" type="text/css" />
    <title>CV du Coach</title>


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
// Connexion à la base de données (à adapter en fonction de votre configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sportify";



// Créez une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérez l'ID du coach depuis la page précédente (assurez-vous de sécuriser vos entrées contre les attaques par injection SQL)
$idCoach = $_GET['idCoach'];

// Requête SQL pour récupérer les informations du coach
$sql = "SELECT * FROM coach WHERE idcoach = $idCoach";
$result = $conn->query($sql);

// Vérifiez si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
// Récupérez les données du coach
$row = $result->fetch_assoc();
$nom = $row['nom'];
$prenom = $row['prenom'];
$CV = $row['CV'];

// Affichez les informations du coach
echo "<h1>CV de $prenom $nom</h1>";

// Vérifiez si le fichier CV est une image JPG
    if (pathinfo($CV, PATHINFO_EXTENSION) === 'jpg') {
        // Spécifiez la largeur et la hauteur souhaitées
        $largeur = 700; // Remplacez par la largeur souhaitée en pixels
        $hauteur = 1000; // Remplacez par la hauteur souhaitée en pixels

        // Affichez l'image avec les attributs de largeur et hauteur
        echo "<img src='$CV' alt='CV de $prenom $nom' width='$largeur' height='$hauteur',text-align='center'>";
    } else {
        // Si ce n'est pas un fichier JPG, affichez le lien vers le fichier
        echo "<a href='$CV'>Télécharger le CV</a>";
    }

} else {
echo "Aucun coach trouvé avec cet ID.";
}

// Fermez la connexion à la base de données
$conn->close();
?>

</body>
</html>
