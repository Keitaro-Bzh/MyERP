<?php
function fn_template_formDeclare ($args = null) {
    switch ($args['position']) {
        case 'debut' :
            fn_template_formDeclareDebut($args);
        break;
        case 'fin':
            fn_template_formDeclareFin($args);
        break;
    }
}

function fn_template_formDeclareDebut($args = null) { 
    // On va déterminer sur une URL est saisie
    $url = !isset($args['url']) ? getenv("HTTP_REFERER") : $args['url'];?>
<div class="box-content">
    <form method="post" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" action="<?php echo $url; ?>">
	    <input type=hidden name="formulaire">
	    <input type=hidden name="class" value="<?php echo  get_class($args['Objet']); ?>">
	    <input type=hidden name="idUser" value="<?php echo $_SESSION['id']; ?>"/>
	    <input type=hidden name="<?php echo $args['Objet']->getClass_baseDefinition()['nomID']; ?>" value="<?php echo $args['Objet']->get_Valeur($args['Objet']->getClass_baseDefinition()['nomID']); ?>"/>
<?php }

function fn_template_formDeclareFin($args = null) { 
        $url = !isset($args['url']) ? getenv("HTTP_REFERER") : $args['urlProvenance'];?>
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                <?php if (isset($url)) { ?>
                    <a class='btn btn-danger btn-xs'
                        <?php if (isset($args['boutonCloseDialog'])) { ?>
                        onclick="$dialog.close()"
                        <?php } else { ?>
                            href="<?php echo $url; ?>"
                        <?php }?>>
                        Annuler
                    </a>
                <?php } ?>
                <?php if (!isset($args['boutonValiderCache'])) { ?>
                    <button type=submit name="enreg" class="btn btn-success btn-xs">Valider</button>
                <?php }?>
            </div>
        </div>
    </form>
</div>
<?php }