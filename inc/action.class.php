<?php

class PluginDuplicataAction {

    static function getTemplate($params = []) {
        
        $project = new Project();
        $project->getFromDB((int) $params['project_id']);
    
        return $project->getProjectTemplateToUse(0, $project->getField(''));
    }

    static function save($params = []) {
        global $DB;

        $template_project = new Project();
        $template_project->getFromDEB((int) $params['project_id']);

        $new_project = new Project();
        $template = $new_project->getProjectTemplateToUse(0, $template_project->fields[''], $params['']);
    }
}