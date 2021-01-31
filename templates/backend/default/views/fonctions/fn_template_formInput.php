<?php

function fn_template_formInput($args,$options =null) {
    // On va vérifier si on affiche un libellé ou pas
    if (isset($args['Label'])) { 
        $tailleInput = 8;
    }
    else {
        $tailleInput = 12;
    }

    // On va personnaliser notre champ en fonction du type demandé
    $classeInput = "form-control";
    $controlInput = null;
    $modeInput = 'input';
    $placeHolder = isset($args['placeholder']) ? $args['placeholder'] : null;
    switch ($args['TypeChamp']) {
        case 'prenom':
            $classeInput = $classeInput . ' controlForm-prenom';
            break;
        case 'nom':
            $classeInput = $classeInput . ' controlForm-nom';
            break;
        case 'entier':
            $classeInput = $classeInput . ' controlForm-entier';
            break;
        case 'date':
            $args['ValeurChamp'] = $args['ValeurChamp'] ? $args['ValeurChamp'] : date("Y-m-d");
            break;
        case 'checkbox':
            $classeInput = "checkbox";
            $checkBoxOn = isset($args['ValeurChamp']) ? true : false;
            break;
        case 'select':
            $modeInput = 'select';
            break;
        case 'radio':
            $classeInput = "";
            $modeInput = 'radio';
            break;
        case 'email':
            $classeInput = $classeInput . ' controlForm-email';
            $placeHolder = 'email';
            $inputLogo = 'fa fa-envelope';
            break;
        case 'telephone':
            $classeInput = $classeInput . ' controlForm-tel';
            $placeHolder = 'Téléphone';
            $inputLogo = 'fa fa-phone';
            break;
        case 'mobile':
            $classeInput = $classeInput . ' controlForm-tel';
            $placeHolder = 'Mobile';
            $inputLogo = 'fa fa-mobile-phone';
            break;
    }
    // On va vérifier si on a ajouté des options pour notre class
    if (isset($options['classOptions'])) {
        foreach($options['classOptions'] as $classeOption) {
           
            $classeInput = $classeOption . ' ' . $classeInput;
        }
    }

    /* Partie affiche et mise en forme */
    // On ne va afficher notre label que si celui-ci a été renseigné
    if ($tailleInput === 8) { ?>
        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
            <label class='col-sm-9 control-label'><?php echo $args['Label']; ?></label>
        </div>
    <?php } ?>
    <div class="col-md-<?php echo $tailleInput; ?> col-sm-<?php echo $tailleInput; ?> col-xs-12 form-group has-feedback">
        <?php
        if (isset($args['divEntoure'])) { echo '<div id="' . $args['divEntoure'] . '">'; }
        /* On va personnaliser en fonction dy type de champ et des paramètres définiss ci-dessus */
        switch ($modeInput) {
            case 'select':
                echo "<div id='divSelect" . $args['DivChamp'] . "'></div>";
            break;
            case 'radio':
                if ($args['OptionValues']) { ?>
                    <ul class="list-inline"><?php
                        foreach ($args['OptionValues'] as $valeur) { 
                            // On va définir si la radio est Check
                            $onCheck = false;
                            if (!isset($args['ValeurChamp']) && (isset($valeur['valueDefault'])) && $valeur['valueDefault']) { $onCheck = true; }
                            if (strcmp($valeur['value'],$args['ValeurChamp']) === 0) { $onCheck = true; } ?>
                            <li>
                                <div class="radio info">
                                    <input type="radio" value="<?php echo $valeur['value']; ?>" name="<?php echo $args['NameChamp']; ?>" id="<?php echo $args['NameChamp'] . $valeur['value']; ?>" <?php echo (($onCheck) ? " CHECKED" : ''); ?>>
                                    <label for="<?php echo $args['NameChamp'] . $valeur['value']; ?>"><?php echo $valeur['valueAffiche']; ?></label>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php }
            break;
            case 'textLogo': ?>
            	<div class="input-group margin-bottom-20">
                    <!-- /.input-group-btn -->
                    <input id="<?php echo $args['NameChamp']; ?>" name="<?php echo $args['NameChamp']; ?>" type="text" class="form-control <?php echo $classeInput; ?>" <?php echo (isset($placeHolder) ? 'placeholder="' . $placeHolder . '"' : ''); ?>>
                    <div class="input-group-btn"><label for="<?php echo $args['NameChamp']; ?>" class="btn btn-default"><i class="<?php echo $inputLogo; ?>"></i></label></div>
                </div><?php
            break;
            default : ?>
                <input class="<?php echo $classeInput; ?>" 
                    type="<?php echo $args['TypeChamp']; ?>"
                    name="<?php echo $args['NameChamp']; ?>"
                    id="<?php echo (isset($args['idChamp']) ? $args['idChamp'] : $args['NameChamp']); ?>"
                    <?php echo ($args['ValeurChamp'] ? "value='" . $args['ValeurChamp'] . "' " : ' '); 
                        echo (isset($checkBoxOn) && ($checkBoxOn) ? "CHECKED" : ' '); ?>
                />
                <?php 
                
            break;
        } 
        if (isset($args['divEntoure'])) { echo '</div>'; } ?>
    </div>
    <?php
}

function fn_template_formOnArchive($args) { ?>
    <div class="col-md-12 col-sm-12 col-xs-12 text-right margin-bottom-10">
        <div class="checkbox circled danger">
            <input type="checkbox" name="<?php echo $args['NameChamp']; ?>" <?php echo (isset($args['ValeurChamp']) ? 'checked' : ''); ?> id="checkbox-circled-6">
            <label for="checkbox-circled-6"><?php echo $args['Label']; ?></label>
        </div>
	</div>
<?php }

function fn_template_formImagePreview($args) { ?>
    <div class="box-content">
        <input type="file" id="input-file-now-custom-1" name="<?php echo $args['NameChamp']; ?>" class="dropify" data-default-file="<?php echo $args['ValeurChamp']; ?>" />
    </div>
<?php }