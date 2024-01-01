<?php
session_start();

// Check if the user is an admin
if (!isset($_SESSION['idUtilisateur']) || !$_SESSION['isAdmin']) {
    // Redirect unauthorized users
    header("Location: page_Accueil.php");
    exit();
}

// Check if the form is submitted with a reservation ID
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idReservation"])) {
    // Include the database connection file
    require 'BD_Connection.php';

    // Sanitize and validate the reservation ID
    $idReservation = mysqli_real_escape_string($conn, $_POST["idReservation"]);

    // Perform the reservation deletion
    $deleteQuery = "DELETE FROM reservation WHERE idReservation = $idReservation";
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        // Redirect back to the dashboard
        header("Location: page_dashboard.php");
        exit();
    } else {
        // Handle deletion error, customize as needed
        echo "Erreur lors de la suppression de la réservation.";
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted with a reservation ID, redirect to the dashboard
    header("Location: page_dashboard.php");
    exit();
}
?>
