<?php
require_once 'Modele/Modele1.php';
for ($i=0;$i<5;$i++)
{
echo '<br>';
}
if (isset($_REQUEST['txtRecherche'])) {
    echo '<div id="AnnonceCorrespondante">' ;
    echo 'Annonce correspondante pour le mot ' .$_REQUEST['txtRecherche'].'.';
    echo  '</div>';
    $numAnnonce = NumAnnonceRecherche($_REQUEST['txtRecherche']);
    $numAnnonce->setFetchMode(PDO::FETCH_NUM);
    $num = $numAnnonce->fetch();
    while ($num == true) {

        $AffAnnonce = AffAnnonce($num[0]);
        $AffAnnonce->setFetchMode(PDO::FETCH_NUM);
        $ligne = $AffAnnonce->fetch();
        while ($ligne == true) {
            echo '<br>';
            ?>
            
            <div id="annonce" onclick="location.href = 'index.php?Gestion=6&NumAnnonce=<?php echo $ligne[0]; ?>';" style="cursor: pointer;">
                <?php
                print $ligne[0];
                echo '<br>';
                echo $ligne[2];

                echo '<br>';
                echo $ligne[3] . '€';
                echo '<br>';


                echo'</div>';
                echo '<br>';
                $ligne = $AffAnnonce->fetch();
            }
            $num = $numAnnonce->fetch();
        }
    }

