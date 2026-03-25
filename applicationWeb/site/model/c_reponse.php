<?php
class Reponse {
  private $id;
  private $numQuestion;
  private $idInclusion;
  private $dateReponse;
  private $dateConsult;

  public function __construct(
    $id = null,
    $numQuestion = null,
    $idInclusion = null,
    $dateReponse = null,
    $dateConsult = null
  ) {
    $this->id = $id;
    $this->numQuestion = $numQuestion;
    $this->idInclusion = $idInclusion;
    $this->dateReponse = $dateReponse;
    $this->dateConsult = $dateConsult;
  }

  // Getters
  public function getId() { return $this->id; }
  public function getNumQuestion() { return $this->numQuestion; }
  public function getIdInclusion() { return $this->idInclusion; }
  public function getDateReponse() { return $this->dateReponse; }
  public function getDateConsult() { return $this->dateConsult; }

  // Setters
  public function setId($id) { $this->id = $id; }
  public function setNumQuestion($numQuestion) { $this->numQuestion = $numQuestion; }
  public function setIdInclusion($idInclusion) { $this->idInclusion = $idInclusion; }
  public function setDateReponse($dateReponse) { $this->dateReponse = $dateReponse; }
  public function setDateConsult($dateConsult) { $this->dateConsult = $dateConsult; }

}