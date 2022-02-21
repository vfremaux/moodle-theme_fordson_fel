<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file keeps track of upgrades to the wiki module
 *
 * Sometimes, changes between versions involve
 * alterations to database structures and other
 * major things that may break installations.
 *
 * The upgrade function in this file will attempt
 * to perform all the necessary actions to upgrade
 * your older installation to the current version.
 *
 * @package theme_fordson_fel
 * @copyright 2010
 * @author Valery Fremaux (valery.fremaux@gmail.com)
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 *
 */
defined('MOODLE_INTERNAL') || die;

function xmldb_theme_fordson_fel_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    // Moodle v2.2.0 release upgrade line.
    // Put any upgrade step following this.

    // Moodle v2.3.0 release upgrade line.
    // Put any upgrade step following this.

    if ($oldversion < 2019030600) {
        $sql = '
            UPDATE 
                {config_plugins}
            SET
                name = "sectionstyles"
            WHERE
                name = "flexsectionstyles"
        ';
        $DB->execute($sql);

        $sql = '
            UPDATE 
                {config_plugins}
            SET
                name = "sectionstyleimages"
            WHERE
                name = "flexsectionstyleimages"
        ';
        $DB->execute($sql);

        $sql = '
            UPDATE 
                {files}
            SET
                filearea = "sectionimages"
            WHERE
                filearea = "flexsectionimages"
        ';
        $DB->execute($sql);

        upgrade_plugin_savepoint(true, 2019030600, 'theme', 'fordson_fel');
    }

    if ($oldversion < 2022021600) {
        // Remap old config keys "bg" to "bkg"

        $themeconfig = get_config('theme_fordson_fel');
        foreach ($themeconfig as $key => $value) {
            if (preg_match('/bg$/', $key)) {
                $newkey = preg_replace('/bg$/', 'bkg', $key);
                set_config($newkey, $themeconfig->$key, 'theme_fordson_fel');
                set_config($key, null, 'theme_fordson_fel');
            }
            if (preg_match('/bghov$/', $key)) {
                $newkey = preg_replace('/bghov$/', 'bkghov', $key);
                set_config($newkey, $themeconfig->$key, 'theme_fordson_fel');
                set_config($key, null, 'theme_fordson_fel');
            }
            if (preg_match('/background$/', $key)) {
                // Essentially bodybackground.
                $newkey = preg_replace('/background$/', 'bkg', $key);
                set_config($newkey, $themeconfig->$key, 'theme_fordson_fel');
                set_config($key, null, 'theme_fordson_fel');
            }
        }

        upgrade_plugin_savepoint(true, 2022021600, 'theme', 'fordson_fel');
    }

    return true;
}
