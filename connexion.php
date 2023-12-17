<?php
// Démarrez la session
session_start();

$expected_username = 'nom_utilisateur';
$expected_password = 'mdp';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

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
