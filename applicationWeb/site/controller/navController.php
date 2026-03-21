<?php

$action = $_GET['chx1'];

switch ($action) {
    // Cas pour la gestion des rendez-vous
    case 'rdv':
        include 'view/v_header.php';
        include 'view/v_rdv.html';
        include 'view/v_footer.php';
        break;
    /* Ajouter ici d'autres liens pour les rdv */

    // Cas pour la gestion des questionnaires
    case 'questionnaire':
        include 'view/v_header.php';
        include 'view/v_questionnaire.html';
        include 'view/v_footer.php';
        break;
    /* Ajouter ici d'autres liens pour les questionnaires */

    // Cas pour les autres pages
    case 'autre':
        include 'view/v_header.php';
        include 'view/v_autre.html';
        include 'view/v_footer.php';
        break;
    /* Ajouter ici d'autres liens pour les autres pages (à propos, connexion...)*/

    default:
        echo "Action non reconnue.";
}
