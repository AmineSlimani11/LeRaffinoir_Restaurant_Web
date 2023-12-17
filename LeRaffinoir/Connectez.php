<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Récupère les valeurs des champs du formulaire
$email = $_POST['_email'] ?? '';
$password = $_POST['_password'] ?? '';

if (empty($email) || empty($password)) {
    echo "Veuillez fournir une adresse e-mail et un mot de passe.";
    exit();
}

require 'BD_Connection.php'; 

// Utilisation de requêtes préparées avec des paramètres liés
$stmt = $conn->prepare("SELECT * FROM Utilisateurs WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Utilisateur trouvé, récupère le mot de passe hashé
    $row = $result->fetch_assoc();
    $hashed_password = $row['Password'];

    // Vérifie si le mot de passe correspond
    if (password_verify($password, $hashed_password)) {
        echo "Connexion réussie !";
        // Démarrer la session et stocker les informations de l'utilisateur si nécessaire
        session_start();
        $_SESSION['nom'] = $row['Nom']; // Vous pouvez stocker d'autres informations de l'utilisateur dans la session
        header("location: page_Profile.html");
        exit();
    } else {
        echo "Échec de la connexion, vérifiez votre password.";
    }
} else {
    echo "Aucun utilisateur trouvé avec cette adresse e-mail.";
}

// Ferme la connexion à la base de données
$stmt->close();
$conn->close();
?>
