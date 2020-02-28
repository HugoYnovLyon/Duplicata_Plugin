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

            if ($("#create_duplicata").length > 0) {
                return;
            }
            // #3A5693
            var project_html = "<input class='submit' type='submit' name='newproject' id='create_duplicata'></input>";


            $("td:contains('{$add_dropdowngroups}')>span.fa")
                .after(project_html);
            callback();
        };

        duplicata_bindClick = _.once(function()) {
            $(document).on("click", "#create_duplicata"), _.once(function(e) {
                $.ajax({
                    url: '../plugins/duplicata/ajax/duplicata.php' ,
                    data: {
                        'projects_id' : getUrlParameter('id')
                    },
                    success: function(response, opts) {
                        $("[id^='add_dropdowngroups']")
                    }
                })
            });
        }

    });
JAVASCRIPT;
    echo $JS;
}
