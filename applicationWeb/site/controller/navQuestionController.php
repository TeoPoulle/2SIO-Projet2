<?php

require_once 'model/c_questionnaireDAO.php';
require_once 'model/c_optionDAO.php';
require_once 'controller/questionnaireController.php';

$action = $_GET['chx2'] ?? '';

switch ($action) {
    case 'aCompleter':
        include 'view/v_header.php';
        /* Pour les test, on suppose que le patient authentifié est le 1 
    A remplacer par le patient connecté quand ce sera fait
    if (!empty($_POST['idPatient'])) { 
      
      $idPatient = intval($_POST['idPatient']);
      $questionnaireDAO = new QuestionnaireDAO();
      $qListe = $questionnaireDAO->getQuestionnairesACompleter($idPatient);
      require 'view/v_listeQuestionnaire.php';
      exit;
    } */
        $idPatient = 1;
        $questionnaireDAO = new QuestionnaireDAO();
        $qListe = $questionnaireDAO->getQuestionnairesACompleter($idPatient);
        require 'view/v_listeQuestionnaire.php';
        include 'view/v_footer.php';
        break;

    case 'remplir':
        include 'view/v_header.php';

        $idPatient = 1; /* Même supposition que pour au dessus, le patient authentifié est le 1 */
        $idQuestionnaire =  intval($_GET['idQuestionnaire']);
        $dateLimite = $_GET['dateLimite'];
        $questionnaireDAO = new QuestionnaireDAO();
        $optionDAO = new OptionDAO();
        $questions = $questionnaireDAO->getQuestionsDuQuestionnaire($idQuestionnaire);
        $questionnaire = $questionnaireDAO->getQuestionnaireById($idQuestionnaire, $idPatient, $dateLimite);
        $options = $optionDAO->getOptions();

        require 'view/v_formQuestionnaire.php';
        include 'view/v_footer.php';
        break;

    case 'verificationReponses':
        include 'view/v_header.php';
        $idPatient = 1; /* Même supposition que pour au dessus, le patient authentifié est le 1 */
        $questionController = new QuestionController();
        $donneesVerification = $questionController->verificationReponses($idPatient);
        $reponses = $donneesVerification['reponses'];
        $questionnaire = $donneesVerification['questionnaire'];
        $idQuestionnaire = $donneesVerification['idQuestionnaire'];
        $dateLimite = $donneesVerification['dateLimite'];
        require 'view/v_verificationReponse.php';
        include 'view/v_footer.php';
        break;

    default:
        include 'view/v_header.php';
        include 'view/v_questionnaire.html';
        include 'view/v_footer.php';
}
