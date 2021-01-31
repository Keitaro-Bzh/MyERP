<?php

function fn_template_cadre($args) {
   
    switch ($args['position']) {
        case 'debut': 
            $param = array(
                'taille' => isset($args['taille']) ? $args['taille'] : 12,
                'type' => isset($args['type']) ? 'card' : '',
                'titre' => isset($args['titre']) ? $args['titre'] : false,
            );
            fn_template_cadreDebut($param);
        break;
        case 'fin':
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        break;
    }


}

function fn_template_cadreDebut ($param) { ?>
    <div class="col-md-<?php echo $param['taille']; ?> col-xs-12">
        <div class="box-content <?php echo $param['type']; ?> white">
            <?php if ($param['titre']) { ?>
            <h4 class="box-title"><?php echo $param['titre']; ?></h4>
            <div class="card-content">
            <?php } ?>
<?php }