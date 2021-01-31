<?php fn_template_cadre(array('position' => 'debut', 'titre' => 'Configuration du site')); ?>
    <div class="col-md-12 margin-bottom-20">
        <ul class="nav nav-tabs nav-justified" id="myTabs-justified" role="tablist">
            <li role="presentation" class="active"><a href="#affichage-justified" id="affichage-tab-justified" role="tab" data-toggle="tab" aria-controls="affichage" aria-expanded="true">Affichage</a></li>
            <li role="presentation"><a href="#database-justified" role="tab" id="database-tab-justified" data-toggle="tab" aria-controls="database">Base de données</a></li>
            <li role="presentation"><a href="#users-justified" role="tab" id="users-tab-justified" data-toggle="tab" aria-controls="users">Utilisateurs</a></li>
        </ul>
        <div class="tab-content" id="myTabContent-justified">
            <div class="tab-pane fade in active" role="tabpanel" id="affichage-justified" aria-labelledby="affichage-tab-justified">
                <?php include 'viewForm_parametreSite.php'; ?>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="database-justified" aria-labelledby="database-tab-justified">
                <?php include 'viewForm_parametreSQL.php'; ?>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="users-justified" aria-labelledby="users-tab-justified">
                <?php include 'viewForm_parametreUsers.php'; ?>
            </div>
        </div>
    </div>
<?php fn_template_cadre(array('position' => 'fin')); ?>