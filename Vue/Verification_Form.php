<?php

for ($i=0;$i<10;$i++)
{
echo '<br>';
}
if ((is_numeric($_REQUEST['frmCP']) == true) && (is_numeric($_REQUEST['frmPrixAchat']) == true) && (is_numeric($_REQUEST['frmPrixLoc']) == true)) {
   // echo NouvelleAnnonce(5,$_REQUEST['frmNomAnnonce'],$_REQUEST['frmDescription'],$_REQUEST['frmVille'],$_REQUEST['frmCP'],$_REQUEST['frmPrixAchat'],$_REQUEST['frmPrixLoc']);
   // echo NouvelleEtat(5,$_REQUEST['BRetat']);

    header('Location:index.php?action=1&Gestion=7');
} else {
    header('Location:index.php?action=1&Gestion=2');
}
echo '<br>';

echo $_REQUEST['frmNomAnnonce'];




