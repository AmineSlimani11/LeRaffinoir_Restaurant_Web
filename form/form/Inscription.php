<?php
// Récupère les valeurs des champs du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verif = $_POST['password_verif'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];

// Vérifie si le mot de passe et sa confirmation sont identiques
if ($password === $password_verif) {
    // Connexion à la base de données (à adapter selon votre configuration)
    require 'BD_Connection.php'; 

    // Prépare la requête SQL pour insérer l'utilisateur dans la base de données
    $requete = "INSERT INTO `Utilisateurs`(`Nom`, `Prenom`, `Email`, `Password`, `Telephone`, `Adresse`) VALUES ('$nom', '$prenom', '$email', '$password', '$telephone', '$adresse')";

    // Exécute la requête
    $result = mysqli_query($conn, $requete); 

    // Ferme la connexion à la base de données
    $conn->close();

    if ($result) {
        echo "<h1>Réservation effectuée avec succès!</h1>";
    } else {
        echo "<h1>Erreur lors de la réservation.</h1>";
    }
} else {
    echo "<h1>Les mots de passe ne correspondent pas.</h1>";
}
?>