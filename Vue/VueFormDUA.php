 <?php

require_once 'Modele/Modele1.php';
require_once 'Include/Bibliotheque.php';

echo '<div class="Formulaire">';
echo '<form id="form" method="post" action="C_FormDUA.php?DUA=2">';
echo 'Deposé une nouvelle annonce.';
echo formInputText('Nom d\'annonce  ', 'frmNomAnnonce', 'frmNomAnnonce', '', 10, true, 32, 10);
echo formInputText('Description  ', 'frmDescription', 'frmDescription', '', 20, true, 500, 50);
echo formInputText('Ville  ', 'frmVille', 'frmVille', '', 30, true, 30, 10);
echo formInputText('Code Postal  ', 'frmCP', 'frmCP', '', 40, true, 5, 10);
echo formInputText('Prix d\'achat  ', 'frmPrixAchat', 'frmPrixAchat', '', 50, true, 4, 10);
echo formInputText('Prix de location par jour  ', 'frmPrixLoc', 'frmPrixLoc', '', 60, true, 3, 10);
echo BoutonRadio('BRetat',1,1,'Mauvaise Etat',true);
echo BoutonRadio('BRetat',2,2,'Moyen',true);
echo BoutonRadio('BRetat',3,3,'Correct',true);
echo BoutonRadio('BRetat',4,4,'Bon Etat',true);
echo BoutonRadio('BRetat',5,5,'Neuf',true);
echo formBoutonSubmit('BtnFormDUA', 'BtnFormDUA','Envoyer', 70);
echo '</form>';
echo '</div>';

?>
</body>
</html>

