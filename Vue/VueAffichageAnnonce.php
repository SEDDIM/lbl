

<link rel="stylesheet" href="/./LBL/assets/css/style.css">
<?php
require_once '/../Modele/Modele1.php';
for ($i = 0; $i < 5; $i++) {
    echo '<br>';
}

if (isset($_REQUEST['txtRecherche'])) {

    echo '<div id="AnnonceCorrespondante">';
    echo 'Annonce correspondante pour le mot ' . $_REQUEST['txtRecherche'] . '.';
    echo '</div>';

    $numAnnonce = NumAnnonceRecherche($_REQUEST['txtRecherche']);
    $numAnnonce->setFetchMode(PDO::FETCH_NUM);
    $num = $numAnnonce->fetch();


    while ($num == true) {
        echo '<br>';
        $AffAnnonce = AffAnnonce($num[0]);
        $AffAnnonce->setFetchMode(PDO::FETCH_NUM);
        $ligne = $AffAnnonce->fetch();
        ?>

        <div id="annonce" onclick="location.href = 'index.php?Gestion=6&NumAnnonce=<?php echo $ligne[0]; ?>';" style="cursor: pointer;">
            <?php
        $image1 = '/../LBL/Image/' . $ligne[0] . '_1.tmp';
            ?>

            <div id="image-produit">
                <img src="<?php echo $image1; ?>" >
            </div>

            <?php
            echo '<br>';
            ?> <div id="NomPrix"> <?php
            echo $ligne[2];
            echo '<br>';
            ?> </p> <?php echo $ligne[3] . '€'; ?> </div> <?php
                echo '<br>';


                echo'</div>';
                echo'</div>';
                echo '<br>';

                $num = $numAnnonce->fetch();
            }
        } else {
            $num = array('1', '2', '3', '4', '5');
            $i = 0;
            while ($i <= 4) {
                $AffAnnonce = AffAnnonce($num[$i]);
                $AffAnnonce->setFetchMode(PDO::FETCH_NUM);
                $ligne = $AffAnnonce->fetch();


                while ($ligne == true) {
                    echo '<br>';
                    ?>

                <div id="annonce" onclick="location.href = '/../LBL/index.php?Gestion=6&NumAnnonce=<?php echo $ligne[0]; ?>';" style="cursor: pointer;">
                    <?php
                  
                    $image1 = '/../LBL/Image/' . $ligne[0] . '_1.tmp';
                    ?> <div id="image-produit">
                        <img src="<?php echo $image1; ?>" >
                    </div>

                    <?php
                    echo '<br>';
                    ?> <div id="NomPrix"> <?php
                    echo $ligne[2];

                    echo '<br>';
                    ?> </p> <?php echo $ligne[3] . '€'; ?> </div> <?php
                        echo '<br>';


                        echo'</div>';
                        echo'</div>';
                        echo '<br>';
                        $ligne = $AffAnnonce->fetch();
                    }
                    $i ++;
                }
            } ?>


