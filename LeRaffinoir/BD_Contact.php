<?php
session_start();

// Assurez-vous que l'utilisateur est connecté (vous pouvez ajouter d'autres vérifications si nécessaire)
if (!isset($_SESSION['idUtilisateur'])) {
    echo "Utilisateur non connecté.";
    $_SESSION['redirect_url'] = $_GET['redirect'];
    header("location: page_Connectez.php");
    exit();
}

// Récupérez l'idUtilisateur de la session
$idUtilisateur = $_SESSION['idUtilisateur'];

// Autres données du formulaire
$Nom = $_POST['nom'];
$Email = $_POST['email'];
$Telephone = $_POST['telephone'];
$Message = $_POST['message'];

require 'BD_Connection.php'; 

// Assurez-vous d'échapper les données pour éviter les injections SQL
$idUtilisateur = mysqli_real_escape_string($conn, $idUtilisateur);
$Nom = mysqli_real_escape_string($conn, $Nom);
$Email = mysqli_real_escape_string($conn, $Email);
$Telephone = mysqli_real_escape_string($conn, $Telephone);
$Message = mysqli_real_escape_string($conn, $Message);

$requete = "INSERT INTO `Contact` (`idutilisateur`, `Message`) VALUES ('$idUtilisateur', '$Message')";

$result = mysqli_query($conn, $requete); 

if ($result) {
    echo "<h1>Message envoyé avec succès!</h1>";
} else {
    echo "<h1>Erreur lors de l'envoi'.</h1>";
}
?>
