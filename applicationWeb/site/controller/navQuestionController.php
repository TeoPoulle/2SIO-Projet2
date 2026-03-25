<?php

require_once 'model/c_questionnaireDAO.php';
require_once 'model/c_optionDAO.php';
require_once 'controller/questionnaireController.php';
require_once 'controller/reponseController.php';

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
        $idInclusion = 1;
        $questionnaireDAO = new QuestionnaireDAO();
        $qListe = $questionnaireDAO->getQuestionnairesACompleter($idInclusion);
        require 'view/v_listeQuestionnaire.php';
        include 'view/v_footer.php';
        break;

    case 'remplir':
        include 'view/v_header.php';

        $idInclusion = 1; /* Même supposition que pour au dessus, le patient authentifiée est la 1 */
        $idQuestionnaire =  intval($_GET['idQuestionnaire']);
        $dateLimite = $_GET['dateLimite'];
        $questionnaireDAO = new QuestionnaireDAO();
        $optionDAO = new OptionDAO();
        $questions = $questionnaireDAO->getQuestionsDuQuestionnaire($idQuestionnaire);
        $questionnaire = $questionnaireDAO->getQuestionnaireById($idQuestionnaire, $idInclusion, $dateLimite);
        $options = $optionDAO->getOptions();

        require 'view/v_formQuestionnaire.php';
        include 'view/v_footer.php';
        break;

    case 'verificationReponses':
        include 'view/v_header.php';
        $idInclusion = 1; /* Même supposition que pour au dessus, le patient authentifiée est la 1 */
        $questionController = new QuestionController();
        $donneesVerification = $questionController->verificationReponses($idInclusion);
        $reponses = $donneesVerification['reponses'];
        $questionnaire = $donneesVerification['questionnaire'];
        $idQuestionnaire = $donneesVerification['idQuestionnaire'];
        $dateLimite = $donneesVerification['dateLimite'];
        require 'view/v_verificationReponse.php';
        include 'view/v_footer.php';
        break;

    case 'envoieReponses':
        $envReponse = unserialize($_POST['envReponse']);
        $reponseController = new ReponseController();
        $requete = $reponseController->envoieReponse($envReponse);
        if ($requete[0] === 'success') {
            $message = "Vos réponses ont été enregistrées avec succès.";
        } else {
            $message = "Une erreur est survenue lors de l'enregistrement de vos réponses. Veuillez réessayer.";
        }
        
        header("Location: index.php?chx1=questionnaire&chx2=aCompleter");
        exit;
        break;

    default:
        include 'view/v_header.php';
        include 'view/v_questionnaire.html';
        include 'view/v_footer.php';
}
