<?php

require_once 'model/c_connexion.php';
require_once 'model/c_option.php';

class OptionDAO {
  public function getOptions(): array {
    $pdo = Connexion::getConnexion();
    $stmt = $pdo->prepare('SELECT id, libelleValeur FROM valeurreponse');
    $stmt->execute();
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $oListe = [];
    foreach ($resultats as $row) {
      $option = new Option(
        $row['id'],
        $row['libelleValeur']
      );
      $oListe[] = $option;
    }
    $stmt->closeCursor();
    return $oListe;
  }

  public static function getOptionById($idOption) {
    $pdo = Connexion::getConnexion();
    $stmt = $pdo->prepare('SELECT id, libelleValeur FROM valeurreponse WHERE id=:idOption');
    $stmt->bindParam(':idOption', $idOption, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $option = new Option(
      $resultat['id'],
      $resultat['libelleValeur']
    );
    return $option;
  }

}
