<?php

class PluginDuplicataConfig extends Config {
    const CONTEXT = 'plugin:duplicata';

    static function getTypeName($nb = 0) {
        return __("Duplicata projet", "duplicata");
    }

    static function getConfig(){
        return Config::getConfigurationValues(self::CONTEXT);
    }

    static function initConfig() {
        return Config::getConfigurationValues(self::CONTEXT, [
            'duplicata_dump_project'    => 0,
            'duplicata_dump_projecttasks'   => 0,
        ]);
    }

    function getTabNameForItem(CommonGLPI $item, $withtemplate = 0) {
        switch($item->getType()) {
            case "Config":
                return self::createTabEntry(self::getTypeName());
        }
        return '';

    }

    static function displayTabContentForItem(CommonGLPI $item, $tabnum = 1, $withtemplate = 0 ){
        switch ($item->getType()) {
            case "Config":
                return self::showFormConfig($item , $withtemplate); 
            }
            return true;
    }

    static function showForConfig() {
        if (!$canedit = Session::haveRight(self::$rightname, UPDATE)) {

        }

        $current_config = self::getConfig();
        $current_config[''];
    }
    
}