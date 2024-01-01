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
                <h1>Bienvenue <?= $Nom ?> sur votre profil</h1>
                <h1>Nom : <?= $Nom ?> </h1>
                <h1>Prenom : <?= $Prenom ?> </h1>
                <h1>email : <?= $Email ?> </h1>
                <h1>telephone : <?= $Telephone ?> </h1>

            </div>

            <section id="présentation">
                <a href="Deconnexion.php" class="bouton2">DECONNEXION</a>
            </section>


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