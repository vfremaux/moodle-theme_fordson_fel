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
* @creditstheme_fordson_fel - MoodleHQ
* @licensehttp://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage($themename.'_content', get_string('contentsettings', 'theme_fordson_fel'));

// Content Info.
$name = $themename.'/textcontentinfo';
$title = get_string('textcontentinfo', 'theme_fordson_fel');
$description = get_string('textcontentinfodesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

// Frontpage Textbox.
$name = $themename.'/fptextbox';
$title = get_string('fptextbox', 'theme_fordson_fel');
$description = get_string('fptextbox_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Frontpage Textbox Logged Out.
$name = $themename.'/fptextboxlogout';
$title = get_string('fptextboxlogout', 'theme_fordson_fel');
$description = get_string('fptextboxlogout_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Alert setting.
$name = $themename.'/alertbox';
$title = get_string('alert', 'theme_fordson_fel');
$description = get_string('alert_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Signal new items.
$name = $themename.'/signalitemsnewerthan';
$title = get_string('signalitemsnewerthan', 'theme_fordson_fel');
$description = get_string('signalitemsnewerthan_desc', 'theme_fordson_fel');
$default = 0;
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

// Signal new items.
$name = $themename.'/flexinitialstate';
$title = get_string('flexinitialstate', 'theme_fordson_fel');
$description = get_string('flexinitialstate_desc', 'theme_fordson_fel');
$default = 'collapsed';
$options = array(
    'collapsed' => get_string('flexcollapsed', 'theme_fordson_fel'),
    'expanded' => get_string('flexexpanded', 'theme_fordson_fel'),
    'reset' => get_string('flexreset', 'theme_fordson_fel')
);
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
