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
* Social networking settings page file.
*
* @package    theme_fordson_fel
* @copyright  2016 Chris Kenniburg
* 
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

// Icon Navigation);
$page = new admin_settingpage($themename.'_customlogin', get_string('customloginheading', 'theme_fordson_fel'));

// This is the descriptor for icon One.
$name = $themename.'/customlogininfo';
$title = get_string('customlogininfo', 'theme_fordson_fel');
$description = get_string('customlogininfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

// Show custom login form.
$name = $themename.'/showcustomlogin';
$title = get_string('showcustomlogin', 'theme_fordson_fel');
$description = get_string('showcustomlogin_desc', 'theme_fordson_fel');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Top image.
$name = $themename.'/logintopimage';
$title = get_string('logintopimage', 'theme_fordson_fel');
$description = get_string('logintopimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'logintopimage');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Login form color.
$name = $themename.'/fploginformbg';
$title = get_string('fploginformbg', 'theme_fordson_fel');
$description = get_string('fploginformbg_desc', 'theme_fordson_fel');
$default = '#ffffff';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Login form color.
$name = $themename.'/fploginformfg';
$title = get_string('fploginformfg', 'theme_fordson_fel');
$description = get_string('fploginformfg_desc', 'theme_fordson_fel');
$default = '#000000';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon One
$name = $themename.'/loginnavicon1info';
$title = get_string('loginnavicon1', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

// icon One
$name = $themename.'/loginnav1icon';
$title = get_string('navicon', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav1titletext';
$title = get_string('loginnavicontitletext', 'theme_fordson_fel');
$description = get_string('loginnavicontitletextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav1icontext';
$title = get_string('loginnavicontext', 'theme_fordson_fel');
$description = get_string('loginnavicontextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon One
$name = $themename.'/loginnavicon2info';
$title = get_string('loginnavicon2', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

$name = $themename.'/loginnav2icon';
$title = get_string('navicon', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav2titletext';
$title = get_string('loginnavicontitletext', 'theme_fordson_fel');
$description = get_string('loginnavicontitletextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav2icontext';
$title = get_string('loginnavicontext', 'theme_fordson_fel');
$description = get_string('loginnavicontextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon three
$name = $themename.'/loginnavicon3info';
$title = get_string('loginnavicon3', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

$name = $themename.'/loginnav3icon';
$title = get_string('navicon', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav3titletext';
$title = get_string('loginnavicontitletext', 'theme_fordson_fel');
$description = get_string('loginnavicontitletextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav3icontext';
$title = get_string('loginnavicontext', 'theme_fordson_fel');
$description = get_string('loginnavicontextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon four
$name = $themename.'/loginnavicon4info';
$title = get_string('loginnavicon4', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

$name = $themename.'/loginnav4icon';
$title = get_string('navicon', 'theme_fordson_fel');
$description = get_string('navicondesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav4titletext';
$title = get_string('loginnavicontitletext', 'theme_fordson_fel');
$description = get_string('loginnavicontitletextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/loginnav4icontext';
$title = get_string('loginnavicontext', 'theme_fordson_fel');
$description = get_string('loginnavicontextdesc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for a feature.
$name = $themename.'/feature1info';
$title = get_string('feature1info', 'theme_fordson_fel');
$description = get_string('featureinfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

// Feature text.
$name = $themename.'/feature1text';
$title = get_string('featuretext', 'theme_fordson_fel');
$description = get_string('featuretext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Feature image.
$name = $themename.'/feature1image';
$title = get_string('featureimage', 'theme_fordson_fel');
$description = get_string('featureimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'feature1image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for a feature.
$name = $themename.'/feature2info';
$title = get_string('feature2info', 'theme_fordson_fel');
$description = get_string('featureinfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

// Feature text.
$name = $themename.'/feature2text';
$title = get_string('featuretext', 'theme_fordson_fel');
$description = get_string('featuretext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Feature image.
$name = $themename.'/feature2image';
$title = get_string('featureimage', 'theme_fordson_fel');
$description = get_string('featureimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'feature2image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for a feature.
$name = $themename.'/feature3info';
$title = get_string('feature3info', 'theme_fordson_fel');
$description = get_string('featureinfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $description);
$page->add($setting);

// Feature text.
$name = $themename.'/feature3text';
$title = get_string('featuretext', 'theme_fordson_fel');
$description = get_string('featuretext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Feature image.
$name = $themename.'/feature3image';
$title = get_string('featureimage', 'theme_fordson_fel');
$description = get_string('featureimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'feature3image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
