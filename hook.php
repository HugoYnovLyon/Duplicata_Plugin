<?php

/*
----------------
code inspired by ChildTicketManager PLUGIN for GLPI developped by 
---------------- 
*/

/**
 * Plugin install process
 *
 * @return boolean
 */
function plugin_duplicata_install() {
   PluginDuplicataConfig::initConfig();

   return true;
}

/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_duplicata_uninstall() {
   $config = new Config;
   return $config->deleteByCriteria([
      'context' => 'plugin:duplicata'
   ]);
}