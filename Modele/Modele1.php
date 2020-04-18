<?php

function SGBDConnect() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=lbl2', 'root', '');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "No connection: " . $e->getMessage();
        exit;
    }
    return $connexion;
}

function GetNumConversation($NumUtilisateur) {
    $connexion = SGBDConnect();
    $sql = "SELECT DISTINCT `NUMCONVERSATION` "
            . "From chat "
            . "where `NUMEXPEDITEUR` = " . $NumUtilisateur;
    $resultat = $connexion->query($sql);
    return $resultat;
}

function NouvelleAnnonce($NumAnnonce, $nom, $description, $ville, $codePostale, $prixAchat, $prixLoc) {
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO `ANNONCE` (NUMUTILISATEUR,NOM,NUMANNONCE,NUMSOUSCATEGORIE,VILLE,CATEGORIE,CODEPOSTAL,DESCRIPTION,PRIX_D_ACHAT,PRIX_JOUR) VALUES'
            . '("3","' . $nom . '","' . $NumAnnonce . '","1","' . $ville . '","1","' . $codePostale . '","' . $description . '","' . $prixAchat . '","' . $prixLoc . '");';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}

function NumNouvelUtilisteur() {
    $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMUTILISATEUR) FROM `utilisateur`';
    $resultat = $connexion->query($sql);
    $ligne = $resultat->fetch();
    return $ligne['MAX(NUMUTILISATEUR)'] + 1;
}

function NouvelUtilisateurVendeur($Num, $Nom, $Prenom, $DateNaiss, $Ville, $CP, $tel, $email, $mdp) {
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO utilisateur(NUMUTILISATEUR,NOM,PRENOM,DATENAISSANCE,VILLE,CODEPOSTAL,TELEPHONE,EMAIL,MOTDEPASSE) VALUES '
            . '("' . $Num . '","' . $Nom . '","' . $Prenom . '","' . $DateNaiss . '","' . $Ville . '","' . $CP . '","' . $tel . '","' . $email . '","' . $mdp . '"); '
            . 'INSERT INTO VENDEUR(NUMUTILISATEUR,NOM,PRENOM,DATENAISSANCE,VILLE,CODEPOSTAL,TELEPHONE,EMAIL,MOTDEPASSE,NOMBREANNONCE,NOMBREOBJETLOUE) VALUES '
            . '("' . $Num . '","' . $Nom . '","' . $Prenom . '","' . $DateNaiss . '","' . $Ville . '","' . $CP . '","' . $tel . '","' . $email . '","' . $mdp . '","0","0"); ';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}

function NouvelleEtat($NumAnnonce, $NumEtat) {
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO `ETAT` (Num_Etat_Date,NUMETAT,NUMANNONCE,NUMUTILISATEUR,EtatDATE) VALUES '
            . ' ("5",' . $NumEtat . '","' . $NumAnnonce . '","3","07-03-2020");';
    $result = $connexion->query($sql);
    return $resultat;
}

function NumAnnonceRecherche($recherche) {
    $connexion = SGBDConnect();
    $sql = 'SELECT `NUMANNONCE` From Annonce where NOM like \'%' . $recherche . '%\'';
    $resultat = $connexion->query($sql);
    return $resultat;
}

function AdresseMail($mail) {
    $connexion = SGBDConnect();
    $sql = 'SELECT EMAIL FROM utilisateur WHERE EMAIL = "' . $mail . '" ';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}

function NumNouvelleAnnonce() {
    $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMANNONCE) '
            . ' FROM ANNONCE ';
    $resultat = $connexion->query($sql);
    $NumAnnonceMax = $resultat;
    $NumAnnonceMax->setFetchMode(PDO::FETCH_NUM);
    $ligne = $NumAnnonceMax->fetch();
    $NumAnnonceMax = $ligne[0];
    $NumAnnonce = $NumAnnonceMax + 1;
    Return $NumAnnonce;
}

function Annonce($NumAnnonce) {
    $connexion = SGBDConnect();
    $sql = "SELECT * FROM `annonce` WHERE NumAnnonce =" . $NumAnnonce;
    $resultat = $connexion->query($sql);
    return $resultat;
}

function getCategorie() {
    $connexion = SGBDConnect();
    $sql = "SELECT  `NOMCATEGORIE`, s.NUMCATEGORIE, `NOMSOUSCATEGORIE`, `NUMSC`,`NUMSOUSCATEGORIE` FROM souscategorie s inner join categorie c on s.NUMCATEGORIE = c.NUMCATEGORIE ORDER BY `NUMSOUSCATEGORIE` ";
    $resultat = $connexion->query($sql);
    return $resultat;
}

function AffAnnonce($num) {
    $connexion = SGBDConnect();
    $sql = 'SELECT NUMANNONCE, NUMUTILISATEUR, NOM, PRIX_D_ACHAT FROM annonce where numannonce =' . $num;
    $resultat = $connexion->query($sql);
    return $resultat;
}

