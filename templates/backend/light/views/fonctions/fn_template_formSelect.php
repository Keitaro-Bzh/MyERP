<?php
function fn_template_formSelect($args) {
    if ($args['options']) {
        echo '<select name="' . $args['champName'] . '" class="form-control">';
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
        echo '</select>';
    }
    else { ?>
        <input type=text class="form-control" placeholder="Aucune élément défini">
    <?php 
    } 
}
