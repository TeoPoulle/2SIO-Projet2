<?php
class Option {
  private $id;
  private $libelleOption;

  public function __construct(
    $id = null,
    $libelleOption = null
  ) {
    $this->id = $id;
    $this->libelleOption = $libelleOption;
  }

  // Getters
  public function getId() { return $this->id; }
  public function getLibelleOption() { return $this->libelleOption; }

  // Setters
  public function setId($id) { $this->id = $id; }
  public function setLibelleOption($libelleOption) { $this->libelleOption = $libelleOption; }

}