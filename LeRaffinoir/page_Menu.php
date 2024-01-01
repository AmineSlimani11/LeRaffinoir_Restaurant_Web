<?php session_start(); ?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="styles_Menu.css">
        <title>Réservation</title>
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
                <?php if (isset($_SESSION['idUtilisateur'])): ?>
                    <li><a href="page_Contact.php">Contact</a></li>
                    <?php if ($_SESSION['isAdmin'] == 1): ?>
                        <a href="page_Administrateur.php" class="bouton-pour-inscripconnex">Admin</a>
                    <?php else: ?>
                        <a href="page_Profile.php" class="bouton-pour-inscripconnex">Profile</a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="page_Connectez.php" >Contact</a>
                    <a href="page_Connectez.php" class="bouton-pour-inscripconnex">Connexion</a>
                <?php endif; ?>
            </ul>
    </header>

        <div class="tele-menu">
            <a href="images/menu.pdf" download="Menu_Restaurant.pdf">Télécharger le menu au format PDF</a>
        </div>

        <section class="menu-P_P">
            <div class="menu-item">
                <img src="images/menu-P_Principale.jpg" alt="P_P">
                <!-- Ajoutez d'autres éléments d'entrée ici -->
            </div>
        </section>
    
        <section class="menu-Dej">
            <div class="menu-item">
                <img src="images/menu-Dej.jpg" alt="Dej">
                <!-- Ajoutez d'autres plats principaux ici -->
            </div>
        </section>

        <section class="menu-Salades">
            <div class="menu-item">
                <img src="images/menu-Salades.jpg" alt="Salades">
                <!-- Ajoutez d'autres plats principaux ici -->
            </div>
        </section>

        <section class="menu-Plat">
            <div class="menu-item">
                <img src="images/menu-Plats.jpg" alt="Plat">
                <!-- Ajoutez d'autres plats principaux ici -->
            </div>
        </section>

        <section class="menu-Desserts">
            <div class="menu-item">
                <img src="images/menu-Desserts.jpg" alt="Desserts">
                <!-- Ajoutez d'autres plats principaux ici -->
            </div>
        </section>

        <section class="menu-B_Chaudes">
            <div class="menu-item">
                <img src="images/menu-B_Chaudes.jpg" alt="B_Chaudes">
                <!-- Ajoutez d'autres plats principaux ici -->
            </div>
        </section>

        <section class="menu-B_Fraiches">
            <div class="menu-item">
                <img src="images/menu-B_Fraiches.jpg" alt="B_Fraiches">
                <!-- Ajoutez d'autres plats principaux ici -->
            </div>
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