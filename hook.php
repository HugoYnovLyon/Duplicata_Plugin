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