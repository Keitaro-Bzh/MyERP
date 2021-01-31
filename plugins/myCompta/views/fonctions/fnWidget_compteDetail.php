<?php
function fnWidget_compteDetail ($args = null) { ?>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="box-content">
            <h4 class="box-title">
                <a href="index.php?module=myCompta&rubrique=Compte&action=affiche&id=<?php echo $args['compte']->get_Valeur('idCompte'); ?>"><i class="fa fa-table"></i>  <?php echo $args['compte']->get_Valeur('libelleCompte'); ?> (<?php echo $args['compte']->get_ValeurClasse('Titulaire','prenom'); ?>)</a>
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <label>Solde cours</label>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-right form-group has-feedback">
                        <label>0.00 €</label>
                    </div>
                    <?php if (strcmp($args['compte']->get_Valeur('typeCompte'),'C') === 0) { ?>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                            <label>Solde réel</label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-right form-group has-feedback">
                            <label>0.00 €</label>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                            <label>Solde fin de mois</label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-right form-group has-feedback">
                            <label>0.00 €</label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php }

function fnWidget_compteTitreDetail ($args = null) { ?>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="box-content">
            <h4 class="box-title">
                <a href="index.php?module=myCompta&rubrique=Action&action=afficheCompte&id=<?php echo $args['compte']->get_Valeur('idCompte'); ?>"><i class="fa fa-table"></i> <?php echo $args['compte']->get_Valeur('libelleCompte'); ?> (<?php echo $args['compte']->get_ValeurClasse('Titulaire','prenom'); ?>)</a>
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <label>Espèces disponibles</label>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-right form-group has-feedback">
                        <label>0.00 €</label>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <label>Total Titre</label>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-right form-group has-feedback">
                        <label>0.00 €</label>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <label>Total Titre SRD</label>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-right form-group has-feedback">
                        <label>0.00 €</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php }