function Image($file) {
    $connexion = SGBDConnect();
    $sql = "INSERT INTO images (id, nom_fichier) VALUES (4," . $file . ")";
    $resultat = $connexion->query($sql);
    return $resultat;
}

//    while ($ligne == true) {
//    $codeHTML.= '<label="'.$ligne[0].'">'.$ligne[1].'</label>';
//    
//    
//    $ligne = $recordset->fetch();
//    }
//    $codeHTML .= '</select>';
//



function GetPhoto($filename) {




    for ($i = 0; $i <= 3; $i++) {
        if (file_exists($filename[$i])) {


            $filename = $filename[$i];



            return $filename;
        }
    }
}

function GetNumPhoto($NumAnnonce, $NumPhoto) {
    $ext = array('jpg', 'png', 'jpeg', 'tmp');
    $Photo = 'Image/' . $NumAnnonce . '_' . $NumPhoto . '.';
    $filename = array($Photo . $ext[0], $Photo . $ext[1], $Photo . $ext[2], $Photo . $ext[3]);
    return $filename;
}

function SelectNombreImage($filename1, $filename2, $filename3) {
    for ($i = 0; $i <= 3; $i++) {
        if (file_exists($filename3[$i])) {
            return 3;
        } else if (file_exists($filename2[$i])) {
            return 2;
        } else if (file_exists($filename1[$i])) {
            return 1;
        }
    }
}

Function GetNumeroVendeur($NumAnnonce) {
    $connexion = SGBDConnect();
    $sql = 'SELECT `NUMUTILISATEUR` From annonce Where NUMANNONCE = ' . $NumAnnonce;
    $resultat = $connexion->query($sql);
    $resultat->setFetchMode(PDO::FETCH_NUM);
    $ligne = $resultat->fetch();
    return $ligne[0];
}

Function CreateNumConversation() {
    $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMCONVERSATION) FROM `chat`';
    $resultat = $connexion->query($sql);
    $ligne = $resultat->fetch();
    return $ligne['MAX(NUMCONVERSATION)'] + 1;
}

Function GetNumMsj() {
    $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMMSJ) FROM `chat`';
    $resultat = $connexion->query($sql);
    $ligne = $resultat->fetch();
    return $ligne['MAX(NUMMSJ)'] + 1;
}

Function GetNumUtilisateurConnecter($Email) {
    $connexion = SGBDConnect();
    $sql = 'SELECT NUMUTILISATEUR From utilisateur Where EMAIL ="' . $Email . '"';
    $resultat = $connexion->query($sql);
    $resultat->setFetchMode(PDO::FETCH_NUM);
    $ligne = $resultat->fetch();
    return $ligne[0];
}
Function GetNumeroAnnonce($NUMCONVERSATION){
        $connexion = SGBDConnect();
    $sql = 'SELECT NUMANNONCE From CHAT Where NUMCONVERSATION ="' . $NUMCONVERSATION . '"';
    $resultat = $connexion->query($sql);
    $resultat->setFetchMode(PDO::FETCH_NUM);
    $ligne = $resultat->fetch();
        return $ligne[0];
}
Function GetNumMsjConv($NUMCONVERSATION){
        $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMMSJCONVERSATION) From CHAT Where NUMCONVERSATION ="' . $NUMCONVERSATION . '"';
    $resultat = $connexion->query($sql);
    $resultat->setFetchMode(PDO::FETCH_NUM);
    $ligne = $resultat->fetch();
     return $ligne[0] + 1;
}
Function insertPremierMessage($NUMCONVERSATION,$email, $msj) {
    $connexion = SGBDConnect();
    $NUMMSJCONV = GetNumMsjConv($NUMCONVERSATION);
    $NumAnnonce = GetNumeroAnnonce($NUMCONVERSATION);
    $NUMUTILISATEUR = GetNumeroVendeur($NumAnnonce);
    $NUMUTILISATEUR_1 = GetNumUtilisateurConnecter($email);
    $NUMMSJ = GetNumMsj();
    $sql = 'INSERT INTO `chat`(`NUMMSJ`,`NUMCONVERSATION`, `NUMANNONCE`, `NUMEXPEDITEUR`, `NUMRECEVEUR`, `MESSAGE`,`NUMMSJCONVERSATION`) '
            . 'VALUES (' . $NUMMSJ . ',' . $NUMCONVERSATION . ',' . $NumAnnonce . ',' . $NUMUTILISATEUR . ',' . $NUMUTILISATEUR_1 . ',"' . $msj . '",' . $NUMMSJCONV . ')';

    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}

