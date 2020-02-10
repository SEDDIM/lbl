
<?php
require_once 'Include\Bibliotheque.php';

require_once 'Include/Securite.inc.php';

if (!isset($_REQUEST['Connexion'])) {
    $_REQUEST['Connexion'] = 2;
}
switch    ($_REQUEST['Connexion']) {

    case 2 :
        echo BoutonChangementPage("Connexion", "index.php?action=1&Gestion=1&Connexion=3", "Connexion");
        break;

    case 3;
        for ($i=0;$i<10;$i++)
{
        echo '<br>';
}         echo '<div class="Connexion">';
        echo '<form id="frmIdentification" method="post" action="index.php?action=1&Gestion=1&Connexion=4">';
        echo '<fieldset>'
        . '<legend>Identifiez-vous</legend>' . "\n";
        echo formInputText1('Nom d\'utilisateur : ', 'txtNom', 'txtNom', '', 10, false, 30, 40);
        echo '<br>';
        echo formInputPassword('Mot de passe : ', 'Password', 'Password', '', 40, 30, 10, false);
        echo '<br>';
        echo '<br>';
        echo formBoutonSubmit("btnIdentif", "btnIdentif", "Valider", 25);
        echo '<br>';
        echo '</fieldset>';
        echo '</form>';
        echo '</div>';
        break;

    case 4; //demande validation des infos

        $mdp = $_REQUEST['Password'];
        $mdpEmpreinte = md5($mdp);
        $id = $_REQUEST['txtNom'];

        $compteValide = valideInfosCompteUtilisateur(existeCompteVisiteur($id), $id, $mdpEmpreinte);

        if ($compteValide == 1) {
            ouvreSessionUtilisateur($id);

            header("Location: index.php?action=1&Gestion=4");
        } else {

            echo '<form id="frmIdentification" method="post" action="Index.php?action=1&Connexion=4">';
            echo '<fieldset>'
            . '<legend>Identifiez-vous</legend>' . "\n";

            echo 'Nom d\'utilisateur ou mot de passe incorrect.';
            echo '<br>';
            echo formInputText1('Nom d\'utilisateur : ', 'txtNom', 'txtNom', '', 10, false, 30, 40);
            echo '<br>';
            echo formInputPassword('Mot de passe : ', 'Password', 'Password', '', 40, 30, 10, false);
            echo '<br>';
            echo '<br>';
            echo formBoutonSubmit("btnIdentif", "btnIdentif", "Valider", 25);
            echo '<br>';
            echo '</fieldset>';
            echo '</form>';
        }
        break
        ;
       

}
?>

