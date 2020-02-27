<?php
require_once('../../../inc/inculdes.php');

//Vérifie si l'utilisateur courrant a les droit de configurer
Session::checkRigth("config", UPDATE);

//Vérifie si le plugin est activé
$plugin = new Plugin();

if (!$plugin->isActivated('duplicata')) {
    Html::displayNotFoundError();
}

//Search::show('Plugin/DuplicataConfig');

Html::redirect($CFG_GLPI["root_doc"]."/front/config.form.php?foretab=PluginDuplicataConfig\$1");

Html::footer();