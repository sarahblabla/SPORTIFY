<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<meta charset="utf-8">';

$database = "sportify";
$db_handle = mysqli_connect('localhost', 'root', 'root', $database);

// Vérifier la connexion
if (!$db_handle) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = mysqli_real_escape_string($db_handle, $_POST["search"]);

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM coach WHERE salle LIKE ? OR nom LIKE ? OR prenom LIKE ? OR fonction LIKE ? OR specialite LIKE ?";
    $stmt = mysqli_prepare($db_handle, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $searchQuery, $searchQuery, $searchQuery, $searchQuery, $searchQuery);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

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


