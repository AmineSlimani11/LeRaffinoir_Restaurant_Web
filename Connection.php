<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure le fichier de connexion à la base de données
require 'BD_Connection.php';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère l'e-mail du formulaire
    $email = $_POST["_email"];

    // Prépare la requête SQL
    $query = "SELECT * FROM Utilisateurs WHERE email = '$email'";

    // Exécute la requête
    $result = $conn->query($query); // Utilisez $conn au lieu de $mysqli

    // Vérifie s'il y a des résultats
    if ($result && $result->num_rows > 0) {
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
$conn->close();
?>

