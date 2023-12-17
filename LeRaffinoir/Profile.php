<?php
session_start();

// Vérifie si la variable de session 'nom' est définie
if (isset($_SESSION['nom'])) {
    $Nom = $_SESSION['nom'];
} else {
    // Redirige l'utilisateur vers une page d'erreur ou de connexion si 'nom' n'est pas défini
    echo "Échec de la Nom.";
    exit();
}
?>