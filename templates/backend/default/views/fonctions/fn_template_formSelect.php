<?php
function fn_template_formSelect($args,$options = null) { ?>
    <div class='col-md-<?php echo (isset($args['ajoutURL']) ? '11' : '12'); ?> col-xs-12'> 
     <?php
    if ($args['options']) {
        // On va vérifier si on a ajouté des options pour notre class
        if (isset($options['classOptions'])) {
            foreach($options['classOptions'] as $classeOption) {
            
                $classeInput = $classeOption . ' ' . $classeInput;
            }
        }
        else {
            $classeInput = "form-control";
        }
        echo '<select name="' . $args['champName'] . '" class="' . $classeInput . '">';
        $rupture = false;
        $i = 0;
        foreach ($args['options'] as $option) {
            if (isset($option['valueRupture']) && $option['valueRupture']) {
                if ($rupture) { echo '</optgroup>'; }
                echo "<optgroup label='" . $option['valueRupture'] . "'>";
                $rupture = true;
            }
            echo '<option value=' . $option['valueOption'] . ' ' . ($option['valueOption'] === $args['valueSelect'] ? 'SELECTED' : '') .'>' . $option['valueAffiche'] . '</option>';
            if (isset($option['valueRupture']) && count($args['options']) === $i) {
                echo '</optgroup>';
            }
            $i++;
        }
        echo '</select></div>';
    }
    else { ?>
            <input type=text class="form-control" placeholder="Aucune élément défini">
        </div>
    <?php 
    }
     if (isset($args['ajoutURL'])) { ?>
        <div class='col-md-1 col-xs-12 text-center'>
            <a href="<?php echo $args['ajoutURL']; ?>" class="btn btn-success"><i class='fa fa-plus'></i></a>
        </div>
    <?php }
}

?>
