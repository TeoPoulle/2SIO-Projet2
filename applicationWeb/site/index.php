<?php
$action = $_GET['chx1'] ?? 'accueil';

switch ($action) {
  case 'accueil':
    include 'view/v_header.php';
    include 'view/v_accueil.html';
    include 'view/v_footer.php';
    break;

  case 'rdv':
    include 'controller/navController.php';
    break;

  case 'questionnaire':
    include 'controller/navQuestionController.php';
    break;

  case 'autre':
    include 'controller/navController.php';
    break;

  default:
    echo "Action non reconnue.";
}
