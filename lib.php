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

function theme_fordson_fel_page_init() {
    global $PAGE;

    $PAGE->requires->jquery();
    $PAGE->requires->js_call_amd('local_advancedperfs/perfs_panel', 'init');
}
