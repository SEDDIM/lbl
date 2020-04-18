<?php ?>
<div class="Gauche">  
    <div id="Gauche">
<?php
$LigneMessage = GetNumConversation(GetNumUtilisateurConnecter($_SESSION['EMAIL'])); // On recupere la liste de conversation pour l'utilisateur connecter
$LigneMessage->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $LigneMessage->fetch();
?>      <div id="Conversation">
        <?php
        while ($ligne == true) { // On crée une boucle qui affiche toutes les conversation sous forme de div le premier message dans la div 
            $NUMCONVERSATION = $ligne['NUMCONVERSATION'];
            $msj = GetPremierMessage($NUMCONVERSATION);
            $msj->setFetchMode(PDO::FETCH_ASSOC);
            $ligne = $msj->fetch();
            $premierMessage = $ligne['MESSAGE'];
            ?>         
                <div id="LigneMessage" 
                     onclick=" location.href = '/../LBL/Controleur/Controleur_Message.php?Message=2&NumConversation=<?php echo $NUMCONVERSATION;?>';"
                     style="cursor: pointer;">  
                    <div class="avatar-date">
                        <img src="/LBL/Image/avatar.png" width="50px" height="50px">
                    </div>    
                    <div class="nom-annonce">
    <?php           echo $premierMessage;   ?>
                    </div>   
                </div>
    <?php
    $ligne = $LigneMessage->fetch();
}?>  
        </div> 
    </div>   
</div>
