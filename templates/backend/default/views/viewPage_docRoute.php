<div class="page-title">
        <div class="title_left">
            <h3>DOCUMENTATION : LE ROUTAGE</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Définition</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <p class="text-justify">
                Le routage au sein de l'application est essentiel. L'objectif visé est de pouvoir créer des pages de manière dynamqiue.
                Pour cela, il faut donc procéder de manière ordonnée et structurée. C'est ainsi que le routage se fera toujours selon un schéma précis.
                </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Fonctionnement</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-justify">
                    Le fonctionnement est relativement simple une fois que l'on a posé l'occasture de notre site. On peut distinguer 2 parties sur notre site.
                    <ul>
                        <li>La partie du site statique (nos pages d'accueil, à propos par exemple)</li>
                        <li>La partie du site dynamique (le contenu de nos plugins)</li>
                    </ul>
                    </p>

                    <p class="text-justify">
                        Cependant, dans les deux cas, le routage de base aura la même base. A chaque chargement de page ne rentrant pas dans un chargement type AJAX,
                        le routage passera par le chemin <strong>.\index.php > .\frameworks\myFramework\MyERP.php </strong>
                        Ce dernier fichier va nous permettre de distinguer si le routage doit se faire vers un plugin ou pas. <u>Dans tous les cas, nous définirons une variable
                        <strong>$corpsPage</strong> qui sera la page affiché dans votre navigateur</u>. 
                    </p>
                    <p class="text-justify">
                        Dans le cas ou la navigation se fait sur des pages statiques, le site sera routé soit directement vers une page depuis le dossier <strong>.\templates\<i>__templateActif__</i>\views</strong>,
                        soit vers un fichier se trouvant dans le dossier <strong>.\main\viewModels</strong>. Cette page vous servira donc à préparer l'affichage, récupérer les données, etc.
                    </p>
                    <p class="text-justify">
                        Dans le cas de la navigation à travers un plugin, le routage continuera à travers le fichier <strong>.\frameworks\myFramework\fonctions\fnPluginRoutagePage.php</strong>. Ce fichier définira si
                        un tableau de bord doit être chargé depuis le fichier <strong>.\plugins\<i>__plugins__</i>\<i>__plugin__</i>.php</strong>. Si nous sommes dans le case d'une rubrique du 
                        plugin, il va charger le fichier <strong>.\frameworks\myFramework\fonctions\fnPluginConstitutionPage.php</strong> qui vérifiera si des actions sont en cours et quelle page afficher.
                    </p>

                    <p class="text-justify">
                        Par ce routage, toutes les adresses seront donc vérifiées et les droits analysés à chaque chargement.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Exemple</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                </div>
            </div>
        </div>
    </div>
</div>