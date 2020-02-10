 <?php

function SGBDConnect() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "No connection: " . $e->getMessage();
        exit;
    }
    return $connexion;
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
    $ligne=$resultat->fetch();
    return $ligne['MAX(NUMUTILISATEUR)']+1;
    
}

function NouvelUtilisateurVendeur($Num,$Nom,$Prenom,$DateNaiss,$Ville,$CP,$tel,$email,$mdp) {
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO utilisateur(NUMUTILISATEUR,NOM,PRENOM,DATENAISSANCE,VILLE,CODEPOSTAL,TELEPHONE,EMAIL,MOTDEPASSE) VALUES '
          .'("'.$Num.'","'.$Nom.'","'.$Prenom.'","'.$DateNaiss.'","'.$Ville.'","'.$CP.'","'.$tel.'","'.$email.'","'.$mdp.'"); '
          .'INSERT INTO VENDEUR(NUMUTILISATEUR,NOM,PRENOM,DATENAISSANCE,VILLE,CODEPOSTAL,TELEPHONE,EMAIL,MOTDEPASSE,NOMBREANNONCE,NOMBREOBJETLOUE) VALUES '
          .'("'.$Num.'","'.$Nom.'","'.$Prenom.'","'.$DateNaiss.'","'.$Ville.'","'.$CP.'","'.$tel.'","'.$email.'","'.$mdp.'","0","0"); ';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;



    return;
}

function NouvelleEtat($NumAnnonce, $NumEtat) 
{
    $connexion = SGBDConnect();
    $sql = 'INSERT INTO `ETAT` (NUMETAT,NUMANNONCE,NUMUTILISATEUR,EtatDATE) VALUES'
            . '("' . $NumEtat . '","' . $NumAnnonce . '","3","17-01-2020");';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}
 function NumAnnonceRecherche($recherche){
        $connexion = SGBDConnect();
    $sql = 'SELECT `NUMANNONCE` From Annonce where NOM like \'%'.$recherche.'%\'' ;
    $resultat = $connexion->query($sql);
    return $resultat;
}

function AdresseMail($mail) {
    $connexion = SGBDConnect();
    $sql = 'SELECT EMAIL FROM utilisateur WHERE EMAIL = "'.$mail.'" ';
    $result = $connexion->query($sql);
    $resultat = $result->rowCount();
    return $resultat;
}

function NumNouvelleAnnonce() {
    $connexion = SGBDConnect();
    $sql = 'SELECT MAX(NUMANNONCE)'
            . 'FROM ANNONCE ';
    $resultat = $connexion->query($sql);
    $resultat++;
    return $resultat;
}



function Annonce($NumAnnonce) {
    $connexion = SGBDConnect();
    $sql = "SELECT * FROM `annonce` WHERE NumAnnonce = $NumAnnonce";
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
    $sql = 'SELECT NUMANNONCE, NUMUTILISATEUR, NOM, PRIX_D_ACHAT FROM annonce where numannonce ='.$num;
    $resultat = $connexion->query($sql);
    return $resultat;
}
 

function Image($file){
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


?>