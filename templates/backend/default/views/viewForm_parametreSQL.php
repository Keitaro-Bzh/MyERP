
<form class="form-horizontal" method=post href='#'>
    <input type=hidden name='formulaire' value ='sql'>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type de serveur</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <select class="form-control" name=baseType DISABLED>
                <option value='mysql' <?php echo ($maConfig['baseType'] === 'mysql' ? 'SELECTED' : ''); ?>>MySQL
                <option value='oracle' <?php echo ($maConfig['baseType'] === 'oracle' ? 'SELECTED' : ''); ?>>Oracle
                <option value='mssql' <?php echo ($maConfig['baseType'] === 'mssql' ? 'SELECTED' : ''); ?>>MS-SQL
                <option value='nosql' <?php echo ($maConfig['baseType'] === 'nosql' ? 'SELECTED' : ''); ?>>NoSQL
                <option value='sybase' <?php echo ($maConfig['baseType'] === 'sybase' ? 'SELECTED' : ''); ?>>Sybase
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Adresse du serveur</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name='adress' class="form-control" value='<?php echo ($maConfig['baseAddress'] ? $maConfig['baseAddress']: ''); ?>'' DISABLED>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Port</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name='port' class="form-control" value='<?php echo ($maConfig['basePort'] ? $maConfig['basePort']: ''); ?>'' DISABLED>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom de la base de données</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name='baseName' class="form-control" value='<?php echo ($maConfig['baseName'] ? $maConfig['baseName']: ''); ?>'' DISABLED>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Utilisateur</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name='username' class="form-control" value='<?php echo ($maConfig['baseUser'] ? $maConfig['baseUser']: ''); ?>'' DISABLED>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mot de passe</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="password" name='password' class="form-control" value='<?php echo ($maConfig['basePass'] ? $maConfig['basePass']: ''); ?>'' DISABLED>
        </div>
    </div>
</form>