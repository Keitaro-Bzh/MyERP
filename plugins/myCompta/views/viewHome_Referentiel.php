<div class='row'> 
    <?php fn_template_cadre(array("position" => "debut","type" => "cadreAvecTitre","titre" => $titrePage));?>
    <div class="col-md-12 margin-bottom-20">
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active myEventJS" id='tabTiers'><a href="#Tiers" id="Tiers-tab" role="tab" data-toggle="tab" aria-controls="Tiers" aria-expanded="true">Tiers</a></li>
            <li role="presentation" class="myEventJS" id='tabCompte'><a href="#Compte" id="Compte-tab" role="tab" data-toggle="tab" aria-controls="Compte" aria-expanded="true">Coordonnées bancaires</a></li>
            <li role="presentation" class="myEventJS" id='tabCategorie'><a href="#Categorie" role="tab" id="Categorie-tab" data-toggle="tab" aria-controls="Categorie">Catégorie</a></li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade in active" role="tabpanel" id="Tiers" aria-labelledby="Tiers-tab">
                <div class='row'>
                    <div class='col-md-3'>
                        <!-- <div class="checkbox circled info"><input type="checkbox" id="chkOnArchive"><label for="chkOnArchive">Affichage archivé(s)</label></div> -->
                    </div>
                    <div class='col-md-9 text-right'>
                        <ul class="list-inline">
                            <li>
                                <a href="index.php?module=myCompta&rubrique=Banque&action=ajout" class="btn btn-success btn-xs"><i class='fa fa-plus'></i> Banque</a>
                                <a href="index.php?module=myCompta&rubrique=Titulaire&action=ajout" class="btn btn-info btn-xs"><i class='fa fa-plus'></i> Titulaire</a>
                                <a href="index.php?module=myCompta&rubrique=Tiers&action=ajout" class="btn btn-warning btn-xs"><i class='fa fa-plus'></i> Tiers</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='row'>
                    <div id=divTiers></div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="Compte" aria-labelledby="Compte-tab">
                <div class='row'>
                    <div class='col-md-9'>
                        <!-- <div class="checkbox circled info"><input type="checkbox" id="chkOnArchive"><label for="chkOnArchive">Affichage archivé(s)</label></div> -->
                    </div>
                    <div class='col-md-3 text-right'>
                        <ul class="list-inline">
                            <li>
                                <a href="index.php?module=myCompta&rubrique=Compte&action=ajout" class="btn btn-info btn-xs"><i class='fa fa-plus'></i> Compte</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='row'>
                    <div id=divCompte></div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="Categorie" aria-labelledby="Categorie-tab">
                <div class='row'>
                    <div class='col-md-3'>
                        <!-- <div class="checkbox circled info"><input type="checkbox" id="chkOnArchive"><label for="chkOnArchive">Affichage archivé(s)</label></div> -->
                    </div>
                    <div class='col-md-9 text-right'>
                        <ul class="list-inline">
                            <li>
                                <a href="index.php?module=myCompta&rubrique=Famille&action=ajout" class="btn btn-success btn-xs"><i class='fa fa-plus'></i> Catégorie</a>
                                <a href="index.php?module=myCompta&rubrique=Categorie&action=ajout" class="btn btn-info btn-xs"><i class='fa fa-plus'></i> Sous-Catégorie</a>
                                
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='row'>
                    <div id=divCategorie></div>
                </div>
            </div>
        </div>
    </div>
    <?php fn_template_cadre(array('position' => 'fin')); ?>
</div>