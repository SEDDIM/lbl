<?php
require_once '/../LBL/Modele/Modele1.php';
require '/../Include/Bibliotheque.php';

$NumAnnonce = $_REQUEST['NumAnnonce'];
$Info = Annonce($NumAnnonce);
$Info->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $Info->fetch();
?>   <link rel="stylesheet" type="text/css" href="/../Style/style.css"  />
<div id="conversation">
    <div id="message_annonce"> 
        <div id="Haut">
            <div class="avatar-date">
                <img src="Image/avatar.png" width="50px" height="50px">
            </div>    
            <div class="nom-annonce">
                <?php echo $ligne['NOM']; ?>
            </div>    
        </div>
        <div id="Message">
            <?php echo $ligne['DESCRIPTION']; ?>
            <br>
            Prix Location  :  
            <?php
            echo $ligne['PRIX_JOUR'];
            echo '€/jour';
            ?>
            <br>
            Prix de Caution :
            <?php echo $ligne['PRIX_D_ACHAT']; ?>
        </div>
    </div>
    <?php
    if (!isset($_REQUEST['Conv'])) {
        $_REQUEST['Conv'] = 1;
    }

    switch ($_REQUEST['Conv']) {

        case 1;
            if (isset($_SESSION['EMAIL'])) {
                $readonly = true;
                $action = '/./LBL/index.php?Gestion=6&Conv=2&NumAnnonce=' . $NumAnnonce;
            } else {
                $readonly = FALSE;
                $action = '/./LBL/index.php?Gestion=6&Conv=3&NumAnnonce=' . $NumAnnonce;
            }
            echo '<form name="BtnCnt" action="' . $action . '" method="post" style="margin-top: 20px;">';
            echo formInputTextreadonly('', 'txtPremierMsj', 'txtPremierMsj', '', 10, false, 30, 30);
            echo '<input type="submit" value="Contacter" readonly></form>';
            echo '</div>';
            break;

        case 2;
            $NUMCONVERSATION = CreateNumConversation();
            insertPremierMessage($NUMCONVERSATION, $_SESSION['EMAIL'], $ligne['NOM']);
            insertPremierMessage($NUMCONVERSATION, $_SESSION['EMAIL'], $ligne['DESCRIPTION']);
            $msj3 = 'Prix Location  : ' . $ligne['PRIX_JOUR'] . '€/jour';
            insertPremierMessage($NUMCONVERSATION, $_SESSION['EMAIL'], $msj3);
            $msj4 = 'Prix de Caution : ' . $ligne['PRIX_D_ACHAT'];
            insertPremierMessage($NUMCONVERSATION,$_SESSION['EMAIL'], $msj4);
            $MessageContact = $_REQUEST['txtPremierMsj'];
            insertMessageContact($NUMCONVERSATION, $_SESSION['EMAIL'], $MessageContact);
          ?><div id="PremierMsj">
                <div id= "Haut">
                <?php echo $_SESSION['EMAIL']; ?>   
                </div>
                <div id = "Message">
        <?php echo $_REQUEST['txtPremierMsj'];
        ?>      </div></div></div>
<?php 
echo BoutonChangementPage("BtnMSJ", "index.php?Gestion=10&NUMCONVERSATION=".$NUMCONVERSATION, "Voir la conversation");
                    break;
                case 3;
                    echo 'Veuiller vous identifier.';
        echo BoutonChangementPage("Connexion", "index.php?action=1&Gestion=5&Connexion=3", "Connexion");
        echo BoutonChangementPage("Inscription", "index.php?Gestion=4", "Inscription");
                    break;
            }
            $NumVendeur = GetNumeroVendeur($NumAnnonce);
            ?>








<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://flickity.metafizzy.co/flickity.pkgd.min.js"></script>
<script src="JavaScript/Jslider.js"></script>
<link rel="stylesheet" href="Style/css.css">  






<div id="container">

<?php
$image1 = GetPhoto(GetNumPhoto($NumAnnonce, 1));
$image2 = GetPhoto(GetNumPhoto($NumAnnonce, 2));
$image3 = GetPhoto(GetNumPhoto($NumAnnonce, 3));
$NombreImage=SelectNombreImage(GetNumPhoto($NumAnnonce, 1),GetNumPhoto($NumAnnonce, 2),GetNumPhoto($NumAnnonce, 3));
?>
    <div id="slider-1">
        <ul class="slides">
            <li class="gallery-cell">
               <!--<img src="https://unsplash.it/400/500?image=530" />-->
                <img src="<?php echo $image1; ?>" >
            </li>
<?php if ($NombreImage > 1) { ?>
                <li class="gallery-cell">
                    <img src="<?php echo $image2; ?>" >
                </li>
<?php } ?>
<?php if ($NombreImage == 3) { ?>
                <li class="gallery-cell">
                    <img src="<?php echo $image3; ?>">
                </li>
<?php } ?>
        </ul>
    </div>

    <div id="slider-2">
        <ul class="slides">
<?php if ($NombreImage > 1) { ?>
                <li class="gallery-cell">
                   <!--<img src="https://unsplash.it/400/500?image=530" />-->
                    <img src="<?php echo $image1; ?>" >
                </li>
<?php } ?>
            <?php if ($NombreImage > 1) { ?>
                <li class="gallery-cell">
                    <img src="<?php echo $image2; ?>" >
                </li>
<?php } ?>
            <?php if ($NombreImage == 3) { ?>
                <li class="gallery-cell">
                    <img src="<?php echo $image3; ?>">
                </li>
<?php } ?>
        </ul>
            <?php if ($NombreImage > 1) { ?>
            <button class="btn-next">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.3 13.4">
                <path id="arrow-line" fill="#231F20" d="M0 5.9h28.7v1H0z"/>
                <path fill="#231F20" d="M24.1 13.4l-.8-.6 4.8-6.4L23.3 0l.8-.6 5.2 7"/>
                </svg>
            </button>
<?php } ?>
    </div>


    <script>
        var $gallery1 = $('#slider-1 .slides').flickity({
            pageDots: false,
            prevNextButtons: false,
            wrapAround: true,
            draggable: false
        });

        var $gallery2 = $('#slider-2 .slides').flickity({
            pageDots: false,
            prevNextButtons: false,
            initialIndex: 1,
            wrapAround: true,
            draggable: false
        });

        $('.btn-next').on('click', function () {
            $gallery1.flickity('next');
            $gallery2.flickity('next');
        });
    </script>
</div>

<?php               













