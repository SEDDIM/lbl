<?php 
require_once 'C:\wamp\www\LBL\Modele\Modele1.php';
   
 
function  fermeSessionUtilisateur()
{session_start();
$_SESSION = array();
session_destroy();           


}

function estSessionUtilisateurOuverte($o) 
{   
    if (isset($o))
    {
    return $SessionActive = true ;
    }
}

function ouvreSessionUtilisateur($id)
        {
        $_SESSION['EMAIL'] = $id ; 
}
            
            
      
   
        
        
        
function existeCompteVisiteur($id) {
    $connexion = SGBDConnect();
    $sql = $connexion->query('SELECT MOTDEPASSE FROM UTILISATEUR WHERE EMAIL = "'.$id.'"');
    return $sql->rowCount(); 
}

function valideInfosCompteUtilisateur($existeCompte,$id,$mdpEmpreinte)
{

 if ($existeCompte==1)
     {   
    $connexion = SGBDConnect();  

    $sql = $connexion->query('SELECT * FROM UTILISATEUR WHERE EMAIL = \''.$id.'\' and MOTDEPASSE = \''.$mdpEmpreinte.'\'');

    return($sql->rowCount()==1);

}
}

//     {
//     $verification = true ;
//     } else {
//      $verification = false ;
//     }
//     return $verification;