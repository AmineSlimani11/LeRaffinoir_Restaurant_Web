<?php
// Connexion à la base de données (à adapter selon votre configuration)
require 'BD_Connection.php'; 

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère l'e-mail du formulaire
    $email = $_POST["email"];

    // Prépare la requête SQL
    $query = "SELECT * FROM Utilisateurs WHERE email = '$email'";

    // Exécute la requête
    $result = $mysqli->query($query);

    // Vérifie s'il y a des résultats
    if ($result->num_rows > 0) {
        // L'utilisateur existe, redirige vers la page de connexion
        header("Location: page_Connectez.html");
        exit();
    } else {
        // L'utilisateur n'existe pas, redirige vers la page d'inscription
        header("Location: page_Inscription.html");
        exit();
    }
}

// Ferme la connexion à la base de données
$mysqli->close();
?>
