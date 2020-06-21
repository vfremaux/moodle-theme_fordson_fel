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
 * Main Lib file.
 *
 * @package    theme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @credits    theme_boost - MoodleHQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/* THEME_fordson_fel BUILDING NOTES
 * =============================
 * Lib functions have been split into separate files, which are called
 * from this central file. This is to aid ongoing development as I find
 * it easier to work with multiple smaller function-specific files than
 * with a single monolithic lib file. This may be a personal preference
 * and it would be quite feasible to bring all lib functions back into
 * a single central file if another developer prefered to work in that way.
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/theme/fordson_fel/lib/scss_lib.php');
require_once($CFG->dirroot.'/theme/fordson_fel/lib/filesettings_lib.php');
require_once($CFG->dirroot.'/theme/fordson_fel/lib/fordson_fel_lib.php');

function theme_fordson_fel_supports_feature($feature) {

    if ($feature == 'course/modthumbs') {
        return true;
    }

    return false;
}

function theme_fordson_fel_page_init() {
    global $PAGE;

    $PAGE->requires->jquery();
    $PAGE->requires->js_call_amd('local_advancedperfs/perfs_panel', 'init');
}

function theme_fordson_fel_resolve_drawers(&$extraclasses, $checkspblocks, $ismobile = false) {
    global $PAGE;

    $hasfhsdrawer = isset($PAGE->theme->settings->shownavdrawer) && $PAGE->theme->settings->shownavdrawer == 1;
    if (isloggedin() && $hasfhsdrawer && isset($PAGE->theme->settings->shownavclosed) && $PAGE->theme->settings->shownavclosed == 0) {
        $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
    } else {
        $navdraweropen = false;
    }

    if ($navdraweropen) {
        $extraclasses[] = 'drawer-open-left';
    }

    $isblockmanagepage = preg_match('/^page-blocks-.*-manage$/', $PAGE->pagetype);
    // $isadminpage = preg_match('/adminsettings/', $PAGE->pagetype);
    $isadminpage = preg_match('/admin/', $PAGE->pagetype);
    $isadminpage = $isadminpage || preg_match('/admin/', $PAGE->pagelayout);
    $isindexsys = preg_match('/indexsys/', $_SERVER['PHP_SELF']);
    $isdashboard = preg_match('/my-index|site-index/', $PAGE->pagetype);
    $isdashboard = $isdashboard || preg_match('/dashboard/', $PAGE->pagelayout);
    $isbaselayout = preg_match('/base/', $PAGE->pagelayout);
    $ispageformat = preg_match('/format_page/', $PAGE->pagelayout);

    $debug = optional_param('drawerdebug', false, PARAM_BOOL);
    if ($debug) {
        echo "
            <pre>
            Is block manage page : $isblockmanagepage
            Is admin page : $isadminpage
            Is indexsys : $isindexsys
            Is dashboard : $isdashboard
            Is base layout : $isbaselayout
            Is paged formatted : $ispageformat
            Has some blocks : ".!empty($checkspblocks)."
            Is editing : ".!empty($PAGE->user_is_editing())."
            </pre>
        ";
    }

    $hasspdrawer = (!empty($checkspblocks) || !empty($PAGE->user_is_editing())) && !$isblockmanagepage && !$isadminpage && !$isindexsys && !$isdashboard && !$isbaselayout && !$ispageformat;

    if (isloggedin()) {
        $navspdraweropen = (get_user_preferences('spdrawer-open-nav', 'true') == 'true');
    } else {
        $navspdraweropen = false;
    }
    if ($navspdraweropen && $hasspdrawer) {
        // Forces body to stretch at right.
        $extraclasses[] = 'drawer-open-right';
    }

    // $debug = "isblockmanagepage $isblockmanagepage<br/>";
    // $debug .= "checkpostblocs $checkpostblocks<br/>";
    // $debug .= "isediting ".$PAGE->user_is_editing()."<br/>";
    // $debug .= "hasspdrawer {$hasspdrawer}<br/>";
    // $debug .= "hasspdraweropen {$hasspdraweropen}<br/>";
    // echo $debug;

    return [$hasfhsdrawer, $navdraweropen, $hasspdrawer, $navspdraweropen];
}