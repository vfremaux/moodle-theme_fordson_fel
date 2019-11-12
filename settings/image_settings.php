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

$page = new admin_settingpage('theme_fordson_fel_images', get_string('imagesettings', 'theme_fordson_fel'));

// Show hide user enrollment toggle.
$name = 'theme_fordson_fel/showcourseheaderimage';
$title = get_string('showcourseheaderimage', 'theme_fordson_fel');
$description = get_string('showcourseheaderimage_desc', 'theme_fordson_fel');
$default = 1;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Favicon upload.
$name = 'theme_fordson_fel/favicon';
$title = get_string ( 'favicon', 'theme_fordson_fel' );
$description = get_string ( 'favicon_desc', 'theme_fordson_fel' );
$setting = new admin_setting_configstoredfile( $name, $title, $description, 'favicon', 0,
    array('maxfiles' => 1, 'accepted_types' => array('png', 'jpg', 'ico')));
$setting->set_updatedcallback ( 'theme_reset_all_caches' );
$page->add($setting);

// logo image.
$name = 'theme_fordson_fel/headerlogo';
$title = get_string('headerlogo', 'theme_fordson_fel');
$description = get_string('headerlogo_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'headerlogo');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Alternate site name.
$name = 'theme_fordson_fel/sitealternatename';
$title = get_string('sitealternatename', 'theme_fordson_fel');
$description = get_string('sitealternatename_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

// Default header image.
$name = 'theme_fordson_fel/headerdefaultimage';
$title = get_string('headerdefaultimage', 'theme_fordson_fel');
$description = get_string('headerdefaultimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'headerdefaultimage');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Default background image.
$name = 'theme_fordson_fel/backgroundimage';
$title = get_string('backgroundimage', 'theme_fordson_fel');
$description = get_string('backgroundimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Default login page image.
$name = 'theme_fordson_fel/loginimage';
$title = get_string('loginimage', 'theme_fordson_fel');
$description = get_string('loginimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'loginimage', 0, 
    ['maxfiles' => 20, 'accepted_types' => ['.jpg', '.gif', '.svg', '.png']]);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
