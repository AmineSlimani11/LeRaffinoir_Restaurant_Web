<?php
session_start();

// Vérifie si la variable de session 'idUtilisateur' est définie
if (isset($_SESSION['idUtilisateur'])) {
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $Nom = $_SESSION['nom'];
    $Prenom = $_SESSION['prenom'];
} else {
    // Redirige l'utilisateur vers une page d'erreur ou de connexion si 'idUtilisateur' n'est pas défini
    header("Location: page_Connectez.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles_Profile.css">
    <title>Mes Réservations</title>
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
                <a href="Page_Profile.php" class="bouton-pour-inscripconnex profile-button">Profile <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-menu">
                    <ul>
                        <li ><a href="page_MesReservations.php" class="reservations-item">Mes reservations</a></li>
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

    <div class="content">
        <h1>Mes Réservations</h1>

        <?php
        // Connectez-vous à la base de données
        require 'BD_Connection.php';

        // Préparez et exécutez la requête SQL pour récupérer les réservations de l'utilisateur
        $requete = "SELECT * FROM `reservation` WHERE `idUtilisateur` = $idUtilisateur";
        $result = mysqli_query($conn, $requete);

        // Vérifie si la requête a réussi
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Affiche le tableau des réservations
                echo "<table border='1'>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Nombre de Personnes</th>
                            <th>Commentaires</th>
                            <th>Action</th>
                        </tr>";

                // Parcourt les résultats de la requête
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['Date_Reservation']}</td>
                            <td>{$row['Heure_Reservation']}</td>
                            <td>{$row['Nombre_Personnes']}</td>
                            <td>{$row['Commentaires']}</td>
                            <td>
                                <form method='post' action='page_ModifierReservation.php'>
                                    <input type='hidden' name='idReservation' value='" . $row['idReservation'] . "'>
                                    <input type='submit' value='Modifier'>
                                </form>
                        
                            </td>
                        </tr>";
                }


                echo "</table>";
            } else {
                echo "<p>Aucune réservation.</p>";
            }
        } else {
            // Gestion de l'erreur, vous pouvez personnaliser selon vos besoins
            echo "Erreur lors de la récupération des réservations.";
        }

        // Ferme la connexion à la base de données
        $conn->close();
        ?>

    </div>

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
