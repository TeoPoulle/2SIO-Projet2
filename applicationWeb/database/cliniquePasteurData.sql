--USE `grp03ClinPasteur` ;
USE `2SIO-Projet2`;

--
-- Déchargement des données de la table `etatinclusion`
--

INSERT INTO `etatinclusion` (`id`, `libelleEtat`) VALUES
(1, 'Inclus'),
(2, 'En cours'),
(3, 'Terminé'),
(4, 'Exclu');

--
-- Déchargement des données de la table `etude`
--

INSERT INTO `etude` (`id`, `nomEtu`, `descEtude`, `idProtocole`, `idQuestionnaire`, `idOrganisme`, `dateDebEtu`, `dateFinEtu`, `idChirResp`) VALUES
(1, 'Etude Cancer Poumon 2020', 'Suivi de patients atteints de cancer du poumon', 2, 1, 1, '2020-01-01', '2024-12-31', 8),
(2, 'Etude Cirrhose Lyon', 'Ancien essai (non utilisé car hors cancer, conservé pour cohérence historique)', 1, 2, 2, '2019-05-15', '2023-12-31', 15),
(3, 'Essai Chirurgie Cancer Rectum', 'Évaluation des résultats post-opératoires en chirurgie rectum', 2, 1, 1, '2022-01-01', '2026-12-31', 4),
(4, 'Protocole RecaRe', 'Essai multicentrique sur la prise en charge du cancer rectum : chirurgie + radiochimiothérapie', 2, 1, 2, '2023-01-01', '2027-12-31', 4),
(5, 'Etude Cancer Sein', 'Essai clinique sur traitements innovants cancer du sein', 2, 6, 3, '2021-01-01', '2025-12-31', 9);

--
-- Déchargement des données de la table `inclusion`
--

INSERT INTO `inclusion` (`id`, `idPatient`, `dateInclusion`, `idEtude`, `idEtat`) VALUES
(1, 1, '2020-03-01', 1, 1),
(2, 4, '2022-08-01', 3, 1),
(3, 4, '2023-02-01', 4, 1),
(4, 5, '2023-04-01', 4, 1),
(5, 6, '2023-06-15', 4, 2),
(6, 7, '2021-03-20', 5, 1);

--
-- Déchargement des données de la table `maladie`
--

INSERT INTO `maladie` (`id`, `nomMaladie`) VALUES
(1, 'Cancer du poumon'),
(2, 'Cancer du foie'),
(3, 'Cancer du rectum'),
(4, 'Cancer du rein'),
(5, 'Cancer du sein');

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `nomPersonnels`, `prenomPersonnels`, `idSpecialite`, `idService`, `idRole`) VALUES
(1, 'Durand', 'Paul', 1, 1, 1),
(2, 'Bernard', 'Sophie', 2, 2, 2),
(3, 'Garcia', 'Elena', 3, 3, 2),
(4, 'Lefevre', 'Antoine', 4, 4, 4),
(5, 'Marchand', 'Isabelle', 5, 5, 5),
(6, 'Rousseau', 'Marie', 1, 1, 6),
(7, 'Fontaine', 'Aude', 1, 1, 7),
(8, 'Petitjean', 'Marc', 1, 1, 8),
(9, 'Devereaux', 'Claire', 4, 4, 9),
(10, 'Mercier', 'Thomas', 2, 2, 10),
(11, 'Legrand', 'Sophie', 3, 3, 11),
(12, 'Tessier', 'Béatrice', 4, 4, 12),
(13, 'Blanchard', 'Nathalie', 1, 1, 13),
(14, 'Collet', 'Julien', 1, 1, 14),
(15, 'Moreau', 'Dominique', 2, 2, 15);

--
-- Déchargement des données de la table `organe`
--

INSERT INTO `organe` (`id`, `nomOrgane`) VALUES
(1, 'Poumon'),
(2, 'Foie'),
(3, 'Rectum'),
(4, 'Rein'),
(5, 'Sein');

--
-- Déchargement des données de la table `organisme`
--

