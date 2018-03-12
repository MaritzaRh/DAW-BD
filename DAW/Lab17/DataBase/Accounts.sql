SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `Personal_Info` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `S_Lastname` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


INSERT INTO `Personal_Info` (`id_user`, `Name`, `Lastname`, `S_Lastname`, `Email`, `Address`, `Phone`) VALUES
(1, 'Maritza', 'Rosales', 'Hernandez', 'm123@hotmail.com', 'Epigmenio Gonzales ', '987654321'),
(2, 'Luis', 'Rodriguez', 'Naranjo', 'lrn@yahoo.com', 'Pie de la cuesta', '123456789'),
(3, 'Jorge ', 'Ramos', 'Costa', 'algo@gmail.com', 'Bernardo Quintana', '09827341'),
(4, 'Alejandra', 'Robles', 'Jimenez', 'ale@gmail.com', 'Platero', '08396124'),
(5, 'Ana', 'Diego', 'Reyes', 'anita@hotmail.com', 'Tejeda', '28397146'),
(6, 'Juanita', 'Hidalgo', 'Sanchez', 'juana@hotmail.com', 'Juriquilla', '15293648');
