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
require_once($CFG->dirroot.'/theme/fordson_fel/lib/fordson_fel_lib.php');

// Theme name.
$THEME->name = 'fordson_fel';

// Inherit from parent theme - Boost.
$THEME->parents = ['boost'];

/* There are currently no css sheets in the theme as scss is used.
 * No TinyMCE editor stylesheet is provided - this would be impossible
 * to generate dynamically from the scss presets and settings and is not
 * used by Moodle's default editor (Atto).
 */
$THEME->sheets = ['styledbreadcrumb', 'yuioverride', 'modthumb', 'flexsections', 'themefixes', 'responsiverules', 'mobilecontrol', 'edgefixes', 'accessibility'];
$THEME->editor_sheets = [''];

// Toggle display of blocks
$THEME->layouts = [
    'base' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => [
        'file' => 'course.php',
        'regions' => ['side-pre', 'fp-a', 'fp-b', 'fp-c', 'side-post'],
        'defaultregion' => 'side-post',
    ],

    // The site home page.
    'frontpage' => [
        'file' => 'frontpage.php',
        'regions' => ['side-pre', 'fp-a', 'fp-b', 'fp-c'],
        'defaultregion' => 'fp-c',
        'options' => ['nonavbar' => true, 'langmenu' => true],
    ],

    // Main course page.
    /*
    'course' => [
        'file' => 'course.php',
        'regions' => ['fp-a', 'fp-b', 'fp-c', 'side-post'],
        'defaultregion' => 'fp-c',
    ],
    */

    'course' => [
        'file' => 'course.php',
        'regions' => ['side-post'],
        'defaultregion' => 'side-post',
    ],

    'incourse' => [
        'file' => 'course.php',
        'regions' => ['side-pre', 'side-post'],
        'defaultregion' => 'side-post',
    ],

    'coursecategory' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // The pagelayout used for safebrowser and securewindow.
    'secure' => [
        'file' => 'secure.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre'
    ],

    // Server administration scripts.
    'admin' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],

    // My dashboard page.
    'mydashboard' => [
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true, 'langmenu' => true, 'nocontextheader' => true),
    ],

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => [
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => true),
    ],

    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => [
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nocoursefooter' => true),
    ],

    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded' => [
        'file' => 'embedded.php',
        'regions' => array()
    ],

    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, links, or API calls that would lead to database or cache interaction.
    // Please be extremely careful if you are modifying this layout.
    'maintenance' => [
        'file' => 'maintenance.php',
        'regions' => array(),
    ],

    // Should display the content and basic headers only.
    'print' => [
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => false),
    ],

    // The pagelayout used when a redirection is occuring.
    'redirect' => [
        'file' => 'embedded.php',
        'regions' => array(),
    ],

    // My public page.
    'mypublic' => [
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ],

    // The pagelayout used for reports.
    'report' => [
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ],

    'login' => [
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu' => true),
    ],

    'format_page' => [
        'file' => 'pagefordson.php',
        'regions' => array('side-pre', 'main', 'side-post'),
        'defaultregion' => 'side-post', // avoid putting in main, or standard course will fail showing the new block menu
        'options' => array('langmenu' => true)
    ],

    'format_page_single' => [
        'file' => 'pagefordsonpage.php',
        'regions' => array('side-pre', 'main', 'side-post'),
        'defaultregion' => 'side-post', // avoid putting in main, or standard course will fail showing the new block menu
        'options' => array('langmenu' => false)
    ],

    'format_page_action' => [
        'file' => 'pagefordson.php',
        'regions' => array(),
        'options' => array('langmenu' => true, 'noblocks' => true),
    ],
];

if (!empty($THEME->settings->enhancedmydashboard)) {
    // At upgrade time, those settings are not set.
    if ($THEME->settings->enhancedmydashboard == 1 && $THEME->settings->blockdisplay == 1) {
        $THEME->layouts['mydashboard'] = [
            'file' => 'mydashboard.php',
            'regions' => ['fp-a', 'fp-b', 'fp-c', 'side-pre'],
            'defaultregion' => 'side-pre',
            'options' => ['nonavbar' => true, 'langmenu' => true],
        ];
    }
    if ($THEME->settings->blockdisplay == 2) {
        $THEME->layouts['course'] = [
            'file' => 'course.php',
            'regions' => ['side-pre'],
            'defaultregion' => 'side-pre',
        ];
        $THEME->layouts['frontpage'] = [
            'file' => 'frontpage.php',
            'regions' => ['side-pre'],
            'defaultregion' => 'side-pre',
            'options' => ['nonavbar' => true, 'langmenu' => true],
        ];
    }
    if ($THEME->settings->blockdisplay == 2 && $THEME->settings->enhancedmydashboard == 1) {
        $THEME->layouts['mydashboard'] = [
            'file' => 'mydashboard.php',
            'regions' => ['side-pre'],
            'defaultregion' => 'side-pre',
            'options' => ['nonavbar' => true, 'langmenu' => true],
        ];
    }
}

// Call main theme scss - including the selected preset.
$THEME->scss = function($theme) {
    return theme_fordson_fel_get_main_scss_content($theme);
};

// Additional theme options.
$THEME->supportscssoptimisation = false;

// Call css/scss processing functions and renderers.
// $THEME->csstreepostprocessor = 'theme_fordson_fel_css_tree_post_processor';
$THEME->csstreepostprocessor = null;

$THEME->prescsscallback = 'theme_fordson_fel_get_pre_scss';
$THEME->extrascsscallback = 'theme_fordson_fel_get_extra_scss';
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Toggle display of blocks
if ($THEME->settings->blockdisplay == 1) {
    $THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_DEFAULT;
}
if ($THEME->settings->blockdisplay == 2) {
    $THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
}

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