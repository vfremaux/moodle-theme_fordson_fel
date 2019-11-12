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
 * Heading and course images settings page file.
 *
 * @packagetheme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @creditstheme_boost - MoodleHQ
 * @licensehttp://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot.'/theme/fordson_fel/classes/admin_setting_configradio.class.php');

$page = new admin_settingpage($themename.'_breadcrumbsettings', get_string('breadcrumbsettings', 'theme_fordson_fel'));

// Choose breadcrumbstyle.
$name = $themename.'/breadcrumbstyle';
$heading = get_string('breadcrumbstyle', 'theme_fordson_fel');
$description = get_string('breadcrumbstyle_desc', 'theme_fordson_fel');
$default = 1;
$choices = array(
    0 => get_string('breadcrumbstandard', 'theme_fordson_fel'),
    1 => get_string('breadcrumbstyled', 'theme_fordson_fel'),
    4 => get_string('breadcrumbstylednocollapse', 'theme_fordson_fel'),
    2 => get_string('breadcrumbsimple', 'theme_fordson_fel'),
    3 => get_string('breadcrumbthin', 'theme_fordson_fel'),
    -1 => get_string('nobreadcrumb', 'theme_fordson_fel')
);
$images = array(
    0 => 'breadcrumbstandard',
    1 => 'breadcrumbstyled',
    4 => 'breadcrumbstylednocollapse',
    2 => 'breadcrumbsimple',
    3 => 'breadcrumbthin'
);
$setting = new fordson_fel_admin_setting_configradio($name, $heading, $description, $default, $choices, false, $images);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/breadcrumbskiprootnode';
$heading = get_string('breadcrumbskiprootnode', 'theme_fordson_fel');
$description = get_string('breadcrumbskiprootnode_desc', 'theme_fordson_fel');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $heading, $description, $default);
$page->add($setting);

$name = $themename.'/breadcrumbmaskfirstcat';
$heading = get_string('breadcrumbmaskfirstcat', 'theme_fordson_fel');
$description = get_string('breadcrumbmaskfirstcat_desc', 'theme_fordson_fel');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $heading, $description, $default);
$page->add($setting);

if (is_dir($CFG->dirroot.'/local/my')) {
    $name = $themename.'/breadcrumbmaskcatsforstudents';
    $heading = get_string('breadcrumbmaskcatsforstudents', 'theme_fordson_fel');
    $description = get_string('breadcrumbmaskcatsforstudents_desc', 'theme_fordson_fel');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $heading, $description, $default);
    $page->add($setting);
}

$name = $themename.'/breadcrumbkeeplastcatonly';
$heading = get_string('breadcrumbkeeplastcatonly', 'theme_fordson_fel');
$description = get_string('breadcrumbkeeplastcatonly_desc', 'theme_fordson_fel');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $heading, $description, $default);
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
