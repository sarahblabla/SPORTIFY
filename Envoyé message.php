!--Communiquer avec le coach-->

<!-- Envoyé un message écrit-->
<?php
$email = ""; // Initialiser une variable pour stocker l'e-mail

if (isset($_POST['Submit1'])) { // Vérifier si le formulaire a été soumis
    require '../configure.php'; // Inclure le fichier de configuration contenant les informations de la base de données
    $email = $_POST['email']; // Récupérer l'e-mail depuis le formulaire

    $database = "membertest";
    $db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database); // Établir la connexion à la base de données

    if ($db_found) { // Vérifier si la connexion à la base de données est réussie
        $SQL = $db_found->prepare('SELECT * FROM members WHERE email = ?'); // Préparer une requête SQL paramétrée
        $SQL->bind_param('s', $email); // Lier le paramètre de la requête avec la valeur de l'e-mail
        $SQL->execute(); // Exécuter la requête
        $result = $SQL->get_result(); // Récupérer le résultat de la requête

        if ($result->num_rows > 0) { // Vérifier s'il y a des enregistrements
            while ($db_field = $result->fetch_assoc()) { // Parcourir les enregistrements
                echo $db_field['ID'] . "<br>"; // Afficher l'ID
                echo $db_field['username'] . "<br>"; // Afficher le nom d'utilisateur
                echo $db_field['password'] . "<br>"; // Afficher le mot de passe (à des fins de démonstration ; ne faites pas cela en pratique)
                echo $db_field['email'] . "<BR>"; // Afficher l'e-mail
            } //end while
        } else {
            echo "No records found"; // Aucun enregistrement trouvé
        }//end else

        $SQL->close(); // Fermer la requête préparée
        $db_found->close(); // Fermer la connexion à la base de données
    } else {
        echo "Database NOT Found "; // Base de données non trouvée
    } //end else
} //end if
?>
<!--Envoyé un message vocal-->
<?php

if (isset($_POST['Submit1'])) { // Vérifier si le formulaire a été soumis
    require '../configure.php'; // Inclure le fichier de configuration contenant les informations de la base de données

    // Récupérer l'e-mail depuis le formulaire
    $email = $_POST['email'];

    $database = "membertest";
    $db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database); // Établir la connexion à la base de données

    if ($db_found) { // Vérifier si la connexion à la base de données est réussie

        // Préparer et exécuter la requête pour récupérer le numéro de téléphone associé à l'e-mail
        $SQL = $db_found->prepare('SELECT phone_number FROM members WHERE email = ?');
        $SQL->bind_param('s', $email);
        $SQL->execute();
        $result = $SQL->get_result();

        if ($result->num_rows > 0) { // Vérifier s'il y a des enregistrements

            // Récupérer le numéro de téléphone depuis le résultat de la requête
            $row = $result->fetch_assoc();
            $phoneNumber = $row['phone_number'];

            // Configuration Twilio
            $sid = 'VOTRE_TWILIO_SID';
            $token = 'VOTRE_TWILIO_AUTH_TOKEN';
            $twilio = new \Twilio\Rest\Client($sid, $token);

            // URL du message vocal (remplacez par votre propre URL)
            $voiceMessageUrl = 'https://example.com/voice-message.mp3';

            // Envoyer le message vocal
            $call = $twilio->calls
                ->create(
                    $phoneNumber,
                    '+1234567890', // Numéro Twilio (votre numéro)
                    [
                        'url' => $voiceMessageUrl,
                        'method' => 'GET',
                        'statusCallback' => 'https://example.com/status-callback'
                    ]
                );

            echo "Message vocal envoyé à $phoneNumber. SID: " . $call->sid;
        } else {
            echo "Aucun enregistrement trouvé pour l'e-mail spécifié.";
        }

        $SQL->close(); // Fermer la requête préparée
        $db_found->close(); // Fermer la connexion à la base de données
    } else {
        echo "Database NOT Found"; // Base de données non trouvée
    }
}

?>

<!--Appel en visio-->

<?php

if (isset($_POST['Submit1'])) { // Vérifier si le formulaire a été soumis
    require '../configure.php'; // Inclure le fichier de configuration contenant les informations de la base de données

    // Récupérer l'e-mail depuis le formulaire
    $email = $_POST['email'];

    $database = "membertest";
    $db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database); // Établir la connexion à la base de données

    if ($db_found) { // Vérifier si la connexion à la base de données est réussie

        // Préparer et exécuter la requête pour récupérer le numéro de téléphone associé à l'e-mail
        $SQL = $db_found->prepare('SELECT phone_number FROM members WHERE email = ?');
        $SQL->bind_param('s', $email);
        $SQL->execute();
        $result = $SQL->get_result();

        if ($result->num_rows > 0) { // Vérifier s'il y a des enregistrements

            // Récupérer le numéro de téléphone depuis le résultat de la requête
            $row = $result->fetch_assoc();
            $phoneNumber = $row['phone_number'];

            // Configuration Twilio
            $sid = 'VOTRE_TWILIO_SID';
            $token = 'VOTRE_TWILIO_AUTH_TOKEN';
            $twilio = new \Twilio\Rest\Client($sid, $token);

            // URL du service TwiML pour la visioconférence (remplacez par votre propre URL)
            $conferenceUrl = 'https://example.com/conference-twiml.php';

            // Créer l'appel en visioconférence
            $call = $twilio->calls
                ->create(
                    $phoneNumber,
                    '+1234567890', // Numéro Twilio (votre numéro)
                    [
                        'url' => $conferenceUrl,
                        'method' => 'GET',
                        'statusCallback' => 'https://example.com/status-callback'
                    ]
                );

            echo "Appel en visioconférence initié avec $phoneNumber. SID: " . $call->sid;
        } else {
            echo "Aucun enregistrement trouvé pour l'e-mail spécifié.";
        }

        $SQL->close(); // Fermer la requête préparée
        $db_found->close(); // Fermer la connexion à la base de données
    } else {
        echo "Database NOT Found"; // Base de données non trouvée
    }
}

?>



