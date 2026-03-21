<?php
class Questionnaire {
  private $id;
  private $libelleQuestionnaire;
  private $descQuestionnaire;
  private $dateLimite;

  public function __construct(
    $id = null,
    $libelleQuestionnaire = null,
    $descQuestionnaire = null,
    $dateLimite = null
  ) {
    $this->id = $id;
    $this->libelleQuestionnaire = $libelleQuestionnaire;
    $this->descQuestionnaire = $descQuestionnaire;
    $this->dateLimite = $dateLimite;
  }

  // Getters
  public function getId() { return $this->id; }
  public function getLibelleQuestionnaire() { return $this->libelleQuestionnaire; }
  public function getDescQuestionnaire() { return $this->descQuestionnaire; }
  public function getDateLimite() { return $this->dateLimite; }

  // Setters
  public function setId($id) { $this->id = $id; }
  public function setLibelleQuestionnaire($libelleQuestionnaire) { $this->libelleQuestionnaire = $libelleQuestionnaire; }
  public function setDescQuestionnaire($descQuestionnaire) { $this->descQuestionnaire = $descQuestionnaire; }
  public function setDateLimite($dateLimite) { $this->dateLimite = $dateLimite; }
}