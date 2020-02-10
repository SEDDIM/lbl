<?php
    require_once 'Include\Bibliotheque.php';
    
        echo '<div class="Recherche">';
        echo '<form id="frmRecherche" method="post" action="index.php?action=1&Gestion=3">';
        echo formInputText1('', 'txtRecherche', 'txtRecherche', '', 100, false, 30, 40);
        echo '<br>';
        echo formBoutonSubmit("btnRecherche", "btnRecherche", "Rechercher", 25);
        echo '<br>';
        echo '</form>';        
        echo '</div>';