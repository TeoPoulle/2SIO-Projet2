<?php

require_once 'model/c_connexion.php';
require_once 'model/c_questionnaire.php';
require_once 'model/c_question.php';

class QuestionnaireDAO {

    public function getQuestionnairesACompleter(int $idInclusion): array {
        $pdo = Connexion::getConnexion();
        $stmt = $pdo->prepare('CALL QuestionnaireACompleter(:idInclusion)');
        $stmt->bindParam(':idInclusion', $idInclusion, PDO::PARAM_INT);
        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $qListe = [];
        foreach ($resultats as $row) {
            $questionnaire = new Questionnaire(
                $row['id'],
                $row['libelleQuestionnaire'],
                $row['descQuestionnaire'],
                $row['dateConsult']
            );
            $qListe[] = $questionnaire;
        }
        
        $stmt->closeCursor();
        return $qListe;
    }

    public function getQuestionsDuQuestionnaire(int $idQuestionnaire): array {
        $pdo = Connexion::getConnexion();
        $stmt = $pdo->prepare('CALL QuestionsDuQuestionnaire(:idQuestionnaire)');
        $stmt->bindParam(':idQuestionnaire', $idQuestionnaire, PDO::PARAM_INT);
        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $questions = [];
        foreach ($resultats as $row) {
            $question = new Question(
                $row['id'],
                $row['numQuestion'],
                $row['idTheme'],
                $row['libelleTheme'],
                $row['libelleQuestion']
            );
            $questions[] = $question;
        }

        $stmt->closeCursor();
        return $questions;
    }

    public function getQuestionnaireById(int $idQuestionnaire, int $idInclusion, string $dateLimite): Questionnaire{
        $pdo = Connexion::getConnexion();
        $stmt = $pdo->prepare('CALL QuestionnaireById(:idQuestionnaire, :idInclusion, :dateLimite)');
        $stmt->bindParam(':idQuestionnaire', $idQuestionnaire, PDO::PARAM_INT);
        $stmt->bindParam(':idInclusion', $idInclusion, PDO::PARAM_INT);
        $stmt->bindParam(':dateLimite', $dateLimite, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Questionnaire(
            $resultat['id'],
            $resultat['libelleQuestionnaire'],
            $resultat['descQuestionnaire'],
            $resultat['dateConsult']
        );
    }
}
