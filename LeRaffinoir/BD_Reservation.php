<?php
session_start();

error_log(print_r($_POST, true));


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
$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$personnes = $_POST['personnes'];
$commentaires = $_POST['commentaires'];

print_r($_POST);

require "Bd_Connection.php";
 

// Assurez-vous d'échapper les données pour éviter les injections SQL
$idUtilisateur = mysqli_real_escape_string($conn, $idUtilisateur);
$date = mysqli_real_escape_string($conn, $date);
$heure = mysqli_real_escape_string($conn, $heure);
$personnes = mysqli_real_escape_string($conn, $personnes);
$commentaires = mysqli_real_escape_string($conn, $commentaires);


// Définissez les heures d'ouverture du restaurant
$heureOuverture = "12:00";
$heureFermeture = "23:00";

// Vérifiez si l'heure de réservation est en dehors des heures d'ouverture
if ($heure < $heureOuverture || $heure > $heureFermeture) {
    echo "Le restaurant est ouvert de 12h à 23h. Veuillez choisir une heure pendant ces heures d'ouverture.";
    exit();
}



$requete = "INSERT INTO `reservation` (`idutilisateur`, `Date_Reservation`, `Heure_Reservation`, `Nombre_Personnes`, `Commentaires`) VALUES ('$idUtilisateur', '$date', '$heure', '$personnes', '$commentaires')";

$result = mysqli_query($conn, $requete); 

if ($result) {
    echo "<h1>Réservation effectuée avec succès!</h1>";
    header("location: page_MesReservations.php");
} else {
    echo "<h1>Erreur lors de la réservation.</h1>";
    header("location: page_Reservation.php");
}
?>