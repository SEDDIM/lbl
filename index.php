<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 1;
}

switch ($_REQUEST['action']) {

    case 1;
          require_once 'Controleur\Controleur_Page_Accueil.php';
        Break;

}


?>