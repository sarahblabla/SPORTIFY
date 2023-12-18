<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Remplacez par les informations de votre base de données
    $servername = "votre_hote";
    $username = "votre_utilisateur";
    $password = "votre_mot_de_passe";
    $dbname = "votre_base_de_donnees";

    // Récupérer les données du formulaire
    $to = "votre_adresse_email@example.com"; // Remplacez par votre adresse e-mail
    $subject = $_POST["subject"];
    $messageText = $_POST["message"];
    $email = $_POST["email"];

    // Enregistrer le message dans la base de données
    saveMessageToDatabase($email, $subject, $messageText);

    // Envoyer l'e-mail
    $headers = "From: $email";
    if (mail($to, $subject, $messageText, $headers)) {
        echo "L'e-mail a été envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi de l'e-mail. Veuillez réessayer.";
    }
}

function saveMessageToDatabase($email, $subject, $messageText) {
    global $servername, $username, $password, $dbname;

    // Créer une connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparer la requête SQL
    $sql = "INSERT INTO messages (email, subject, message) VALUES ('$email', '$subject', '$messageText')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Le message a été enregistré dans la base de données.";
    } else {
        echo "Erreur lors de l'enregistrement du message : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>