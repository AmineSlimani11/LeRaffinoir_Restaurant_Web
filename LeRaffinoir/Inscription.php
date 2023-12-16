<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Récupère les valeurs des champs du formulaire
$nom = $_POST['_nom'] ?? '';
$prenom = $_POST['_prenom'] ?? '';
$email = $_POST['_email'] ?? '';
$password = $_POST['_password'] ?? '';
$password_verif = $_POST['_password_verif'] ?? '';
$telephone = $_POST['_telephone'] ?? '';
$adresse = $_POST['_adresse'] ?? '';

// Vérifie si les champs obligatoires sont remplis
if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($password_verif) || empty($telephone) || empty($adresse)) {
    echo "<h1>Tous les champs sont obligatoires.</h1>";
} else {
    // Vérifie si le mot de passe et sa confirmation sont identiques
    if ($password === $password_verif) {
        // Connexion à la base de données (à adapter selon votre configuration)
        require 'BD_Connection.php';

        // Utilisation de la fonction mysqli_real_escape_string pour éviter les injections SQL
        $nom = mysqli_real_escape_string($conn, $nom);
        $prenom = mysqli_real_escape_string($conn, $prenom);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $telephone = mysqli_real_escape_string($conn, $telephone);
        $adresse = mysqli_real_escape_string($conn, $adresse);

        // Hash du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Vérifie si la fonction password_hash a réussi
        if ($hashed_password !== false) {
            // Prépare la requête SQL pour insérer l'utilisateur dans la base de données
            $requete = "INSERT INTO `Utilisateurs`(`Nom`, `Prenom`, `Email`, `Password`, `Telephone`, `Adresse`) VALUES ('$nom', '$prenom', '$email', '$hashed_password', '$telephone', '$adresse')";

            // Exécute la requête
            $result = mysqli_query($conn, $requete);

            // Ferme la connexion à la base de données
            $conn->close();

            if ($result) {
                echo "<h1>Inscription réussie!</h1>";
            } else {
                echo "<h1>Erreur lors de l'inscription.</h1>";
            }
        } else {
            echo "<h1>Erreur lors du hachage du mot de passe.</h1>";
        }
    } else {
        echo "<h1>Les mots de passe ne correspondent pas.</h1>";
    }
}

?>
