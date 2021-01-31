<div class="title_right">
    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right">
        <div class="form-inline">
                <div class="input-group">
                    <select id='nomCle' class="form-control">
                        <?php foreach ($argsPage['champRecherche'] as $cle  => $champ) { 
                            if ($champ['afficheOn']) {?>
                                <option value=<?php echo $cle; ?>><?php echo $champ['libelleAffiche']; ?></option>
                            <?php }	
                        } ?>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>

    </div>
</div>