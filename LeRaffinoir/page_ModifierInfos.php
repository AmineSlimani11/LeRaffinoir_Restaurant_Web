<?php
session_start();

// Vérifie si la variable de session 'idUtilisateur' est définie
if (isset($_SESSION['idUtilisateur'])) {
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $Nom = $_SESSION['nom'];
    $Prenom = $_SESSION['prenom'];
    $Email = $_SESSION['email'];
    $Telephone = $_SESSION['telephone'];
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
    <title>Modifier mes informations</title>
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
                        <?php if ($_SESSION['isAdmin'] == 1): ?>
                            <a href="page_Administrateur.php" class="bouton-pour-inscripconnex profile-button">Admin <i class="fas fa-caret-down"></i></a>
                        <?php else: ?>
                            <a href="Page_Profile.php" class="bouton-pour-inscripconnex profile-button">Profile <i class="fas fa-caret-down"></i></a>
                        
                            <div class="dropdown-menu">
                                <ul>
                                    <li ><a href="page_MesReservations.php" class="reservations-item">Mes reservations</a></li>
                                    <li ><a href="page_ModifierInfos.php" class="modifier-info-item">Modifier mes informations</a></li>
                                    <li ><a href="Deconnexion.php" class="deconnexion-item">Se déconnecter</a></li>
                                </ul>
                            </div> 
                        <?php endif; ?>   
                    </li>
                <?php else: ?>
                    <a href="page_Connectez.php" class="bouton-pour-inscripconnex">Connexion</a>
                <?php endif; ?>
            </ul>
        </header>

    <div class="content">
        <h1>Modifier mes informations</h1>
        <form action="Modification_infos.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $Nom ?>" required>

            <label for="prenom">Prenom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $Prenom ?>" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?= $Email ?>" required>

            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" value="<?= $Telephone ?>" required>

            <input type="submit" value="Enregistrer les modifications">
        </form>
    </div>
    <div class="content_mdp">
        <h1>Modifier le mot de passe</h1>
        <form action="Modification_motdepasse.php" method="post">
            <label for="ancienMotDePasse">Ancien mot de passe :</label>
            <input type="password" id="ancienMotDePasse" name="ancienMotDePasse" required>

            <label for="nouveauMotDePasse">Nouveau mot de passe :</label>
            <input type="password" id="nouveauMotDePasse" name="nouveauMotDePasse" required>

            <label for="confirmerNouveauMotDePasse">Confirmer le nouveau mot de passe :</label>
            <input type="password" id="confirmerNouveauMotDePasse" name="confirmerNouveauMotDePasse" required>

            <input type="submit" value="Enregistrer le nouveau mot de passe">
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
