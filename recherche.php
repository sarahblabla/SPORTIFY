<?php
echo '<meta charset="utf-8">';

$database = "sportify";
$db_handle = mysqli_connect('localhost', 'root', 'root', $database);

// Vérifier la connexion
if (!$db_handle) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = mysqli_real_escape_string($db_handle, $_POST["search"]);

    // Effectuer une seule requête pour récupérer tous les résultats
    $sql = "SELECT * FROM coach WHERE salle LIKE '%$searchQuery%' OR nom LIKE '%$searchQuery%' OR prenom LIKE '%$searchQuery%' OR fonction LIKE '%$searchQuery%' OR specialite LIKE '%$searchQuery%'";
    $result = mysqli_query($db_handle, $sql);

    if ($result) {
        echo "<h2>Résultats de la recherche</h2>";

        while ($record = mysqli_fetch_assoc($result)) {
            echo "Salledesport : " . $record['id'] . "<br>";
            echo "Spécialité : " . $record['specialite'] . "<br>";
            echo "Prénom : " . $record['prenom'] . "<br>";
            echo "Nom : " . $record['nom'] . "<br>";
            echo "Tel : " . $record['telephone'] . "<br>";
            echo "Photo : <img src='" . $record['Photo'] . "' alt='Photo du coach'><br>";
            echo "<hr>";
        }
    } else {
        echo "Erreur lors de la recherche : " . mysqli_error($db_handle) . "<br><br>";
    }

    // Fermer la connexion
    mysqli_close($db_handle);
}
?>


