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
 * Main settings file.
 *
 * @package    theme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @credits    theme_boost - MoodleHQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/* THEME_fordson_fel BUILDING NOTES
 * =============================
 * Settings have been split into separate files, which are called from
 * this central file. This is to aid ongoing development as I find it
 * easier to work with multiple smaller function-specific files than
 * with a single monolithic settings file.
 * This may be a personal preference and it would be quite feasible to
 * bring all lib functions back into a single central file if another
 * developer prefered to work in that way.
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Note new tabs layout for admin settings pages.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingfordson_fel', get_string('configtitle', 'theme_fordson_fel'));
    $themename = 'theme_fordson_fel';

    if (is_dir($CFG->dirroot.'/theme/fordson_fel01')) {
        require($CFG->dirroot.'/theme/fordson_fel/settings/variants_settings.php');
    }
    require($CFG->dirroot.'/theme/fordson_fel/settings/presets_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/presets_adjustments_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/javascript_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/menu_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/breadcrumb_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/content_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/fpicons_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/footer_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/image_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/colours_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/font_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/markettiles_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/slideshow_settings.php');
    // OCJ HILLBROOK MOD
    require($CFG->dirroot.'/theme/fordson_fel/settings/modchooser_settings.php');
    require($CFG->dirroot.'/theme/fordson_fel/settings/customlogin_settings.php');
}
