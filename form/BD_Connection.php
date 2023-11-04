<?php
$host = "localhost"; // Adresse du serveur PostgreSQL
$database = "Web_BD"; // Nom de la base de données
$user = "postgres"; // Nom d'utilisateur PostgreSQL
$password = "Webpassword"; // Mot de passe PostgreSQL
$port = 5432;

$conn = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if (!$conn) {
    die("Erreur de connexion : " . pg_last_error());
}
?>