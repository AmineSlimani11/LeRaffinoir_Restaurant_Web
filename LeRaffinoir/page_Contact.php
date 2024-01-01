<?php session_start(); ?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="styles_Contact.css">
        <title>Contact</title>
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

        <main>
            <aside>
                
                <p><span>N</span>ous sommes impatients de vous accueillir dans notre restaurant et de répondre 
                    à toutes vos demandes. Si vous avez des questions ou des besoins particuliers, n'hésitez pas 
                    à nous contacter. Notre équipe dévouée est à votre disposition pour vous assister. Vous pouvez 
                    nous joindre par téléphone ou par e-mail, et nous serons heureux de discuter de la meilleure 
                    façon de rendre votre expérience avec nous inoubliable. Votre satisfaction est notre priorité, 
                    et nous sommes là pour répondre à tous vos besoins.</p>
                <h3>contact@leraffinoir.fr</h3>

            </aside>

            <form method="post" action="BD_Contact.php">
                <label for="nom">Nom :</label>
                <input type="text" placeholder="Votre nom" id="nom" name="nom" required>
    
                <label for="email">E-mail :</label>
                <input type="email" placeholder="Votre mail" id="email" name="email" required>
    
                <label for="telephone">Téléphone :</label>
                <input type="tel" placeholder="Votre numéro" id="telephone" name="telephone" required>
    
                <label for="message">Message :</label>
                <textarea placeholder="Votre message ..." id="message" name="message" rows="4"></textarea>
    
                <input type="Submit" value="Envoyer le Message">
            </form>
        </main>

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