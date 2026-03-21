<?php
class Question {
  private $id;
  private $numQuestion;
  private $idTheme;
  private $libelleTheme;
  private $libelleQuestion;

  public function __construct(
    $id = null,
    $numQuestion = null,
    $idTheme = null,
    $libelleTheme = null,
    $libelleQuestion = null
  ) {
    $this->id = $id;
    $this->numQuestion = $numQuestion;
    $this->idTheme = $idTheme;
    $this->libelleTheme = $libelleTheme;
    $this->libelleQuestion = $libelleQuestion;
  }

  // Getters
  public function getId() { return $this->id; }
  public function getNumQuestion() { return $this->numQuestion; }
  public function getIdTheme() { return $this->idTheme; }
  public function getLibelleTheme() { return $this->libelleTheme; }
  public function getLibelleQuestion() { return $this->libelleQuestion; }

  // Setters
  public function setId($id) { $this->id = $id; }
  public function setNumQuestion($numQuestion) { $this->numQuestion = $numQuestion; }
  public function setIdTheme($idTheme) { $this->idTheme = $idTheme; }
  public function setLibelleTheme($libelleTheme) { $this->libelleTheme = $libelleTheme; }
  public function setLibelleQuestion($libelleQuestion) { $this->libelleQuestion = $libelleQuestion; }

}