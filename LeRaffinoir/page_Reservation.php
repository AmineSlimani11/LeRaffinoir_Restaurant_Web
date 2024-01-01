<?php session_start(); ?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="styles_Reservation.css">
        <title>Réservation</title>

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

        <div class="body">

            <aside>
                <h1><span>R</span>éservation</h1>
                <p>Votre réservation dans notre restaurant est la première étape pour vivre une expérience gastronomique 
                exceptionnelle. Notre équipe est prête à vous accueillir avec chaleur et à vous offrir un service de première 
                classe. Pour réserver une table, veuillez utiliser notre système de réservation en ligne, qui vous permet de 
                choisir votre date, votre heure et le nombre de convives. Si vous avez des demandes spéciales ou des besoins 
                alimentaires particuliers, n'hésitez pas à les mentionner lors de la réservation. Nous faisons tout notre 
                possible pour personnaliser votre expérience. Nous sommes impatients de vous accueillir et de vous faire 
                découvrir l'harmonie parfaite entre saveurs exquises et ambiance raffinée.</p>
            </aside>


            <main>
                <form method="post" action="BD_Reservation.php">
                    <label for="nom">Nom :</label>
                    <input type="text" placeholder="Votre nom" id="nom" name="nom" required>
        
                    <label for="email">E-mail :</label>
                    <input type="email" placeholder="Votre mail" id="email" name="email" required>
        
                    <label for="telephone">Téléphone :</label>
                    <input type="tel" placeholder="Votre numéro" id="telephone" name="telephone" required>
        
                    <label for="date">Date de réservation :</label>
                    <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
        
                    <label for="heure">Heure de réservation :</label>
                    <input type="time" id="heure" name="heure" class="reservation-heure" required min="12:00" max="23:00">

        
                    <label for="personnes">Nombre de personnes :</label>
                    <input type="number" placeholder="0" id="personnes" name="personnes" required>
        
                    <label for="commentaires">Commentaires :</label>
                    <textarea placeholder="maximum 2000 caractére ..." id="commentaires" name="commentaires" rows="4"></textarea>
        
                    <input type="submit" value="Réserver">
                </form>
            </main>
            
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