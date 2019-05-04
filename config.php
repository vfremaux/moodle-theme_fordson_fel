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
 * Theme config file.
 *
 * @package    theme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @credits    theme_boost - MoodleHQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Check the file is being called internally from within Moodle.
defined('MOODLE_INTERNAL') || die();

// Call the theme lib file.
require_once(__DIR__ . '/lib.php');

// Theme name.
$THEME->name = 'fordson_fel';

// Inherit from parent theme - Boost.
$THEME->parents = ['boost'];

/* There are currently no css sheets in the theme as scss is used.
 * No TinyMCE editor stylesheet is provided - this would be impossible
 * to generate dynamically from the scss presets and settings and is not
 * used by Moodle's default editor (Atto).
 */
$THEME->sheets = ['customlabels', 'styledbreadcrumb', 'yuioverride', 'modthumb', 'flexsections', 'themefixes', 'responsiverules'];
$THEME->editor_sheets = [''];
$THEME->layouts = [
    // The site home page.
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre', 'fp-a', 'fp-b', 'fp-c'),
        'defaultregion' => 'fp-c',
        'options' => array('nonavbar' => true, 'langmenu' => true),
    ),
    // Main course page.
    /*
    'course' => array(
        'file' => 'course.php',
        'regions' => array('fp-a', 'fp-b', 'fp-c', 'side-post'),
        'defaultregion' => 'fp-c',
    ),
    */
    'course' => array(
        'file' => 'course.php',
        'regions' => array('side-post'),
        'defaultregion' => 'side-post',
    ),

    'incourse' => array(
        'file' => 'course.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),

    'coursecategory' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),

    'simplepage' => array(
        'file' => 'columns1.php',
        'regions' => array(),
    ),

    // Server administration scripts.
    'admin' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),

    'format_page' => array(
        'file' => 'pagefordson.php',
        'regions' => array('side-pre', 'main', 'side-post'),
        'defaultregion' => 'side-post', // avoid putting in main, or standard course will fail showing the new block menu
        'options' => array('langmenu' => true)
    ),

    'format_page_single' => array(
        'file' => 'pagefordsonpage.php',
        'regions' => array('side-pre', 'main', 'side-post'),
        'defaultregion' => 'side-post', // avoid putting in main, or standard course will fail showing the new block menu
        'options' => array('langmenu' => false)
    ),

    'format_page_action' => array(
        'file' => 'pagefordson.php',
        'regions' => array(),
        'options' => array('langmenu' => true, 'noblocks' => true),
    ),
];

// Call main theme scss - including the selected preset.
$THEME->scss = function($theme) {
    return theme_fordson_fel_get_main_scss_content($theme);
};

// Additional theme options.
$THEME->supportscssoptimisation = false;

// Call css/scss processing functions and renderers.
$THEME->csstreepostprocessor = 'theme_fordson_fel_css_tree_post_processor';
$THEME->prescsscallback = 'theme_fordson_fel_get_pre_scss';
$THEME->extrascsscallback = 'theme_fordson_fel_get_extra_scss';
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_DEFAULT;
$THEME->iconsystem = \core\output\icon_system::FONTAWESOME;

$THEME->enable_dock = false;
$THEME->yuicssmodules = array();
$THEME->requiredblocks = '';

// Tabbed quickform addition for generalizing the Jquery.
global $PAGE;
if (!empty($PAGE) && !$PAGE->state) {
    $PAGE->requires->jquery();
    $PAGE->requires->js_call_amd('local_vflibs/docfix', 'init');
    $PAGE->requires->js_call_amd('theme_fordson_fel/custommenu', 'init');
}