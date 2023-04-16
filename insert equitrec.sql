INSERT INTO `competition` (`id`, `nom`, `date`, `ville`, `cp`, `adresse`) VALUES (1, 'Equitest', '2023-04-17', 'Lyon 8e', '69008', 'rue du test');
INSERT INTO `competition` (`id`, `nom`, `date`, `ville`, `cp`, `adresse`) VALUES (2, 'Equitrou', '2023-05-17', 'Lyon 5e', '69005', 'rue du test bis');

INSERT INTO `epreuve` (`id`, `nom`, `commentaire`) VALUES ('1', 'POR', 'Parcours d’Orientation et de Régularité');
INSERT INTO `epreuve` (`id`, `nom`, `commentaire`) VALUES ('2', 'PTV', 'Parcours en Terrain Varié');
INSERT INTO `epreuve` (`id`, `nom`, `commentaire`) VALUES ('3', 'MA', 'Maîtrise des Allures');

INSERT INTO `obstacle` (`id`, `note_total_id`, `nom`) VALUES ('1', NULL, 'Barrière');
INSERT INTO `obstacle` (`id`, `note_total_id`, `nom`) VALUES ('2', NULL, 'Bordure Maraîchère en Selle');
INSERT INTO `obstacle` (`id`, `note_total_id`, `nom`) VALUES ('3', NULL, 'Branches Basses en Selle');

INSERT INTO `parametrer` (`id`, `hauteur`, `largeur`, `temps_max`, `pente`, `front`, `informations`) VALUES ('1', '1,2', '2', NULL, NULL, NULL, 'Ouvrir et refermer une porte en restant à cheval');
INSERT INTO `parametrer` (`id`, `hauteur`, `largeur`, `temps_max`, `pente`, `front`, `informations`) VALUES ('2', '', '0,70', NULL, NULL, NULL, 'Respect du dispositif, dans l’allure la plus élevée');
INSERT INTO `parametrer` (`id`, `hauteur`, `largeur`, `temps_max`, `pente`, `front`, `informations`) VALUES ('3', '', NULL, NULL, NULL, NULL, 'Respect du tracé et de la zone d’évolution dans l’allure la plus élevée.');

INSERT INTO `epreuve_competition` (`epreuve_id`, `competition_id`) VALUES ('1', '2');
INSERT INTO `epreuve_competition` (`epreuve_id`, `competition_id`) VALUES ('2', '2');

INSERT INTO `epreuve_obstacle` (`epreuve_id`, `obstacle_id`) VALUES ('2', '1');
INSERT INTO `epreuve_obstacle` (`epreuve_id`, `obstacle_id`) VALUES ('2', '2');
INSERT INTO `epreuve_obstacle` (`epreuve_id`, `obstacle_id`) VALUES ('2', '3');


INSERT INTO `parametrer_obstacle` (`parametrer_id`, `obstacle_id`) VALUES ('1', '1');
INSERT INTO `parametrer_obstacle` (`parametrer_id`, `obstacle_id`) VALUES ('2', '2');
INSERT INTO `parametrer_obstacle` (`parametrer_id`, `obstacle_id`) VALUES ('3', '3');

INSERT INTO cavalier (id, nom, prenom, license, dossard) VALUES
(1, 'Monkey D', 'Luffy', 11223, 11),
(2, 'Roronoa', 'Zoro', 22334, 22),
(3, 'Tony Tony', 'Chopper', 33445, 33),
(4, 'Nico', 'Robin', 44556, 44),
(5, 'Vinsmoke', 'Sanji', 55667, 55),
(6, 'Le Roux', 'Shanks', 66778, 66),
(7, 'Beckman', 'Ben', 77889, 77);

INSERT INTO niveau (id, cavalier_id, nom) VALUES
(1, 1, 'Club 1'),
(2, 2, 'Amateur 3'),
(3, 3, 'Amateur Elite'),
(4, 4, 'Club Elite'),
(5, 5, 'Amateur 1'),
(6, 6, 'Amateur 2'),
(7, 7, 'Club Poney 2');

INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('2', '1');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('2', '2');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('2', '3');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('2', '5');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('2', '6');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('1', '1');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('1', '7');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('1', '6');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('1', '4');
INSERT INTO `competition_cavalier` (`competition_id`, `cavalier_id`) VALUES ('1', '3');