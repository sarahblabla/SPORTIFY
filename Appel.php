<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le numéro de téléphone
    $phone = $_POST["phone"];

    // Enregistrer l'appel dans la base de données
    saveCallToDatabase($phone);

    // Effectuer l'appel (remplacez cette ligne par la logique de votre infrastructure VoIP)
    $result = performPhoneCall($phone);

    // Afficher le résultat de l'appel
    echo $result;
}

function saveCallToDatabase($phoneNumber) {
    // Configurer la connexion à la base de données (remplacez ces informations par les vôtres)
    $servername = "votre_hote";
    $username = "votre_utilisateur";
    $password = "votre_mot_de_passe";
    $dbname = "votre_base_de_donnees";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparer la requête SQL
    $sql = "INSERT INTO appels (numero_telephone) VALUES ('$phoneNumber')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement de l'appel dans la base de données réussi.";
    } else {
        echo "Erreur lors de l'enregistrement de l'appel : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}

function performPhoneCall($phoneNumber) {
    // Ajouter ici la logique spécifique à votre infrastructure VoIP pour effectuer l'appel
    // Vous devrez remplacer cette fonction par la logique de votre système.

    // Exemple simplifié
    return "L'appel vers $phoneNumber est en cours.";
}