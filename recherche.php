<?php
echo '<meta charset="utf-8">';

// Identifier votre BDD
$database = "sportify";
// Identifier votre serveur (localhost), utilisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la valeur du champ de recherche
    $searchQuery = $_POST["search"];
}

$sql_select_salle = "SELECT * FROM coach WHERE salle LIKE '%$searchQuery%'";
$salle_sport = mysqli_query($db_handle, $sql_select_salle);
$sql_select_nom = "SELECT * FROM coach WHERE nom LIKE '%$searchQuery%'";
$nom= mysqli_query($db_handle, $sql_select_nom);
$sql_select_prenom = "SELECT * FROM coach WHERE prenom LIKE '%$searchQuery%'";
$prenomx= mysqli_query($db_handle, $sql_select_prenom);
$sql_select_fonction = "SELECT * FROM coach WHERE fonction LIKE '%$searchQuery%'";
$function= mysqli_query($db_handle, $sql_select_fonction);
$sql_select_specialite = "SELECT * FROM coach WHERE specialite LIKE '%$searchQuery%'";
$specialitex= mysqli_query($db_handle, $sql_select_specialite);




if ($salle_sport) {
    echo "<h2>Les coachs par salles de sport</h2>";

    while ($record = mysqli_fetch_assoc($salle_sport)) {
        echo "Salledesport : " . $record['id'] . "<br>";
        echo "Spécialité : " . $record['specialite'] . "<br>";
        echo "Prénom : " . $record['prenom'] . "<br>";
        echo "Nom : " . $record['nom'] . "<br>";
        echo "Tel : " . $record['telephone'] . "<br>";
        echo "Photo : <img src='" . $record['Photo'] . "' alt='Photo du coach'><br>";
        echo "<hr>";
    }
if ($nom) {
    echo "<h2>Les coachs ayant ce nom</h2>";

    while ($record = mysqli_fetch_assoc($nom)) {
        echo "Salledesport : " . $record['id'] . "<br>";
        echo "Spécialité : " . $record['specialite'] . "<br>";
        echo "Prénom : " . $record['prenom'] . "<br>";
        echo "Nom : " . $record['nom'] . "<br>";
        echo "Tel : " . $record['telephone'] . "<br>";
        echo "Photo : <img src='" . $record['Photo'] . "' alt='Photo du coach'><br>";
        echo "<hr>";
    }
if ($prenomx) {
    echo "<h2>Les coachs ayant ce prenom</h2>";

    while ($record = mysqli_fetch_assoc($prenomx)) {
        echo "Salledesport : " . $record['id'] . "<br>";
        echo "Spécialité : " . $record['specialite'] . "<br>";
        echo "Prénom : " . $record['prenom'] . "<br>";
        echo "Nom : " . $record['nom'] . "<br>";
        echo "Tel : " . $record['telephone'] . "<br>";
        echo "Photo : <img src='" . $record['Photo'] . "' alt='Photo du coach'><br>";
        echo "<hr>";
    }
if ($function) {
    echo "<h2>Tous les enregistrements de la table par ordre croissant de la date d'adhésion :</h2>";

    while ($record = mysqli_fetch_assoc($function)) {
        echo "Salledesport : " . $record['id'] . "<br>";
        echo "Spécialité : " . $record['specialite'] . "<br>";
        echo "Prénom : " . $record['prenom'] . "<br>";
        echo "Nom : " . $record['nom'] . "<br>";
        echo "Tel : " . $record['telephone'] . "<br>";
        echo "Photo : <img src='" . $record['Photo'] . "' alt='Photo du coach'><br>";
        echo "<hr>";
    }
if ($specialitex) {
    echo "<h2>Tous les enregistrements de la table par ordre croissant de la date d'adhésion :</h2>";

    while ($record = mysqli_fetch_assoc($specialitex)) {
        echo "Salledesport : " . $record['id'] . "<br>";
        echo "Spécialité : " . $record['specialite'] . "<br>";
        echo "Prénom : " . $record['prenom'] . "<br>";
        echo "Nom : " . $record['nom'] . "<br>";
        echo "Tel : " . $record['telephone'] . "<br>";
        echo "Photo : <img src='" . $record['Photo'] . "' alt='Photo du coach'><br>";
        echo "<hr>";
    }
} else {
    echo "Erreur lors de la récupération de tous les enregistrements par ordre croissant de la date d'adhésion : " . mysqli_error($db_handle) . "<br><br>";
}

// Fermer la connexion
mysqli_close($db_handle);
?>

