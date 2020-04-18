<?php


require_once 'Modele\Modele1.php';

if ((is_numeric($_REQUEST['frmCP']) == true) && (is_numeric($_REQUEST['frmPrixAchat']) == true) 
        && (is_numeric($_REQUEST['frmPrixLoc']) == true)) {

    $NumAnnonce = NumNouvelleAnnonce();
 echo NouvelleAnnonce($NumAnnonce,$_REQUEST['frmNomAnnonce'],$_REQUEST['frmDescription'],$_REQUEST['frmVille'],$_REQUEST['frmCP'],
         $_REQUEST['frmPrixAchat'],$_REQUEST['frmPrixLoc']);
 echo NouvelleEtat($NumAnnonce,$_REQUEST['BRetat']); 
 header('Location:C_DemoInputFile.php?NumAnnonce='.$NumAnnonce);
}
?> 




