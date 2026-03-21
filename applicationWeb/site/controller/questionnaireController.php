<?php
require_once 'model/c_questionnaireDAO.php';
require_once 'model/c_optionDAO.php';
require_once 'model/c_questionDAO.php';

class QuestionController {
    public function verificationReponses(int $idPatient): array {
        $optionDAO = new OptionDAO();
        $questionDAO = new QuestionDAO();
        $questionnaireDAO = new QuestionnaireDAO();

        $idQuestionnaire = intval($_POST['idQuestionnaire'] ?? ($_GET['idQuestionnaire'] ?? 0));
        $dateLimite = $_POST['dateLimite'] ?? ($_GET['dateLimite'] ?? '');

        $reponses = [];
        if (!empty($_POST)) {
            foreach ($_POST as $cle => $valeur) {
                if (str_contains($cle, 'reponse_') && str_contains($cle, '_theme_')) {
                    $numQuestion = intval(substr($cle, strlen('reponse_'), strpos($cle, '_theme_') - strlen('reponse_')));
                    $idTheme = intval(substr($cle, -1));
                    $idOption = intval($valeur);

                    $libelleOption = $optionDAO::getOptionById($idOption);
                    $question = $questionDAO::getQuestionByIndex($numQuestion, $idTheme);

                    $reponses[] = [
                        'numQuestion' => $numQuestion,
                        'idTheme' => $idTheme,
                        'idOption' => $idOption,
                        'libelleTheme' => $question->getLibelleTheme(),
                        'libelleQuestion' => $question->getLibelleQuestion(),
                        'libelleOption' => $libelleOption->getLibelleOption()
                    ];
                }
            }
        }

        $questionnaire = null;
        if ($idQuestionnaire > 0 && $dateLimite !== '') {
            $questionnaire = $questionnaireDAO->getQuestionnaireById($idQuestionnaire, $idPatient, $dateLimite);
        }

        return [
            'reponses' => $reponses,
            'questionnaire' => $questionnaire,
            'idQuestionnaire' => $idQuestionnaire,
            'dateLimite' => $dateLimite
        ];
    }
}
