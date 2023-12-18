<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV du Coach</title>
    <!-- Ajoutez ici vos liens vers les feuilles de style CSS, le cas échéant -->
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
$id_coach = $_GET['id_coach'];

// Requête SQL pour récupérer les informations du coach
$sql = "SELECT * FROM coach WHERE idcoach = $id_coach";
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
    if (pathinfo($CV, PATHINFO_EXTENSION) === 'jpg') {
        // Affichez l'image
        echo "<img src='$CV' alt='CV de $prenom $nom'>";
    } else {
        // Si ce n'est pas un fichier JPG, affichez le lien vers le fichier
        echo "<a href='$CV'>Télécharger le CV</a>";
    }


// Vous pouvez ajouter d'autres informations ici en fonction de votre base de données
} else {
echo "Aucun coach trouvé avec cet ID.";
}

// Fermez la connexion à la base de données
$conn->close();
?>

</body>
</html>
