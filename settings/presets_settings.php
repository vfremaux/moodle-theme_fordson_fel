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
 * Presets settings page file.
 *
 * @package    theme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @credits    theme_boost - MoodleHQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_fordson_fel_presets', get_string('presets_settings', 'theme_fordson_fel'));

// Preset.
$name = 'theme_fordson_fel/preset';
$title = get_string('preset', 'theme_fordson_fel');
$description = get_string('preset_desc', 'theme_fordson_fel');
$presetchoices[] = '';
// Add preset files from theme preset folder.
$iterator = new DirectoryIterator($CFG->dirroot . '/theme/fordson_fel/scss/preset/');
foreach ($iterator as $presetfile) {
    if (!$presetfile->isDot()) {
        $presetname = substr($presetfile, 0, strlen($presetfile) - 5); // Name - '.scss'.
        $presetchoices[$presetname] = ucfirst($presetname);
    }
}
// Add preset files uploaded.
$context = context_system::instance();
$fs = get_file_storage();
$files = $fs->get_area_files($context->id, 'theme_fordson_fel', 'preset', 0, 'itemid, filepath, filename', false);
foreach ($files as $file) {
    $pname = substr($file->get_filename(), 0, strlen($file->get_filename()) - 5); // Name - '.scss'.
    $presetchoices[$pname] = ucfirst($pname);
}
// Sort choices.
natsort($presetchoices);
$default = 'default';
$setting = new admin_setting_configselect($name, $title, $description, $default, $presetchoices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Preset files setting.
$name = 'theme_fordson_fel/presetfiles';
$title = get_string('presetfiles', 'theme_fordson_fel');
$description = get_string('presetfiles_desc', 'theme_fordson_fel');

$setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
array('maxfiles' => 20, 'accepted_types' => array('.scss')));
$page->add($setting);

// Layout Info
$name = 'theme_fordson_fel/layoutinfo';
$heading = get_string('layoutinfo', 'theme_fordson_fel');
$information = get_string('layoutinfodesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// Toggle Page Layout design
$name = 'theme_fordson_fel/pagelayout';
$title = get_string('pagelayout' , 'theme_fordson_fel');
$description = get_string('pagelayout_desc', 'theme_fordson_fel');
$pagelayout1 = get_string('pagelayout1', 'theme_fordson_fel');
$pagelayout2 = get_string('pagelayout2', 'theme_fordson_fel');
$pagelayout3 = get_string('pagelayout3', 'theme_fordson_fel');
$pagelayout4 = get_string('pagelayout4', 'theme_fordson_fel');
$pagelayout5 = get_string('pagelayout5', 'theme_fordson_fel');
$default = '4';
$choices = array('1'=>$pagelayout1, '2'=>$pagelayout2, '3'=>$pagelayout3, '4'=>$pagelayout4, '5'=>$pagelayout5);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Toggle topic/weekly Section Layout design
$name = 'theme_fordson_fel/sectionlayout';
$title = get_string('sectionlayout' , 'theme_fordson_fel');
$description = get_string('sectionlayout_desc', 'theme_fordson_fel');
$sectionlayout1 = get_string('sectionlayout1', 'theme_fordson_fel');
$sectionlayout2 = get_string('sectionlayout2', 'theme_fordson_fel');
$sectionlayout3 = get_string('sectionlayout3', 'theme_fordson_fel');
$sectionlayout4 = get_string('sectionlayout4', 'theme_fordson_fel');
$sectionlayout5 = get_string('sectionlayout5', 'theme_fordson_fel');
$sectionlayout6 = get_string('sectionlayout6', 'theme_fordson_fel');
$sectionlayout7 = get_string('sectionlayout7', 'theme_fordson_fel');
$sectionlayout8 = get_string('sectionlayout8', 'theme_fordson_fel');

$default = '2';
$choices = array('1'=>$sectionlayout1, '2'=>$sectionlayout2, '3'=>$sectionlayout3, '4'=>$sectionlayout4, '5'=>$sectionlayout5, '6'=>$sectionlayout6, '7'=>$sectionlayout7, '8'=>$sectionlayout8);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Course Tile Display Styles
$name = 'theme_fordson_fel/coursetilestyle';
$title = get_string('coursetilestyle' , 'theme_fordson_fel');
$description = get_string('coursetilestyle_desc', 'theme_fordson_fel');
$coursestyle1 = get_string('coursestyle1', 'theme_fordson_fel');
$coursestyle2 = get_string('coursestyle2', 'theme_fordson_fel');
$coursestyle3 = get_string('coursestyle3', 'theme_fordson_fel');
$coursestyle4 = get_string('coursestyle4', 'theme_fordson_fel');
$coursestyle5 = get_string('coursestyle5', 'theme_fordson_fel');
$coursestyle6 = get_string('coursestyle6', 'theme_fordson_fel');
$coursestyle7 = get_string('coursestyle7', 'theme_fordson_fel');
$coursestyle8 = get_string('coursestyle8', 'theme_fordson_fel');
$default = '4';
$choices = array('1'=>$coursestyle1, '2'=>$coursestyle2, '3'=>$coursestyle3, '4'=>$coursestyle4, '5'=>$coursestyle5, '6'=>$coursestyle6, '7'=>$coursestyle7, '8'=>$coursestyle8);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
