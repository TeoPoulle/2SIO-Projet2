<?php

require_once 'model/c_reponseDAO.php';
require_once 'model/c_optionDAO.php';
require_once 'model/c_questionDAO.php';

class ReponseController {
    public function envoieReponse($envReponse) {
        try {
            $questionDAO = new QuestionDAO();
            $optionDAO = new OptionDAO();
            $reponseDAO = new ReponseDAO();
            $requete = 'success';
            foreach ($envReponse as $reponse) {
                $numQuestion = $reponse['numQuestion'];
                $idTheme = $reponse['idTheme'];
                $idInclusion = $reponse['idInclusion'];
                $dateReponse = $reponse['dateReponse'];
                $dateConsult = $reponse['dateConsult'];
                $libelleOption = $reponse['libelleOption'];

                $idQuestion = $questionDAO->getQuestionByIndex($numQuestion, $idTheme)->getId();
                $idOption = $optionDAO->getOptionByLibelle($libelleOption)->getId();

                $reponseDAO->insertReponse($idQuestion, $idInclusion, $dateReponse, $dateConsult, $idOption);
            }
        } catch (Exception $e) {
            $requete = 'error';
        } finally {
            return [$requete, $idInclusion];
        }
    }
}