Function insertMessageContact($NUMCONVERSATION, $NumAnnonce, $email, $msj, $NUMMSJCONV) {
    $connexion = SGBDConnect();
    $NUMUTILISATEUR = GetNumeroVendeur($NumAnnonce);
    $NUMUTILISATEUR_1 = GetNumUtilisateurConnecter($email);
    $NUMMSJ = GetNumMsj();
    $sql = 'INSERT INTO `chat`(`NUMMSJCONVERSATION`,`NUMMSJ`,`NUMCONVERSATION`, `NUMANNONCE`, `NUMEXPEDITEUR`, `NUMRECEVEUR`, `MESSAGE`) '
            . 'VALUES (' . $NUMMSJCONV . ',' . $NUMMSJ . ',' . $NUMCONVERSATION . ',' . $NumAnnonce . ',' . $NUMUTILISATEUR_1 . ',' . $NUMUTILISATEUR . ',"' . $msj . '")';

    $resultat = $connexion->query($sql);
    $result = $resultat->rowCount();
    return $result;
}

Function GetPremierMessage($NUMCONVERSATION) {
    $connexion = SGBDConnect();
    $sql = 'SELECT * FROM `chat` WHERE `NUMCONVERSATION`= ' . $NUMCONVERSATION . ' AND `NUMMSJCONVERSATION` <=4 ORDER BY `NUMMSJCONVERSATION` ASC';
    $resultat = $connexion->query($sql);
    return $resultat;
}

Function GetMessageContact($NUMCONVERSATION) {
    $connexion = SGBDConnect();
    $sql = 'SELECT * FROM `chat` WHERE `NUMCONVERSATION`= ' . $NUMCONVERSATION . ' AND `NUMMSJCONVERSATION` = 5';
    $resultat = $connexion->query($sql);
    return $resultat;
}

//////////////////////////////message////////////////
function getNombreMessage($NUMCONVERSATION) {
    $connexion = SGBDConnect();
    $sql = 'SELECT * FROM `CHAT` WHERE `NUMCONVERSATION`= ' . $NUMCONVERSATION;
    $resultat = $connexion->query($sql);
    $result = $resultat->rowCount();
    return $result - 3;
}

function getMessage($NUMMSJCONVERSATION,$NUMCONVERSATION) {
    $connexion = SGBDConnect();
    $NUMMSJCONVERSATION = $NUMMSJCONVERSATION + 3;
    $sql = 'SELECT NUMEXPEDITEUR , MESSAGE FROM `CHAT` WHERE `NUMCONVERSATION`= "'.$NUMCONVERSATION. '" AND `NUMMSJCONVERSATION`= "' . $NUMMSJCONVERSATION .'"';
    $resultat = $connexion->query($sql);
    return $resultat;
}

function echoMessageDansLordre($NombreMessage, $NUMCONVERSATION,$NUMUTILISATEURCONNECTER) {
    if ($NombreMessage >= 2) {
        $codeHTML = '<div id="Message-box">';
        $codeHTML .= '<div class="avatar-date">';
        $codeHTML .= '<img src="/LBL/Image/avatar.png" width="50px" height="50px">';
        $codeHTML .= '</div>';
        $msj = GetPremierMessage($NUMCONVERSATION); // Les 4 premier message de chaque conversation correspond au message d'annonce, il contient 
        $msj->setFetchMode(PDO::FETCH_ASSOC);       // le nom d'annonce, la description, le prix de location et le prix de caution
        $ligne = $msj->fetch();
        $codeHTML .= '<div class="nom_annonce" style="margin-top: -44px;margin-left: 71px;">' . $ligne['MESSAGE'];
        $ligne = $msj->fetch();
        $codeHTML .= '</div>';
        $codeHTML .= '</div>';
        $codeHTML .= '<div id="Message">' . $ligne['MESSAGE']; // Les 4 message sont afficher dans un seul block
        $ligne = $msj->fetch();
        $codeHTML .= '<br>' . $ligne['MESSAGE'];
        $ligne = $msj->fetch();
        $codeHTML .= '<br>' . $ligne['MESSAGE'];
        $codeHTML .= '</div>';
        $codeHTML .= '</div>';
        $codeHTML .= '<div id="PremierMsj">';
        $message = getMessage(2,$NUMCONVERSATION);
        $message->setFetchMode(PDO::FETCH_ASSOC);
        $messagei = $message->fetch();
        $codeHTML .= $messagei['MESSAGE'] . '</div>';
    } 
    if ($NombreMessage>=3){
    for ($i=3;$i<=$NombreMessage;$i++){
        $message = getMessage($i,$NUMCONVERSATION);
        $message->setFetchMode(PDO::FETCH_ASSOC);
        $messagei = $message->fetch();
    if ($messagei['NUMEXPEDITEUR']==$NUMUTILISATEURCONNECTER) { //On compare le numero de l'utilisateur connecter a celui de la colonne NUMEXPEDITEUR 
        $codeHTML .= '<div id="MessageBleu">';                  // de chaque message, pour differencier les message de la conversation.
        $codeHTML .= $messagei['MESSAGE'] . '</div>'; 
    } else {
        $codeHTML .= '<div id="MessageGris">';
        $codeHTML .= $messagei['MESSAGE'] . '</div>'; 
    }
    }
    }
    return $codeHTML;
}

/////////////////////////////////////////////////////
?>
    