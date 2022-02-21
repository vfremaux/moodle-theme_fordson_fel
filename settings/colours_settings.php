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

$page = new admin_settingpage($themename.'_colours', get_string('colours_settings', 'theme_fordson_fel'));
$page->add(new admin_setting_heading($themename.'_colours', get_string('colours_headingsub', 'theme_fordson_fel'), format_text(get_string('colours_desc' , 'theme_fordson_fel'), FORMAT_MARKDOWN)));

    // Raw SCSS to include before the content.
    $name = $themename.'/scsspre';
    $title = get_string('rawscsspre', 'theme_fordson_fel');
    $description = get_string('rawscsspre_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configtextarea($name, $title, $description, '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandprimary.
    $name = $themename.'/brandprimary';
    $title = get_string('brandprimary', 'theme_fordson_fel');
    $description = get_string('brandprimary_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandprimary.
    $name = $themename.'/brandprimaryalt';
    $title = get_string('brandprimaryalt', 'theme_fordson_fel');
    $description = get_string('brandprimaryalt_desc', 'theme_fordson_fel');
    $default = '#333333';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandsecondary.
    $name = $themename.'/brandsecondary';
    $title = get_string('brandsecondary', 'theme_fordson_fel');
    $description = get_string('brandsecondary_desc', 'theme_fordson_fel');
    $default = '#dddddd';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandsecondaryalt.
    $name = $themename.'/brandsecondaryalt';
    $title = get_string('brandsecondaryalt', 'theme_fordson_fel');
    $description = get_string('brandsecondaryalt_desc', 'theme_fordson_fel');
    $default = '#ffffff';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandsuccess.
    $name = $themename.'/brandsuccess';
    $title = get_string('brandsuccess', 'theme_fordson_fel');
    $description = get_string('brandsuccess_desc', 'theme_fordson_fel');
    $default = '#a5e600';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandwarning.
    $name = $themename.'/brandwarning';
    $title = get_string('brandwarning', 'theme_fordson_fel');
    $description = get_string('brandwarning_desc', 'theme_fordson_fel');
    $default = '#d9534f';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $branddanger.
    $name = $themename.'/branddanger';
    $title = get_string('branddanger', 'theme_fordson_fel');
    $description = get_string('branddanger_desc', 'theme_fordson_fel');
    $default = '#F07905';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandinfo.
    $name = $themename.'/brandinfo';
    $title = get_string('brandinfo', 'theme_fordson_fel');
    $description = get_string('brandinfo_desc', 'theme_fordson_fel');
    $default = '';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @bodyBackground setting.
    $name = $themename.'/bodybkg';
    $title = get_string('bodybkg', 'theme_fordson_fel');
    $description = get_string('bodybkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Top navbar background setting. @Variable topnavbar-bg.
    $name = $themename.'/topnavbarbkg';
    $title = get_string('topnavbarbkg', 'theme_fordson_fel');
    $description = get_string('topnavbarbkg_desc', 'theme_fordson_fel');
    $default = '#ffffff';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Top navbar foreground setting. @Variable topnavbar-fg.
    $name = $themename.'/topnavbarfg';
    $title = get_string('topnavbarfg', 'theme_fordson_fel');
    $description = get_string('topnavbarfg_desc', 'theme_fordson_fel');
    $default = '#000000';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Top navbar background setting. @Variable topnavbar-hover.
    $name = $themename.'/topnavbarbkghov';
    $title = get_string('topnavbarbkghov', 'theme_fordson_fel');
    $description = get_string('topnavbarbkghov_desc', 'theme_fordson_fel');
    $default = '#f0f0f0';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Top navbar background setting.
    $name = $themename.'/topnavbarteacherbkg';
    $title = get_string('topnavbarteacherbkg', 'theme_fordson_fel');
    $description = get_string('topnavbarteacherbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @breadcrumbBackground setting.
    $name = $themename.'/breadcrumbbkg';
    $title = get_string('breadcrumbbkg', 'theme_fordson_fel');
    $description = get_string('breadcrumbbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#ffffff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @breadcrumbForeground setting.
    $name = $themename.'/breadcrumbfg';
    $title = get_string('breadcrumbfg', 'theme_fordson_fel');
    $description = get_string('breadcrumbfg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#000000');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing tile text background.
    $name = $themename.'/markettextbkg';
    $title = get_string('markettextbkg', 'theme_fordson_fel');
    $description = get_string('markettextbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Layout card background.
    $name = $themename.'/cardbkg';
    $title = get_string('cardbkg', 'theme_fordson_fel');
    $description = get_string('cardbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Layout drawer background.
    $name = $themename.'/drawerbkg';
    $title = get_string('drawerbkg', 'theme_fordson_fel');
    $description = get_string('drawerbkg_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer background
    $name = $themename.'/footerbkg';
    $title = get_string('footerbkg', 'theme_fordson_fel');
    $description = get_string('footerbkg_desc', 'theme_fordson_fel');
    $default = '#000000';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer background
    $name = $themename.'/footerfg';
    $title = get_string('footerfg', 'theme_fordson_fel');
    $description = get_string('footerfg_desc', 'theme_fordson_fel');
    $default = '#ffffff';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Flex section style list.
    $name = $themename.'/sectionsstyles';
    $title = get_string('sectionsstyles', 'theme_fordson_fel');
    $description = get_string('sectionsstyles_desc', 'theme_fordson_fel');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT, 64, 10);
    $page->add($setting);

    $name = $themename.'/sectionsstyleimages';
    $title = get_string('sectionsstyleimages', 'theme_fordson_fel');
    $description = get_string('sectionsstyleimages_desc', 'theme_fordson_fel');
    $options = ['maxfiles' => 100, 'accepted_types' => ['.jpg', '.gif', '.svg', '.png']];
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'sectionimages', 0, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    if (is_dir($CFG->dirroot.'/mod/customlabel')) {
        $name = $themename.'/customlabelskin';
        $title = get_string('customlabelskin', 'theme_fordson_fel');
        $description = get_string('customlabelskin_desc', 'theme_fordson_fel');
        $skinoptions = [
            '' => get_string('plugindefault', 'customlabel'),
            'default' => get_string('defaultstyle', 'customlabel'),
            'flatstyle' => get_string('flatstyle', 'customlabel'),
            'colored' => get_string('coloredstyle', 'customlabel'),
            'flatstyle colored' => get_string('flatcoloredstyle', 'customlabel')
        ];

        $namedskins = glob($CFG->dirroot.'/mod/customlabel/pix/skins/*');
        if (!empty($namedskins)) {
            foreach ($namedskins as $skinpath) {
                $skinname = basename($skinpath);
                if ($skinname == '.' || $skinname == '..') {
                    continue;
                }
                if (!is_dir($skinpath)) {
                    continue;
                }
                $skinoptions[$skinname] = $skinname;
            }
        }

        $setting = new admin_setting_configselect($name, $title, $description, '', $skinoptions);
        $page->add($setting);
    }

    // Raw SCSS to include after the content.
    $name = $themename.'/scss';
    $title = get_string('rawscss', 'theme_fordson_fel');
    $description = get_string('rawscss_desc', 'theme_fordson_fel');
    $setting = new admin_setting_configtextarea($name, $title, $description, '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);