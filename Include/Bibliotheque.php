<?php



function formImageDepuisRecordset ($type, $id, $name, $recordset){
    
    $CodeHTML = '<input>' .$type;
    $CodeHTML .= 'input id = "' . $id . '"name = "' . $name . '">';
    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();

    while ($ligne == true) {
        $CodeHTML .= '<option value="' . $ligne[0] . '">' . $ligne[1] . ' </option>';
        $ligne = $recordset->fetch();
    }
}


//<input type="file" id="file" name="file" multiple>
function formCategoriesDepuisRecordset($label, $name, $size, $recordset) {

    $CodeHTML = '<label>' . $label;
    $CodeHTML .= '<select name = "' . $name . '" multiple size="' . $size . '">';
    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();


    while ($ligne == true) {
        if (isset($numcategorie)) {
            $numcategorie1 = $numcategorie;
        } else {
            $numcategorie1 = 0;
        }
        $numcategorie = $ligne[1];
        if (($numcategorie1 != $numcategorie) && ($numcategorie1 != 0)) {

            $CodeHTML .= '</optgroup>';
        }
        if ($numcategorie1 != $numcategorie) {

            $CodeHTML .= '<optgroup label="' . $ligne[0] . '">';
            $CodeHTML .= '<option value="' . $ligne[4] . '">' . $ligne[2] . '</option>';
        } else {
            $CodeHTML .= '<option value="' . $ligne[4] . '">' . $ligne[2] . '</option>';
        }
        $ligne = $recordset->fetch();
    } $CodeHTML .= '</select>';
    $CodeHTML .= '</label>';
    return $CodeHTML;
}

function formSelectDepuisRecordset($label, $nom, $id, $recordset) {

    $codeHTML = '<label for="' . $id . '" >' . $label . '</label>'
            . '<select name="' . $nom . '" id="' . $id . '">';
    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();

    while ($ligne == true) {
        $codeHTML .= '<option value="' . $ligne[0] . '">' . $ligne[1] . ' </option>';
        $ligne = $recordset->fetch();
    }
    $codeHTML .= '</select>';

    $recordset->setFetchMode(PDO::FETCH_NUM);
    $ligne = $recordset->fetch();

    while   ($ligne == true) {
//     for ($ligne[1] = 1 ; $ligne[1] < 2 ; $ligne[1] ++ ){


        $CodeHTML .= '<optgroup label="' . $ligne[0] . '">';
        $CodeHTML .= '<option value="' . $ligne[3] . '">' . $ligne[2] . '</option>';
        $CodeHTML .= '</optgroup>';
    }
    $CodeHTML .= '</select>';
    $CodeHTML .= '</label>';
    return $CodeHTML;
}

function verif_alpha($str) {
    preg_match("/([^A-Za-z\s])/", $str, $result);

    if (!empty($result)) {
        return false;
    }
    return true;
}


function formBoutonSubmit($name, $id, $value, $tabindex) {
    $codeHtml = '<input type="submit" name="' . $name . '" id="' . $id
            . '" value="' . $value . '" tabindex="' . $tabindex . '">' . "\n";
    return $codeHtml;
}

function formNumTel($label, $name, $id, $value, $tabindex) {

    $codehtml = '<label for="' . $name . '">' . $label . '</label><input type="tel" name="' . $name . '" id="' . $id . '" value="' . $value . '" tabindex="' . $tabindex . '"pattern="^\+?\s*(\d+\s?){8,}$" required="required" />';
    return $codehtml;
}

function formInputPassword($label, $name, $id, $value, $tabindex, $required, $max, $size) {

    $codeHTML = '<label for="' . $name . '">' . $label . '</label>' . "\n"
            . '<input type="password" value="' . $value . '" size="' . $size . '" maxlength="'
            . $max . '" name="' . $name . '" id="' . $id . '" tabindex="' . $tabindex . '" required="' . $required . '"><br>';
    return $codeHTML;
}

function BoutonChangementPage($name, $action, $value) {
    $codeHtml = '<form name="' . $name . '" action="' . $action . '" method="post">'
            . '<input type="submit" value="' . $value . '"></form>';
    return $codeHtml;
}

function formInputText($label, $name, $id, $value, $tabindex, $required, $max, $size) {

    $codeHTML = '<label for="' . $name . '">' . $label . '</label>' . "\n"
            . '<input type="text" value="' . $value . '" size="' . $size . '" maxlength="'
            . $max . '" name="' . $name . '" id="' . $id . '" tabindex="' . $tabindex . '" required="' . $required . '"><br>';
    return $codeHTML;
}

function BoutonRadio($name, $id, $value, $label, $required) {
    $codeHtml = '<input type= "radio" name="' . $name . '" id="' . $id . '" value="' . $value . '"  required="' . $required . '">' . $label;
    return $codeHtml;
}

function formInputText1($label, $name, $id, $value, $size, $max, $tabindex, $required) {

    $codeHTML = '<label for="' . $name . '">' . $label . '</label>' . "\n"
            . '<input type="text" value="' . $value . '" size="' . $size . '" maxlength="'
            . $max . '" name="' . $name . '" id="' . $id . '" tabindex="' . $tabindex . '" required="' . $required . '"><br>';
    return $codeHTML;
}


function formInputHidden($name, $id, $hiddenvalue) {

    $codeHtml = '<input id="' . $name . '" name="' . $id . '" type="hidden" value="' . $hiddenvalue . '">';
    return $codeHtml;
}


function CryptageMdp($mdp)
{
 $mdpCrypter = md5($mdp);
 return $mdpCrypter;
}

