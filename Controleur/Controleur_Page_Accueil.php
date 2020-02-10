<?php

if (!isset($_REQUEST['Gestion'])) {
    $_REQUEST['Gestion'] = 1;
}
switch ($_REQUEST['Gestion']) {

    case 1;
        require_once 'Include/entete.php';
        require_once 'Include/BodyAccueil.php';
        require_once 'Vue/VueAffichageAnnonce.php';
        break;

    case 2;
        require_once 'Include/entete.php';
        require_once 'Vue\VueFormDUA.php';
        Break;

    case 3;
        require_once 'Include/entete.php';
        require_once 'Vue/VueAffichageAnnonce.php';
        break;

    case 4;
        require_once 'Include/entete.php';
        require_once '/Vue/VueInscription.php';
        break;
    case 5;
        require_once 'Include/entete.php';
        require_once 'Vue\VueBtnConnection.php';
        break;
    case 6;
        require_once 'Include/entete.php';
        require_once 'Vue/Vue_AnnoncePublier.php';
        break;
    case 7;
        require_once 'Include/entete.php';
        require_once 'Vue/VueFichierTelecharger.php';
        break;
    case 8;
        require_once 'Include/entete.php';
        require_once 'Vue\Verification_Form.php';
        break;
}
?>

