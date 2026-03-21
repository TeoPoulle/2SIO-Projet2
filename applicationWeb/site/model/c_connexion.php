<?php

class Connexion {
  private static $pdo;

  public static function getConnexion() {
    if (self::$pdo === null) {
      try {
        self::$pdo = new PDO("mysql:host=127.0.0.1;dbname=SIO2-projet2;port=3306;charset=utf8mb4","teo","16122004"
        );
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
      }
    }
    return self::$pdo;
  }
}

?>