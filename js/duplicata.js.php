<?php 

include ("../../../inc/includes.php");

//change le mimetype
header("Content-type: application/javascript");


if (isset($_SESSION['glpiactiveprofile']['interface'])
    && $_SESSION['glpiactiveprofile']['interface'] == "central" 
    && Session::haveRight("project", CREATE)
    && Session::haveRight("project", UPDATE)) {

        $testing = GLPI_ROOT;
        $version = GLPI_VERSION;

        $JS = <<<JAVASCRIPT

        var glpi_version = "{$version}";
        glpi_version = glpi_version.replace(/\./g, "") + "000";
        glpi_version = glpi_version.substr(0,3);
    
        duplicata_addCloneLink = function(callback) {
            //seulement sur le formulaire d'édition
            if (getUrlParameter('id') == undefined) {
                return
            }

            if ($("#create_project").length > 0) {
                return;
            }
            // #3A5693
            var project_html = "<i class='fa fas fa-project fa-project-alt pointer' style='font-size: 20px;' id='create_duplicata_project'></i>";


        };
        
    };
}