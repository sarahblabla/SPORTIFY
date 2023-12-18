<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cv.css" rel="stylesheet" type="text/css" />
    <title>CV du Coach</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sportify";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$idCoach = $_GET['idCoach'];

$sql = "SELECT * FROM coach WHERE idcoach = $idCoach";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $CV = $row['CV'];
    $adresseEmail = $row['courriel'];
    $adresse = $row['adresse'];
    $specialite = $row['specialite'];
    $telephone = $row['telephone'];


    // Ajoutez d'autres champs en fonction de votre base de données

    echo "<div id='container'>";
    echo "<div id='cv-container'>";
    echo "<h1>CV de $prenom $nom</h1>";

    if (pathinfo($CV, PATHINFO_EXTENSION) === 'jpg') {
        $largeur = 700;
        $hauteur = 1000;
        echo "<img src='$CV' alt='CV de $prenom $nom' width='$largeur' height='$hauteur'>";
    } else {
        echo "<a href='$CV'>Télécharger le CV</a>";
    }

    echo "</div id='info'>";

    echo "<div id='info-container'>";
    echo "<h2>Informations sur le coach</h2>";
    echo "<ul>";
    echo "<li><strong>Nom:</strong> $nom</li>";
    echo "<li><strong>Prénom:</strong> $prenom</li>";
    echo "<li><strong>Adresse Email:</strong> $adresseEmail</li>";
    echo "<li><strong>Adresse:</strong> $adresse</li>";
    echo "<li><strong>Numéro de téléphone:</strong> $telephone</li>";
    echo "<li><strong>Specialité:</strong> $specialite</li>";

    echo "</ul>";
    echo "</div>";

    echo "</div>";
} else {
    echo "Aucun coach trouvé avec cet ID.";
}

$conn->close();
?>

</body>
</html>
