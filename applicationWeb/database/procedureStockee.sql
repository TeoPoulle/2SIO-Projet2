USE `SIO2-projet2`;
 
-- CREATE OR REPLACE PROCEDURE/FUNCTION/TRIGGER 'nom'


-- Récupération des questionnaires des rdv à venir afin de permettre au patient de les sélectionner
-- et de les remplir avant rdv
CREATE OR REPLACE PROCEDURE `SIO2-projet2`.`QuestionnaireACompleter`(IN p_idPatient INT)
SELECT Q.id, Q.libelleQuestionnaire, Q.descQuestionnaire, C.dateConsult
FROM consultation AS C
JOIN inclusion AS I ON I.id = C.idInclusion
JOIN patient AS P ON P.id = I.idPatient
JOIN etude AS E ON E.id = I.idEtude
JOIN questionnaire AS Q ON Q.id = E.idQuestionnaire
WHERE P.id = p_idPatient
  AND C.dateConsult > CURRENT_DATE()
ORDER BY C.dateConsult ASC;

-- Affichage des questions d'un questionnaire de manière dynamique
CREATE OR REPLACE PROCEDURE `SIO2-projet2`.`QuestionsDuQuestionnaire`(IN p_idQuestionnaire INT)
SELECT Q.id, Q.numQuestion, Q.idTheme, T.libelleTheme, Q.libelleQuestion
FROM question AS Q
JOIN theme AS T ON T.id = Q.idTheme
JOIN detailquestionnaire AS DQ ON T.id = DQ.idTheme
JOIN questionnaire AS QR ON QR.id = DQ.idQuestionnaire
WHERE QR.id = p_idQuestionnaire
ORDER BY Q.idTheme ASC, Q.numQuestion ASC;

-- Récupération d'un questionnaire par rapport à son id
CREATE OR REPLACE PROCEDURE `SIO2-projet2`.`QuestionnaireById`(IN p_idQuestionnaire INT, IN p_idPatient INT, IN p_dateLimite DATE)
SELECT Q.id, Q.libelleQuestionnaire, Q.descQuestionnaire, C.dateConsult
FROM consultation AS C
JOIN inclusion AS I ON I.id = C.idInclusion
JOIN patient AS P ON P.id = I.idPatient
JOIN etude AS E ON E.id = I.idEtude
JOIN questionnaire AS Q ON Q.id = E.idQuestionnaire
WHERE Q.id = p_idQuestionnaire AND P.id = p_idPatient AND C.dateConsult = p_dateLimite
ORDER BY C.dateConsult ASC;

