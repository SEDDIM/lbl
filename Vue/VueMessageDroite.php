<div class="Droite"> 
    <div id="message_annonce"
         <?php
         $NUMCONVERSATION = $_REQUEST['NumConversation']; // on recupere le numero de conversation envoyer par le lien
         $NumUtilisateurConnecter = GetNumUtilisateurConnecter($_SESSION['EMAIL']);
         echo echoMessageDansLordre(getNombreMessage($NUMCONVERSATION), $NUMCONVERSATION, $NumUtilisateurConnecter); // cette fonction affiche tout les 
         if (!isset($_REQUEST['NewMessage'])) {                                                                      // premier message de la conversation
             $_REQUEST['NewMessage'] = 0;
         }
         // Si $_REQUEST['NewMessage'] existe il est egal à 1, le formulaire BtnContacter definit la variable NewMessage=1 
         //  dans son action, on poursuit donc l'affichage et l'insertion du message dans la base de donnée
         switch ($_REQUEST['NewMessage']) {

             case 1;
                 echo '<br>';
                 echo '<div id="PremierMsj">';
                 echo $_REQUEST['txtPremierMsj'];     // Affichage
                 echo '</div>';
                 insertPremierMessage($NUMCONVERSATION, $_SESSION['EMAIL'], $_REQUEST['txtPremierMsj']); // insertion
                 break;
         }
         echo '<form name="BtnContacter" action="Controleur_Message.php?Message=2&NewMessage=1&NumConversation=' . $NUMCONVERSATION . ''
         . '" method="post" style="margin-top: 20px;">';
         echo formInputTextreadonly('', 'txtPremierMsj', 'txtPremierMsj', '', 10, false, 30, 30);
         echo '<input type="submit" value="Contacter" readonly></form>';
         ?>
</div>
</div>
          