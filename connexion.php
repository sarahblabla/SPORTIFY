<?php
// Démarrez la session
session_start();

$expected_username = 'nom_utilisateur';
$expected_password = 'mdp';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['nom_utilisateur']) ? $_POST['nom_utilisateur'] : '';
    $password = isset($_POST['mdp']) ? $_POST['mdp'] : '';

    if ($username === $expected_username && $password === $expected_password) {
        // Définir les informations de session
        $_SESSION['logged_in'] = true;

        header('Location: acceuil.html');
        exit();
    } else {
        $login_error = 'Identifiants incorrects. Veuillez réessayer.';
        echo 'Identifiants incorrects. Veuillez réessayer.';
    }
}
?>
