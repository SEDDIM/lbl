<?php
require_once '/../Modele/Modele1.php';
require_once  '/../Include/Bibliotheque.php';
require_once '/../Include/entete.php';
?>     
<link rel="stylesheet" type="text/css" href="/LBL/Style/style.css"/>
<div id="GestionMessage">
    <?php
    if (!isset($_REQUEST['Message'])) {
        $_REQUEST['Message'] = 1;
    }

    switch ($_REQUEST['Message']) {

        case 1;         

            require_once '/../Vue/VueMessageGauche.php';
            break;
        case 2;
                
            require_once '/../Vue/VueMessageGauche.php';
            require_once '/../Vue/VueMessageDroite.php';
            break;-²²²²²²
    }
        ?>
   
</div>




