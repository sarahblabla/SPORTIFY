<?php

$recherche = $_GET['search-input'] ?? '';


$rechercheNormalisee = strtolower(str_replace('-', ' ', iconv('UTF-8', 'ASCII//TRANSLIT', $recherche)));


if (stripos($rechercheNormalisee, 'activite') !== false) {
    // Rediriger vers la page correspondante
    header("Location:activité_sportive.html");
    exit();
} elseif (stripos($rechercheNormalisee, 'motclef2') !== false) {
    header("Location: page2.php");
    exit();
} else {
    // Rediriger vers une page par défaut si aucun mot-clé n'est trouvé
    header("Location: page_par_defaut.php");
    exit();
}
?>
