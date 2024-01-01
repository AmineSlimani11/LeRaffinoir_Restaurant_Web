<?php
session_start();

// Vérifie si la variable de session 'nom' est définie
if (isset($_SESSION['idUtilisateur'])) {
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $Nom = $_SESSION['nom'];
    $Prenom = $_SESSION['prenom'];
    $Email = $_SESSION['email'];
    $Telephone = $_SESSION['telephone'];
} else {
    // Redirige l'utilisateur vers une page d'erreur ou de connexion si 'nom' n'est pas défini
    echo "Échec de la Nom.";
    exit();
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="styles_Profile.css">
        <title>Profile</title>

    </head>
    <body>
        
        <header>
            <a href="page_Accueil.php" class="logo"> Le RAFFINOIR</a>
            <div class="menuToggle"></div>
            <ul class="navbar">
                <li><a href="page_Accueil.php">Accueil</a></li>
                <li><a href="page_Accueil.php#apropos">À propos</a></li>
                <li><a href="page_Accueil.php#temoignage">Temoignage</a></li>
                <li><a href="page_Menu.php">Menu</a></li>
                <li><a href="page_Contact.php">Contact</a></li>
                <?php if ($_SESSION['idUtilisateur']): ?>
                    <li>
                        <a href="page_Administrateur.php" class="bouton-pour-inscripconnex profile-button">Admin <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li ><a href="page_dashboard.php" class="dashboard-item">Dashboard</a></li>
                                <li ><a href="page_ModifierInfos.php" class="modifier-info-item">Modifier mes informations</a></li>
                                <li ><a href="Deconnexion.php" class="deconnexion-item">Se déconnecter</a></li>
                            </ul>
                        </div>    
                    </li>
                <?php else: ?>
                    <a href="page_Connectez.php" class="bouton-pour-inscripconnex">Connexion</a>
                <?php endif; ?>
            </ul>
        </header>

        <?php
            // Include the database connection file
            require 'BD_Connection.php';

            // Retrieve all users
            $requeteUtilisateurs = "SELECT * FROM Utilisateur";
            $resultUtilisateurs = mysqli_query($conn, $requeteUtilisateurs);

            // Retrieve all reservations with user information
            $requeteReservations = "SELECT reservation.*, Utilisateur.Nom, Utilisateur.Prenom, Utilisateur.Email, Utilisateur.Telephone
                                    FROM reservation
                                    INNER JOIN Utilisateur ON reservation.idUtilisateur = Utilisateur.idUtilisateur";
            $resultReservations = mysqli_query($conn, $requeteReservations);

            // Retrieve all contacts with user information
            $requeteContacts = "SELECT Contact.*, Utilisateur.Nom, Utilisateur.Prenom, Utilisateur.Email, Utilisateur.Telephone
                                FROM Contact
                                INNER JOIN Utilisateur ON Contact.idUtilisateur = Utilisateur.idUtilisateur";
            $resultContacts = mysqli_query($conn, $requeteContacts);

            // Check if the queries were successful
            if ($resultUtilisateurs && $resultReservations && $resultContacts) {
                // Display users
                echo "<h2>Utilisateurs</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Admin</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($resultUtilisateurs)) {
                    echo "<tr>
                            <td>{$row['idUtilisateur']}</td>
                            <td>{$row['Nom']}</td>
                            <td>{$row['Prenom']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['Telephone']}</td>
                            <td>{$row['isAdmin']}</td>
                        </tr>";
                }

                echo "</table>";

                // Display reservations
                echo "<h2>Réservations</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Nombre de Personnes</th>
                            <th>Commentaires</th>
                            <th>Action</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($resultReservations)) {
                    echo "<tr>
                            <td>{$row['idReservation']}</td>
                            <td>{$row['Nom']}</td>
                            <td>{$row['Prenom']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['Telephone']}</td>
                            <td>{$row['Date_Reservation']}</td>
                            <td>{$row['Heure_Reservation']}</td>
                            <td>{$row['Nombre_Personnes']}</td>
                            <td>{$row['Commentaires']}</td>
                            <td>
                                <form method='post' action='delete_reservation.php'>
                                    <input type='hidden' name='idReservation' value='{$row['idReservation']}'>
                                    <input type='submit' value='Supprimer'>
                                </form>
                            </td>
                        </tr>";
                }

                echo "</table>";

                // Display contacts
                echo "<h2>Contacts</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Message</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($resultContacts)) {
                    echo "<tr>
                            <td>{$row['idContact']}</td>
                            <td>{$row['Nom']}</td>
                            <td>{$row['Prenom']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['Telephone']}</td>
                            <td>{$row['Message']}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                // Error handling, customize as needed
                echo "Erreur lors de la récupération des données.";
            }

            // Close the database connection
            $conn->close();
            ?>

        <footer>
            <div class="social-media">
                <h3>Social Media</h3>
                <a href="https://www.facebook.com/votrerestaurant" target="_blank"><img src="images/icone-facebook-ronde.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/votrerestaurant" target="_blank"><img src="images/Instagram_icon.png" alt="Instagram"></a>
                <a href="https://www.Pinterest.com/votrerestaurant" target="_blank"><img src="images/pinteresttt.png" alt="Pinterest"></a>
                <p>&copy; 2023 Le RAFFINOIR. Tous droits réservés.</p>
            </div>
            <div class="contact-info">
                <h3>Contactez-nous</h3>
                <p>contact@leraffinoir.com</p>
                <p>Téléphone : +01 234 567 890</p>
            </div>
            <div class="adresse">
                <h3>Adresse</h3>
                <p><a href="https://maps.app.goo.gl/b6JZEzvPRLHpEnCZ7">3 Bd de la Résistance, 62100 Calais</a></p>
            </div>
        </footer>

    </body>
</html>