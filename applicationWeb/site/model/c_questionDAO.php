<?php

require_once 'model/c_connexion.php';
require_once 'model/c_questionnaire.php';
require_once 'model/c_question.php';

class QuestionDAO {
  public static function getQuestionById(int $id): Question {
    $pdo = Connexion::getConnexion();
    $stmt = $pdo->prepare('SELECT Q.id, numQuestion, idTheme, libelleTheme, libelleQuestion FROM question AS Q 
                           JOIN theme AS T ON Q.idTheme = T.id WHERE Q.id=:id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $question = new Question(
      $resultat['id'],
      $resultat['numQuestion'],
      $resultat['idTheme'],
      $resultat['libelleTheme'],
      $resultat['libelleQuestion']
    );
    return $question;
  }

  public static function getQuestionByIndex($numQuestion, $idTheme) {
    $pdo = Connexion::getConnexion();
    $stmt = $pdo->prepare('SELECT Q.id, numQuestion, idTheme, libelleTheme, libelleQuestion FROM question AS Q 
                           JOIN theme AS T ON Q.idTheme = T.id WHERE numQuestion=:numQuestion AND idTheme=:idTheme');
    $stmt->bindParam(':numQuestion', $numQuestion, PDO::PARAM_INT);
    $stmt->bindParam(':idTheme', $idTheme, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $question = new Question(
      $resultat['id'],
      $resultat['numQuestion'],
      $resultat['idTheme'],
      $resultat['libelleTheme'],
      $resultat['libelleQuestion']
    );
    return $question;
  }
}