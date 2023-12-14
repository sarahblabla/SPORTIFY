<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>votre compte</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>votre compte</h2>
    <div class="registration-details">
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["button1"])) {
          $ID = isset($_POST["ID"]) ? $_POST["ID"] : "";
          $Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
          $Prénom = isset($_POST["Prénom"]) ? $_POST["Prénom"] : "";
          $Courriel = isset($_POST["Courriel"]) ? $_POST["Courriel"] : "";
          $Adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
          $telephone = isset($_POST["telephone"]) ? $_POST["telephone"] : "";

          echo "<p><strong>ID:</strong> " . $ID . "</p>";
          echo "<p><strong>Nom:</strong> " . $Nom . "</p>";
          echo "<p><strong>Prénom:</strong> " . $Prénom . "</p>";
          echo "<p><strong>Courriel:</strong> " . $Courriel . "</p>";
          echo "<p><strong>Adresse:</strong> " . $Adresse . "</p>";
          echo "<p><strong>telephone:</strong> " . $telephone . "</p>";

      } else {
          echo "<p>Aucune donnée d'inscription soumise.</p>";
      }
      ?>
    </div>
  </div>
</body>
</html>
