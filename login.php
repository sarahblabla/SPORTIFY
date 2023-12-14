<?php
// Démarrez la session
session_start();

$expected_username = 'utilisateur';
$expected_password = 'motdepasse';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $expected_username && $password === $expected_password) {
        // Définir les informations de session
        $_SESSION['logged_in'] = true;
        
        // Redirection vers la page principale si les identifiants sont corrects
        header('Location: page_principale.php');
        exit();
    } else {
        $login_error = 'Identifiants incorrects. Veuillez réessayer.';
        echo 'Identifiants incorrects. Veuillez réessayer.';
    }
}

// Détruisez toutes les variables de session
$_SESSION = array();

// Si vous utilisez des cookies de session, détruisez-les également
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruisez la session
session_destroy();

// Redirigez vers la page de connexion après la déconnexion
header("Location: index.html");
exit();
?>