INSERT INTO `organisme` (`id`, `nomOrg`) VALUES
(1, 'Institut Pasteur'),
(2, 'CHU Lyon'),
(3, 'INSERM');

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nomPat`, `prenomPat`, `dateNaisPat`, `sexe`, `numDossierClinique`) VALUES
(1, 'Dupont', 'Jean', '1970-05-12', 'M', 'DCL-0001'),
(2, 'Martin', 'Claire', '1982-08-23', 'F', 'DCL-0002'),
(3, 'Lopez', 'Maria', '1965-11-03', 'F', 'DCL-0003'),
(4, 'Rousseau', 'Camille', '1975-09-14', 'F', 'DCL-0004'),
(5, 'Petit', 'Nicolas', '1980-02-25', 'M', 'DCL-0005'),
(6, 'Fabre', 'Elise', '1968-07-09', 'F', 'DCL-0006'),
(7, 'Durand', 'Sophie', '1977-04-19', 'F', 'DCL-0007');

--
-- Déchargement des données de la table `maladiepatient`
--

INSERT INTO `maladiepatient` (`id`, `idPatient`, `idMaladie`, `dateDiagnostic`, `idStade`, `idOrgane`) VALUES
(1, 1, 1, '2020-02-15', 2, 1),
(2, 2, 2, '2018-06-10', 3, 2),
(3, 3, 4, '2019-12-20', 4, 4),
(4, 4, 3, '2022-07-10', 2, 3),
(5, 5, 3, '2023-03-12', 3, 3),
(6, 6, 3, '2023-05-22', 2, 3),
(7, 7, 5, '2021-09-01', 1, 5);

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelleRole`) VALUES
(1, 'Chef de service'),
(2, 'Médecin référent'),
(3, 'Attaché de recherche clinique'),
(4, 'Chirurgien digestif'),
(5, 'Oncologue mammaire'),
(6, 'Infirmière'),
(7, 'Assistante médicale'),
(8, 'Chirurgien thoracique'),
(9, 'Chirurgien oncologique'),
(10, 'Anesthésiste'),
(11, 'Radiologue'),
(12, 'Pathologiste'),
(13, 'Infirmière spécialisée'),
(14, 'Assistante de recherche clinique'),
(15, 'Chirurgien vasculaire');

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `libelleServ`) VALUES
(1, 'Service Oncologie'),
(2, 'Service Hépato'),
(3, 'Service Néphrologie'),
(4, 'Service Chirurgie Digestive'),
(5, 'Service Sénologie');

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `libelleSpec`) VALUES
(1, 'Oncologie'),
(2, 'Hépato-gastroentérologie'),
(3, 'Néphrologie'),
(4, 'Chirurgie digestive'),
(5, 'Oncologie mammaire');

--
-- Déchargement des données de la table `stade`
--

INSERT INTO `stade` (`id`, `nomStade`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV');

--
-- Déchargement des données de la table `protocole`
--

INSERT INTO `protocole` (`id`, `libelleProtocole`) VALUES
(1, 'Étude observationnelle'),
(2, 'Essai clinique randomisé'),
(3, 'Étude prospective');

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `libelleQuestionnaire`, `descQuestionnaire`) VALUES
(1, 'QLQ-C30', "Questionnaire standardise developpe par l'EORTC (European Organisation for Research and Treatment of Cancer). Il est concu pour evaluer la qualite de vie des patients atteints de cancer, quel que soit le type ou le stade de la maladie."),
(2, 'QLQ-CR29', "Module specifique au cancer colorectal qui complete le QLQ-C30. Il a ete developpe par l’EORTC pour evaluer plus en detail la qualite de vie des patients atteints d’un cancer colorectal, qu’il s’agisse d’un cancer du colon ou du rectum."),
(3, 'ReCaRe', "Programme ou protocole de rehabilitation globale destine aux patients traites pour un cancer du rectum, notamment ceux ayant subi une chirurgie."),
(4, 'CANTO', "Module qui permet d’etudier les toxicites chroniques (physiques, psychologiques, sociales) liees aux traitements du cancer du sein afin de developper une medecine personnalisee de l’apres-cancer."),
(5, 'TAILORx', "Etude internationale sur l'utilite des tests genomiques pour eviter une chimiotherapie inutile."),
(6, 'Qufora', NULL);

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `libelleTheme`) VALUES
(1, "Capacites physiques"),
(2, "Activites quotidiennes et role"),
(3, "Fonction cognitive"),
(4, "Emotions"),
(5, "Relations sociales"),
(6, "Sommeil et energie"),
(7, "Symptômes physiques"),
(8, "Bien-etre general"),
(9, "Utilisation et facilite d''emploi"),
(10, "Tolerance et confort"),
(11, "Efficacite"),
(12, "Autonomie et impact sur la vie quotidienne"),
(13, "Satisfaction et suivi"),
(14, "Toxicites physiques liees aux traitements"),
(15, "Fonctions cognitives"),
(16, "Image corporelle et feminite"),
(17, "Vie sexuelle"),
(18, "Soutien social et vecu global"),
(19, "Qualite de vie globale");

