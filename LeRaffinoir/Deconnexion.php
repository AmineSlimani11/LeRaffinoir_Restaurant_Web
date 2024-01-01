<?php
session_start();

// Détruit toutes les données de la session
$_SESSION = array();
session_destroy();

// Redirige vers la page de connexion
header('Location: page_Accueil.php');
exit(); // Assurez-vous de terminer le script après une redirection
?>
