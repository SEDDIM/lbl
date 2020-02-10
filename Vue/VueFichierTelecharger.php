<?php
require_once 'Modele/Modele1.php';
require_once 'Include\Bibliotheque.php';
echo '<form id="frmFicher" method="post" action="Verification_Form.php">';
echo '<label for="file">Sélectionner le fichier à poster  </label>';
echo '<input type="file" id="file" name="file" multiple>';
echo  formBoutonSubmit('BtnFormDUA', 'BtnFormDUA','Envoyer', 70);

echo '<br>';

echo '</form>';