--
-- Déchargement des données de la table `detailquestionnaire`
--

INSERT INTO `detailquestionnaire` (`id`, `idQuestionnaire`, `idTheme`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 6, 9),
(10, 6, 10),
(11, 6, 11),
(12, 6, 12),
(13, 6, 13),
(14, 5, 14),
(15, 5, 15),
(16, 5, 16),
(17, 5, 17),
(18, 5, 2),
(19, 5, 18),
(20, 5, 19);

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `numQuestion`, `idTheme`, `libelleQuestion`) VALUES
(1, 1, 1, "J'ai eu des difficultes a marcher sur de courtes distances."),
(2, 2, 1, "J'ai eu du mal a porter des objets ordinaires (sac, courses, etc.)."),
(3, 3, 1, "Je me suis senti(e) limite(e) pour monter des escaliers."),
(4, 4, 1, "Mon etat physique m'a empeche(e) de faire mes activites habituelles."),
(5, 1, 2, "J'ai eu du mal a accomplir mes taches professionnelles ou scolaires."),
(6, 2, 2, "Mes responsabilites domestiques (menage, courses, etc.) ont ete difficiles a gerer."),
(7, 3, 2, "Je n'ai pas pu mener mes activites comme je le fais habituellement."),
(8, 1, 3, "J'ai eu du mal a me concentrer."),
(9, 2, 3, "J'ai eu des difficultes a me souvenir d'informations recentes."),
(10, 3, 3, "Je me suis senti(e) mentalement plus lent(e) que d'habitude."),
(11, 1, 4, "Je me suis senti(e) inquiet(ete) ou anxieux(se)."),
(12, 2, 4, "Je me suis senti(e) triste ou decourage(e)."),
(13, 3, 4, "Je me suis senti(e) tendu(e) ou sous pression."),
(14, 4, 4, "Je me suis senti(e) facilement irritable."),
(15, 1, 5, "Mon etat de sante a reduit mes activites sociales."),
(16, 2, 5, "J'ai eu moins d'interactions avec mes proches."),
(17, 3, 5, "J'ai eu le sentiment d'etre isole(e) ou mis(e) à l'ecart."),
(18, 1, 6, "J'ai eu des difficultes a m'endormir ou a rester endormi(e)."),
(19, 2, 6, "Je me suis senti(e) fatigue(e) des le matin."),
(20, 3, 6, "Mon niveau d'energie etait faible la plupart du temps."),
(21, 1, 7, "J'ai ressenti des douleurs qui genaient mes activites."),
(22, 2, 7, "J'ai eu des nausees."),
(23, 3, 7, "J'ai eu des problemes intestinaux (constipation ou diarrhee)."),
(24, 4, 7, "J'ai ete essouffle(e) lors d'activites legeres."),
(25, 5, 7, "J'ai eu une diminution notable de mon appetit."),
(26, 1, 8, "Je me suis senti(e) satisfait(e) de mon état de sante global."),
(27, 2, 8, "Je me suis senti(e) capable de faire face a ma situation."),
(28, 3, 8, "Je me suis senti(e) en confiance dans ma capacite a recuperer."),
(29, 4, 8, "J'ai eu la sensation que ma sante influencait negativement ma qualite de vie."),
(30, 5, 8, "Globalement, ma qualite de vie cette semaine a ete bonne."),
(31, 1, 9, "Je trouve le dispositif facile a installer et a utiliser."),
(32, 2, 9, "Les instructions d'utilisation sont claires et comprehensibles."),
(33, 3, 9, "Je peux utiliser le dispositif seul(e) sans aide."),
(34, 4, 9, "L'entretien et le nettoyage du dispositif sont simples."),
(35, 1, 10, "L'utilisation du dispositif est confortable."),
(36, 2, 10, "Je n'ai pas ressenti de douleur ou de gene lors de l'utilisation."),
(37, 3, 10, "Les effets secondaires eventuels sont minimes ou acceptables."),
(38, 4, 10, "Je me sens en securite lors de l'utilisation du dispositif."),
(39, 1, 11, "Le dispositif aide a regulariser mes selles."),
(40, 2, 11, "Il reduit la frequence des accidents ou fuites intestinales."),
(41, 3, 11, "Il ameliore mon confort digestif global."),
(42, 4, 11, "J'ai constate une amelioration de mon rythme intestinal depuis que je l'utilise."),
(43, 1, 12, "Je peux organiser mon emploi du temps sans etre limite(e) par mes troubles intestinaux."),
(44, 2, 12, "L'utilisation du dispositif me permet de rester autonome."),
(45, 3, 12, "Je me sens plus confiant(e) pour sortir ou voyager."),
(46, 4, 12, "Mon sommeil ou mes activites quotidiennes sont moins perturbes par mes symptemes."),
(47, 1, 13, "Je suis satisfait(e) des resultats obtenus avec ce dispositif."),
(48, 2, 13, "Je recommanderais ce dispositif a d'autres patients ayant des troubles similaires."),
(49, 3, 13, "Le suivi medical associe a l'utilisation du dispositif est satisfaisant."),
(50, 4, 13, "Globalement, ce dispositif a ameliore ma qualité de vie."),
(51, 1, 14, "J'ai ressenti de la fatigue inhabituelle."),
(52, 2, 14, "J'ai eu des douleurs musculaires ou articulaires."),
(53, 3, 14, "J'ai eprouve des fourmillements ou engourdissements (mains/pieds)."),
(54, 4, 14, "J'ai eu des troubles digestifs (nausees, diarrhee, constipation)."),
(55, 5, 14, "J'ai eu des problemes cutanes (secheresse, rougeurs, demangeaisons)."),
(56, 6, 14, "J'ai ressenti une gene ou douleur au niveau du sein traite."),
(57, 1, 15, "J'ai eu du mal a me concentrer."),
(58, 2, 15, "J'ai eu des difficultes a me souvenir d'informations recentes."),
(59, 3, 15, "Je me suis senti(e) mentalement plus lent(e) que d'habitude."),
(60, 1, 16, "Je me suis senti(e) a l'aise avec mon corps."),
(61, 2, 16, "Les changements physiques lies au traitement m'ont affecte(e)."),
(62, 3, 16, "J'ai eu du mal a accepter les transformations de mon apparence."),
(63, 1, 17, "J'ai ressenti une diminution du desir sexuel."),
(64, 2, 17, "J'ai eprouve des douleurs ou une gene lors des relations sexuelles."),
(65, 3, 17, "Mon image corporelle a influence ma vie intime."),
(66, 1, 18, "Je me sens soutenu(e) par mon entourage."),
(67, 2, 18, "Je me suis senti(e) compris(e) par les professionnels de sante."),
(68, 3, 18, "Je me suis senti(e) seul(e) face a mes difficultes."),
(69, 1, 19, "Mon etat de sante actuel est satisfaisant."),
(70, 2, 19, "Ma qualite de vie s'est amelioree depuis la fin des traitements."),
(71, 3, 19, "J'arrive a trouver un nouvel equilibre dans ma vie.");

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `numQuestion`, `idInclusion`, `dateReponse`, `dateConsult`) VALUES
(1, 1, 1, '2020-04-15', NULL),
(2, 2, 1, '2020-04-15', NULL),
(3, 3, 1, '2020-04-15', NULL),
(4, 4, 1, '2020-04-15', NULL),
(5, 5, 1, '2020-04-15', NULL),
(6, 6, 1, '2020-04-15', NULL),
(7, 7, 1, '2020-04-15', NULL),
(8, 8, 1, '2020-04-15', NULL),
(9, 9, 1, '2020-04-15', NULL),
(10, 10, 1, '2020-04-15', NULL),
(11, 11, 1, '2020-04-15', NULL),
(12, 12, 1, '2020-04-15', NULL),
(13, 13, 1, '2020-04-15', NULL),
(14, 14, 1, '2020-04-15', NULL),
(15, 15, 1, '2020-04-15', NULL),
(16, 16, 1, '2020-04-15', NULL),
(17, 17, 1, '2020-04-15', NULL),
(18, 18, 1, '2020-04-15', NULL),
(19, 19, 1, '2020-04-15', NULL),
(20, 20, 1, '2020-04-15', NULL),
(21, 21, 1, '2020-04-15', NULL),
(22, 22, 1, '2020-04-15', NULL),
(23, 23, 1, '2020-04-15', NULL),
(24, 24, 1, '2020-04-15', NULL),
(25, 25, 1, '2020-04-15', NULL),
(26, 26, 1, '2020-04-15', NULL),
(27, 27, 1, '2020-04-15', NULL),
(28, 28, 1, '2020-04-15', NULL),
(29, 29, 1, '2020-04-15', NULL),
(30, 30, 1, '2020-04-15', NULL),
(31, 1, 2, '2022-09-20', NULL),
(32, 2, 2, '2022-09-20', NULL),
(33, 3, 2, '2022-09-20', NULL),
(34, 4, 2, '2022-09-20', NULL),
(35, 5, 2, '2022-09-20', NULL),
(36, 6, 2, '2022-09-20', NULL),
(37, 7, 2, '2022-09-20', NULL),
(38, 8, 2, '2022-09-20', NULL),
(39, 9, 2, '2022-09-20', NULL),
(40, 10, 2, '2022-09-20', NULL),
(41, 11, 2, '2022-09-20', NULL),
(42, 12, 2, '2022-09-20', NULL),
(43, 13, 2, '2022-09-20', NULL),
(44, 14, 2, '2022-09-20', NULL),
(45, 15, 2, '2022-09-20', NULL),
(46, 16, 2, '2022-09-20', NULL),
(47, 17, 2, '2022-09-20', NULL),
(48, 18, 2, '2022-09-20', NULL),
(49, 19, 2, '2022-09-20', NULL),
(50, 20, 2, '2022-09-20', NULL),
(51, 21, 2, '2022-09-20', NULL),
(52, 22, 2, '2022-09-20', NULL),
(53, 23, 2, '2022-09-20', NULL),
(54, 24, 2, '2022-09-20', NULL),
(55, 25, 2, '2022-09-20', NULL),
(56, 26, 2, '2022-09-20', NULL),
(57, 27, 2, '2022-09-20', NULL),
(58, 28, 2, '2022-09-20', NULL),
(59, 29, 2, '2022-09-20', NULL),
(60, 30, 2, '2022-09-20', NULL),
(61, 1, 4, '2023-04-15', NULL),
(62, 2, 4, '2023-04-15', NULL),
(63, 3, 4, '2023-04-15', NULL),
(64, 4, 4, '2023-04-15', NULL),
(65, 5, 4, '2023-04-15', NULL),
(66, 6, 4, '2023-04-15', NULL),
(67, 7, 4, '2023-04-15', NULL),
(68, 8, 4, '2023-04-15', NULL),
(69, 9, 4, '2023-04-15', NULL),
(70, 10, 4, '2023-04-15', NULL),
(71, 11, 4, '2023-04-15', NULL),
(72, 12, 4, '2023-04-15', NULL),
(73, 13, 4, '2023-04-15', NULL),
(74, 14, 4, '2023-04-15', NULL),
(75, 15, 4, '2023-04-15', NULL),
(76, 16, 4, '2023-04-15', NULL),
(77, 17, 4, '2023-04-15', NULL),
(78, 18, 4, '2023-04-15', NULL),
(79, 19, 4, '2023-04-15', NULL),
(80, 20, 4, '2023-04-15', NULL);

