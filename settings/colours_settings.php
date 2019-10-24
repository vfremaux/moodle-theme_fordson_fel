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
 * Colours settings page file.
 *
 * @packagetheme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @creditstheme_fordson_fel - MoodleHQ
 * @licensehttp://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_fordson_fel_colours', get_string('colours_settings', 'theme_fordson_fel'));
$page->add(new admin_setting_heading('theme_fordson_fel_colours', get_string('colours_headingsub', 'theme_fordson_fel'), format_text(get_string('colours_desc' , 'theme_fordson_fel'), FORMAT_MARKDOWN)));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_configtextarea('theme_fordson_fel/scsspre',
    get_string('rawscsspre', 'theme_fordson_fel'), get_string('rawscsspre_desc', 'theme_fordson_fel'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandprimary.
    $name = 'theme_fordson_fel/brandprimary';
    $title = get_string('brandprimary', 'theme_fordson_fel');
    $description = get_string('brandprimary_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandsuccess.
    $name = 'theme_fordson_fel/brandsuccess';
    $title = get_string('brandsuccess', 'theme_fordson_fel');
    $description = get_string('brandsuccess_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandwarning.
    $name = 'theme_fordson_fel/brandwarning';
    $title = get_string('brandwarning', 'theme_fordson_fel');
    $description = get_string('brandwarning_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $branddanger.
    $name = 'theme_fordson_fel/branddanger';
    $title = get_string('branddanger', 'theme_fordson_fel');
    $description = get_string('branddanger_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandinfo.
    $name = 'theme_fordson_fel/brandinfo';
    $title = get_string('brandinfo', 'theme_fordson_fel');
    $description = get_string('brandinfo_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @bodyBackground setting.
    $name = 'theme_fordson_fel/bodybackground';
    $title = get_string('bodybackground', 'theme_fordson_fel');
    $description = get_string('bodybackground_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Top navbar background setting.
    $name = 'theme_fordson_fel/topnavbarbg';
    $title = get_string('topnavbarbg', 'theme_fordson_fel');
    $description = get_string('topnavbarbg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Top navbar background setting.
    $name = 'theme_fordson_fel/topnavbarteacherbg';
    $title = get_string('topnavbarteacherbg', 'theme_fordson_fel');
    $description = get_string('topnavbarteacherbg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @breadcrumbBackground setting.
    $name = 'theme_fordson_fel/breadcrumbbkg';
    $title = get_string('breadcrumbbkg', 'theme_fordson_fel');
    $description = get_string('breadcrumbbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#ffffff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @breadcrumbForeground setting.
    $name = 'theme_fordson_fel/breadcrumbfg';
    $title = get_string('breadcrumbfg', 'theme_fordson_fel');
    $description = get_string('breadcrumbfg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#000000');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing tile text background.
    $name = 'theme_fordson_fel/markettextbg';
    $title = get_string('markettextbg', 'theme_fordson_fel');
    $description = get_string('markettextbg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Layout card background.
    $name = 'theme_fordson_fel/cardbkg';
    $title = get_string('cardbkg', 'theme_fordson_fel');
    $description = get_string('cardbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Layout drawer background.
    $name = 'theme_fordson_fel/drawerbkg';
    $title = get_string('drawerbkg', 'theme_fordson_fel');
    $description = get_string('drawerbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer drawer background
    $name = 'theme_fordson_fel/footerbkg';
    $title = get_string('footerbkg', 'theme_fordson_fel');
    $description = get_string('footerbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Flex section style list.
    $key = 'theme_fordson_fel/sectionsstyles';
    $label = get_string('sectionsstyles', 'theme_fordson_fel');
    $desc = get_string('sectionsstyles_desc', 'theme_fordson_fel');
    $default = '';
    $setting = new admin_setting_configtextarea($key, $label, $desc, $default, PARAM_TEXT, 64, 10);
    $page->add($setting);

    $key = 'theme_fordson_fel/sectionsstyleimages';
    $label = get_string('sectionsstyleimages', 'theme_fordson_fel');
    $desc = get_string('sectionsstyleimages_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configstoredfile($key, $label, $desc, 'sectionimages', 0, 
        ['maxfiles' => 100, 'accepted_types' => ['.jpg', '.gif', '.svg', '.png']]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $key = 'theme_fordson_fel/scss';
    $label = get_string('rawscss', 'theme_fordson_fel');
    $desc = get_string('rawscss_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configtextarea($key, $label, $desc, '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);