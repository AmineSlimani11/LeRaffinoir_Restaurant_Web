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

$idReservation = $_POST['idReservation'] ?? '';
$_SESSION['idReservation'] = $idReservation;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles_Profile.css">
    <title>Modifier Réservation</title>
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
        <!-- Contenu de la page ici -->

        <form method="post" action="BD_ModifierReservation.php">
            <!-- Ajoutez vos champs de formulaire ici, par exemple, l'heure de réservation -->
            
            <label for='date'>Date de réservation :</label>
            <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
            
            <label for="heure">Heure de réservation :</label>
            <input type="time" id="heure" name="heure" class="reservation-heure" required min="12:00" max="23:59">

            <label for='personnes'>Nombre de personnes :</label>
            <input type='number' id='personnes' name='personnes' required>

            <label for="commentaires">Commentaires :</label>
            <textarea placeholder="maximum 2000 caractére ..." id="commentaires" name="commentaires" rows="4"></textarea>
        

            <!-- Ajoutez le script JavaScript ici -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Sélectionnez l'élément d'entrée pour l'heure de réservation
                    var heureInput = document.querySelector('.reservation-heure');

                    // Ajoutez un gestionnaire d'événements pour le changement de valeur
                    heureInput.addEventListener('input', function () {
                        // Obtenez la valeur actuelle de l'heure
                        var heure = heureInput.value;

                        // Définissez les heures d'ouverture du restaurant
                        var heureOuverture = "12:00";
                        var heureFermeture = "23:00";

                        // Vérifiez si l'heure de réservation est en dehors des heures d'ouverture
                        if (heure < heureOuverture || heure > heureFermeture) {
                            alert("Le restaurant est ouvert de 12h à 23h. Veuillez choisir une heure pendant ces heures d'ouverture.");
                            // Réinitialisez la valeur de l'heure
                            heureInput.value = "";
                        }
                    });
                });
            </script>

            <!-- Ajoutez le bouton de soumission du formulaire ici -->
            <input type="submit" value="Modifier Réservation">
        </form>

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
