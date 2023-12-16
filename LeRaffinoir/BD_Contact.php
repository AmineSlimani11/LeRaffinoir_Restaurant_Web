<?php
var_dump($_POST);
$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];

require 'BD_Connection.php'; 

$requete = "INSERT INTO Contact(Nom, Email, Telephone, Message) VALUES ('$nom', '$email', '$telephone', '$message')";

$result = mysqli_query($conn, $requete); 


?>