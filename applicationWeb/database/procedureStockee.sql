--USE `grp03ClinPasteur` ;
USE `2SIO-Projet2`;

-- CREATE OR REPLACE PROCEDURE/FUNCTION/TRIGGER 'nom'


-- Récupération des questionnaires des rdv à venir afin de permettre au patient de les sélectionner
-- et de les remplir avant rdv
DELIMITER //
CREATE OR REPLACE PROCEDURE `QuestionnaireACompleter`(IN p_idInclusion INT)
BEGIN
SELECT Q.id, Q.libelleQuestionnaire, Q.descQuestionnaire, C.dateConsult
FROM consultation AS C
JOIN inclusion AS I ON I.id = C.idInclusion
JOIN patient AS P ON P.id = I.idPatient
JOIN etude AS E ON E.id = I.idEtude
JOIN questionnaire AS Q ON Q.id = E.idQuestionnaire
WHERE I.id = p_idInclusion
  AND C.dateConsult > CURRENT_DATE()
  AND NOT EXISTS (
    SELECT 1
    FROM reponse AS R
    WHERE R.idInclusion = I.id
      AND R.dateConsult = C.dateConsult
  )
ORDER BY C.dateConsult ASC;
END //
DELIMITER ;

-- Affichage des questions d'un questionnaire de manière dynamique
DELIMITER //
CREATE OR REPLACE PROCEDURE `QuestionsDuQuestionnaire`(IN p_idQuestionnaire INT)
BEGIN
SELECT Q.id, Q.numQuestion, Q.idTheme, T.libelleTheme, Q.libelleQuestion
FROM question AS Q
JOIN theme AS T ON T.id = Q.idTheme
JOIN detailquestionnaire AS DQ ON T.id = DQ.idTheme
JOIN questionnaire AS QR ON QR.id = DQ.idQuestionnaire
WHERE QR.id = p_idQuestionnaire
ORDER BY Q.idTheme ASC, Q.numQuestion ASC;
END //
DELIMITER ;

-- Récupération d'un questionnaire par rapport à son id
DELIMITER //
CREATE OR REPLACE PROCEDURE `QuestionnaireById`(IN p_idQuestionnaire INT, IN p_idInclusion INT, IN p_dateLimite DATE)
BEGIN
SELECT Q.id, Q.libelleQuestionnaire, Q.descQuestionnaire, C.dateConsult
FROM consultation AS C
JOIN inclusion AS I ON I.id = C.idInclusion
JOIN patient AS P ON P.id = I.idPatient
JOIN etude AS E ON E.id = I.idEtude
JOIN questionnaire AS Q ON Q.id = E.idQuestionnaire
WHERE Q.id = p_idQuestionnaire AND I.id = p_idInclusion AND C.dateConsult = p_dateLimite
ORDER BY C.dateConsult ASC;
END //
DELIMITER ;

-- Insérer des réponses dans la table réponse et detailreponse
DELIMITER //
CREATE OR REPLACE PROCEDURE `InsertReponse` (IN p_numQuestion INT, IN p_idInclusion INT, IN p_dateReponse DATE, IN p_dateConsult DATE, IN p_idValeurReponse INT)
BEGIN
DECLARE v_idReponse INT;
INSERT INTO `reponse` (`numQuestion`, `idInclusion`, `dateReponse`, `dateConsult`) VALUES (p_numQuestion, p_idInclusion, p_dateReponse, p_dateConsult);

SELECT R.id INTO v_idReponse FROM reponse AS R 
WHERE R.numQuestion = p_numQuestion 
AND R.idInclusion = p_idInclusion 
AND R.dateReponse = p_dateReponse 
AND R.dateConsult = p_dateConsult;

INSERT INTO `detailreponse` (`idReponse`, `idQuestion`, `idValeurReponse`) VALUES (v_idReponse, p_numQuestion, p_idValeurReponse);
END //
DELIMITER ;
