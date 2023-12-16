<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Récupère les valeurs des champs du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

require 'BD_Connection.php'; 

// Sécurise les données en les plaçant dans des guillemets
$email = $conn->quote($email);
$password = $conn->quote($password);

// Crée la requête SQL pour vérifier les informations de connexion
$sql = "SELECT * FROM Utilisateurs WHERE Email = $email AND Password = $password";

$result = $conn->query($sql);

// Vérification
if ($result->rowCount() > 0) {
    echo "Connexion réussie !";
} else {
    echo "Échec de la connexion, vérifiez vos identifiants.";
}

// Ferme la connexion à la base de données
$conn = null;
?>