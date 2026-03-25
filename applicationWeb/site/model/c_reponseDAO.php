<?php

class ReponseDAO {
    public function insertReponse($idQuestion, $idInclusion, $dateReponse, $dateConsult, $idOption) {
        $pdo = Connexion::getConnexion();
        $stmt = $pdo->prepare('CALL InsertReponse(:numQuestion, :idInclusion, :dateReponse, :dateConsult, :idValeurReponse)');
        $stmt->bindParam(':numQuestion', $idQuestion, PDO::PARAM_INT);
        $stmt->bindParam(':idInclusion', $idInclusion, PDO::PARAM_INT);
        $stmt->bindParam(':dateReponse', $dateReponse, PDO::PARAM_STR);
        $stmt->bindParam(':dateConsult', $dateConsult, PDO::PARAM_STR);
        $stmt->bindParam(':idValeurReponse', $idOption, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
}



