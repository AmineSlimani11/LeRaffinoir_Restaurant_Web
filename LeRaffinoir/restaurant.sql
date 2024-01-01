drop database if exists restaurant;
create database restaurant;
use restaurant;


CREATE TABLE `Utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Telephone` int(11) DEFAULT NULL,
  `isAdmin` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Utilisateur` (`idUtilisateur`, `Nom`, `Prenom`, `Email`, `Password`, `Telephone`, `isAdmin`) VALUES
(1, 'aaa', 'ssss', 'slimanimedamine8@gmail.com', '$2y$10$qoduK9Fzh6UvKGpCkJi1o.ZcNFgWCS/6v09He44JoZLwUUCkra8Sy', 674658393, 0),
(2, 'Amine', 'Slimani', 'asmzldz12@gmail.com', '$2y$10$uuPddf4ud/xXlyyeweJQYuaB3loNBwXvk9x7aQ3XxBd1Pg1i5sKNO', 674658393, 1);

CREATE TABLE `Contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `Message` varchar(2500) NOT NULL,
  PRIMARY KEY (`idContact`),
  FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Contact` (`idContact`, `idUtilisateur`, `Message`) VALUES
(1, 1, 'HELLO'),
(2, 2, 'HELLO');

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `Date_Reservation` date NOT NULL,
  `Heure_Reservation` varchar(5) NOT NULL,
  `Nombre_Personnes` smallint(6) NOT NULL,
  `Commentaires` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`idReservation`),
  FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `reservation` (`idReservation`, `idUtilisateur`, `Date_Reservation`, `Heure_Reservation`, `Nombre_Personnes`, `Commentaires`) VALUES
(1, 1, '2023-11-09', '14:05', 2, 'dsfferf'),
(2, 2, '2023-11-29', '19:30', 2, 'à coté de la fenetre ');


ALTER TABLE `Contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `Utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