--
-- Déchargement des données de la table `detailreponse`
--

INSERT INTO `detailreponse` (`id`, `idReponse`, `idQuestion`, `idValeurReponse`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 3, 3),
(4, 4, 4, 4),
(5, 5, 5, 5),
(6, 6, 6, 1),
(7, 7, 7, 2),
(8, 8, 8, 3),
(9, 9, 9, 4),
(10, 10, 10, 5),
(11, 11, 11, 1),
(12, 12, 12, 2),
(13, 13, 13, 3),
(14, 14, 14, 4),
(15, 15, 15, 5),
(16, 16, 16, 1),
(17, 17, 17, 2),
(18, 18, 18, 3),
(19, 19, 19, 4),
(20, 20, 20, 5),
(21, 21, 21, 1),
(22, 22, 22, 2),
(23, 23, 23, 3),
(24, 24, 24, 4),
(25, 25, 25, 5),
(26, 26, 26, 1),
(27, 27, 27, 2),
(28, 28, 28, 3),
(29, 29, 29, 4),
(30, 30, 30, 5),
(31, 31, 1, 1),
(32, 32, 2, 2),
(33, 33, 3, 3),
(34, 34, 4, 4),
(35, 35, 5, 5),
(36, 36, 6, 1),
(37, 37, 7, 2),
(38, 38, 8, 3),
(39, 39, 9, 4),
(40, 40, 10, 5),
(41, 41, 11, 1),
(42, 42, 12, 2),
(43, 43, 13, 3),
(44, 44, 14, 4),
(45, 45, 15, 5),
(46, 46, 16, 1),
(47, 47, 17, 2),
(48, 48, 18, 3),
(49, 49, 19, 4),
(50, 50, 20, 5),
(51, 51, 21, 1),
(52, 52, 22, 2),
(53, 53, 23, 3),
(54, 54, 24, 4),
(55, 55, 25, 5),
(56, 56, 26, 1),
(57, 57, 27, 2),
(58, 58, 28, 3),
(59, 59, 29, 4),
(60, 60, 30, 5),
(61, 61, 1, 1),
(62, 62, 2, 2),
(63, 63, 3, 3),
(64, 64, 4, 4),
(65, 65, 5, 5),
(66, 66, 6, 1),
(67, 67, 7, 2),
(68, 68, 8, 3),
(69, 69, 9, 4),
(70, 70, 10, 5),
(71, 71, 11, 1),
(72, 72, 12, 2),
(73, 73, 13, 3),
(74, 74, 14, 4),
(75, 75, 15, 5),
(76, 76, 16, 1),
(77, 77, 17, 2),
(78, 78, 18, 3),
(79, 79, 19, 4),
(80, 80, 20, 5);

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id`, `idChirResp`, `idInclusion`, `dateConsult`) VALUES
(1, 8, 1, '2026-12-10'),
(2, 4, 2, '2026-09-15'),
(3, 4, 3, '2023-03-01'),
(4, 4, 4, '2023-05-10'),
(5, 4, 5, '2023-07-20'),
(6, 9, 6, '2021-04-25'),
(7, 8, 1, '2027-07-15'),
(8, 4, 2, '2022-11-20'),
(9, 4, 3, '2026-01-12'),
(10, 4, 4, '2023-06-08'),
(11, 4, 5, '2023-08-30'),
(12, 9, 6, '2021-06-10');

--
-- Déchargement des données de la table `valeurreponse`
--
INSERT INTO `valeurreponse` (`id`, `libelleValeur`) VALUES
(1, 'Pas du tout'),
(2, 'Un peu'),
(3, 'Moderement'),
(4, 'Beaucoup'),
(5, 'Extremement');
