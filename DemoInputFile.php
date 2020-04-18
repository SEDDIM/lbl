<?php
require_once 'Include/entete.php';

if (!isset($_REQUEST['Image'])) {
    $_REQUEST['Image'] = 1;
}
switch ($_REQUEST['Image']) {
    case 1;
        ?>
        <form id="frmFichier" method="post" enctype="multipart/form-data" action="DemoInputFile.php?Image=2" onsubmit="return true;"><?php
            echo '<fieldset>';
            echo '<legend>Formulaire</legend>';
            echo '<p>';
            ?>
            <label> Image à afficher : 
                <input type="hidden" name="MAX_FILE_SIZE" value="150000000" />
                <input  type="file"  name=filNomPhoto1 id=filNomPhoto1" tabindex="10" />
                <br>
                <input  type="file"  name=filNomPhoto2 id=filNomPhoto2" tabindex="20" />
                <br>
                <input  type="file"  name=filNomPhoto3 id=filNomPhoto3" tabindex="30" />
            </label>
            <p>
                <input type="submit" name="BtnSubmit" id="BtnSubmit" value="Telecharger" />
            </p>
        </fieldset>
        </form>
        <?php
        break;
    case 2;
        echo verificationPhoto('filNomPhoto1', 1);
        echo verificationPhoto('filNomPhoto2', 2);
        echo verificationPhoto('filNomPhoto3', 3);
        function fichierTelechargeDeplace($source, $destination) {
            if (is_uploaded_file($source)) {
                move_uploaded_file($source, $destination);
            }
        }

        function fichierTelechargeMessageErreur($codeErreur) {

            $message = '';

            switch ($codeErreur) {
                case UPLUOAD_ERR_INI_SIZE :
                    $message = 'La taille du fichier excede celle qui est precisée pour le parametre upluoad_max_filesize du fichier php.ini.';

                    break;

                case UPLUOAD_ERR_FORM_SIZE:
                    $message = 'La taille du fichier telechargé excede celle qui est precisée dans le formulaire.';

                    break;

                case UPLUOAD_ERR_PARTIAL:
                    unlink($_FILES[$NomControleFile]['tmp_name']);
                    $message = 'Le fichier n\'a été que partiellement telechargé.';

                    break;


                case UPLUOAD_ERR_NO_FILE:
                    $message = 'Aucun fichier n\'a été telechargé.';

                    break;

                case UPLUOAD_ERR_NO_TMP_DIR:
                    $message = 'Le fichier n\'a pas été telechargé car un dossier temporaire est manquant.';

                    break;

                case UPLUOAD_ERR_CANT_WRITE:
                    $message = 'Le fichier n\'a pas été telechargé : echec de l\'ecriture du disque.';

                    break;

                case UPLUOAD_ERR_EXTENSION:
                    $message = 'L\'envoie du fichier a été arreté par lextension.';

                    break;

                default:
                    $message = 'un probleme inconnu est survenu pendant l\'envoie du fichier';
            }

            return $message;
        }

        function fichierTelechargeControle($Nomfichier) {

            $resultat = false;

            //pour les besoin de la demo on limie la taille acceptable de l'image à 200px * 200px

            define('IMG_LARGEUR', 0); //constante utilisées pour manipuler le tableau retourné
            define('IMG_HAUTEUR', 1); //par gatImagesiez()


            if (exif_imagetype($Nomfichier)) {
                $tabTaille = getimagesize($Nomfichier);

                if ($tabTaille[IMG_LARGEUR] > 1000) {
                    echo '<p class="Erreur">Erreur !! La largeur de limage est de ' . $tabTaille[IMG_LARGEUR]
                    . 'px. ELLE doit etre &le; 200px.' . '</p>' . "\n";
                } else {
                    if ($tabTaille[IMG_HAUTEUR] > 1000) {
                        echo '<p class="Erreur">Erreur !! la hauteur de limage est de ' . $tabTaille[IMG_HAUTEUR]
                        . 'px. Elle doit &le; 200px.' . '</p>' . "\n";
                    } else {
                        $resultat = true;
                    }
                }
            } else {
                echo '<p class="Erreur">Erreur !! Le type du fichier nest pas valide .</p>' . "\n";
            }
            return $resultat;
        }

        function verificationPhoto($filNomPhoto, $NumPhoto) {
            if (isset($_FILES[$filNomPhoto])) {

                if ($_FILES[$filNomPhoto]['error'] == UPLUOAD_ERR_OK) {
                    if (fichierTelechargeControle($_FILES[$filNomPhoto]['tmp_name'])) {
                        require_once 'Modele\Modele1.php';

                        $NumAnnonce = $_REQUEST['NumAnnonce'];
                        $extension = pathinfo($_FILES[$filNomPhoto]['tmp_name'], PATHINFO_EXTENSION);
                        $nomImage = $NumAnnonce . '_' . $NumPhoto . '.' . $extension;
                        echo 'tres bien';
                        fichierTelechargeDeplace($_FILES[$filNomPhoto]['tmp_name'], $nomImage);
                        $src = "C:\\wamp\\www\\LBL\\Image\\" . $nomImage;
                        ?><img id="uneImage" src="<?php echo $src ?>" alt="<?php echo $nomImage ?>"/><?php
                    }
                } else {
                    echo '<p class="Erreur">Erreur !!'
                    . fichierTelechargeMessageErreur($_FILES[$filNomPhoto]['error']) . '</p>' . "\n";
                }
            } else {
                echo 'aucune photo selectioné';
            }
        }


        break;
}
?>
    



