<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "sportify";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom_utilisateur = $conn->real_escape_string($_POST['nom_utilisateur']);
$nom = $conn->real_escape_string($_POST['nom']);
$prenom = $conn->real_escape_string($_POST['prenom']);
$courriel = $conn->real_escape_string($_POST['courriel']);
$adresse = $conn->real_escape_string($_POST['adresse']);
$telephone = $conn->real_escape_string($_POST['telephone']);
$info_de_paiement = $conn->real_escape_string($_POST['info_de_paiement']);
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Stockage sécurisé du mot de passe

// Vérification si le nom d'utilisateur existe déjà dans la base de données
$check_query = "SELECT * FROM client WHERE nom_utilisateur='$nom_utilisateur'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    echo "Le nom_utilisateur est déjà utilisé. Veuillez en choisir un autre.";
} else {
    // Requête pour insérer les données dans la base de données
    $insert_query = "INSERT INTO client (nom_utilisateur, nom, prenom, courriel, mdp, adresse, telephone,info_de_paiement) VALUES ('$nom_utilisateur', '$nom', '$prenom', '$courriel', '$mdp', '$adresse', '$telephone', '$info_de_paiement')";

    if ($conn->query($insert_query) === TRUE) {
        echo "Inscription réussie !";
        // Redirection vers la page de connexion après inscription réussie
        header("Location: connexion.html");
        exit();
    } else {
        echo "Erreur : " . $insert_query . "<br>" . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
