<?php
/*
 -------------------------------------------------------------------------
 duplicata plugin for GLPI
 Copyright (C) 2018 by the duplicata Development Team.
 https://github.com/pluginsGLPI/duplicata
 -------------------------------------------------------------------------
 LICENSE
 This file is part of duplicata.
 duplicata is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.
 duplicata is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with duplicata. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

define('PLUGIN_DUPLICATA_VERSION', '1.0.0');

// Minimal GLPI version, inclusive
define("PLUGIN_DUPLICATA_MIN_GLPI_VERSION", "9.3");

// Maximum GLPI version, exclusive
define("PLUGIN_DUPLICATA_MAX_GLPI_VERSION", "10.0");


/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_duplicata() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['duplicata'] = true;

   if (class_exists('PluginDuplicataConfig')) {
      // load javascript files
      $PLUGIN_HOOKS['add_javascript']['duplicata'] = [
         'js/function.js',
         'js/lodash.core.min.js',
         'js/duplicata.js.php',
      ];

      Plugin::registerClass('PluginDuplicataConfig', [
         'addtabon' => 'Config'
      ]);

      $PLUGIN_HOOKS['config_page']['duplicata'] = 'front/config.form.php';
   }
}


/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_duplicata() {
   return [
      'name'           => __('Exploitation de template projet', 'duplicata'),
      'version'        => PLUGIN_DUPLICATA_VERSION,
      'author'         => 'Hugo Morillon',
      'license'        => '<a href="../plugins/duplicata/LICENSE" target="_blank">GPLv3</a>',
      'homepage'       => '',
      'requirements'   => [
         'glpi' => [
            'min' => PLUGIN_DUPLICATA_MIN_GLPI_VERSION,
            'max' => PLUGIN_DUPLICATA_MAX_GLPI_VERSION,
         ]
      ]
   ];
}

/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_duplicata_check_prerequisites() {
   $version = preg_replace('/^((\d+\.?)+).*$/', '$1', GLPI_VERSION);
   $min = version_compare($version, PLUGIN_DUPLICATA_MIN_GLPI_VERSION, '>=');
   $max = version_compare($version, PLUGIN_DUPLICATA_MAX_GLPI_VERSION, '<');

   if (!$min || !$max) {
      echo vsprintf('This plugin requires GLPI >= %1$s and < %2$s.', [
         PLUGIN_DUPLICATA_MIN_GLPI_VERSION,
         PLUGIN_DUPLICATA_MAX_GLPI_VERSION,
      ]);
      return false;
   }

   return true;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_duplicata_check_config($verbose = false) {
   return true;
}
