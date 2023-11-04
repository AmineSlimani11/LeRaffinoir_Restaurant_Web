<?php

$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$personnes = $_POST['personnes'];
$commentaires = $_POST['commentaires'];

require 'BD_Connection.php'; 

$sql = "INSERT INTO reservations( Nom, E-mail, Telephone, Date_Reservation, Heure_Reservation, Nombre_Personnes, Commentaires)
	VALUES ('$nom', '$email', '$telephone', '$date', '$heure', '$personnes', '$commentaires')";

$stmt = pg_query($conn, $sql);

if ($stmt) {
    echo "<h1>Réservation effectuée avec succès!</h1>";
} else {
    echo "<h1>Erreur lors de la réservation.</h1>";
}
?>
