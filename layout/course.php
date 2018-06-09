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
 * A two column layout for the boost theme.
 *
 * @package   theme_boost
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
user_preference_allow_ajax_update('spdrawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

$hasfhsdrawer = isset($PAGE->theme->settings->shownavdrawer) && $PAGE->theme->settings->shownavdrawer == 1;
if (isloggedin() && $hasfhsdrawer && isset($PAGE->theme->settings->shownavclosed) && $PAGE->theme->settings->shownavclosed == 0) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}

if (isloggedin()) {
    $navspdraweropen = (get_user_preferences('spdrawer-open-nav', 'true') == 'true');
} else {
    $navspdraweropen = false;
}
if ($navspdraweropen) {
    // Forces body to stretch at right.
    $extraclasses[] = 'drawer-open-right';
}
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;

$blockshtmla = $OUTPUT->blocks('fp-a');
$blockshtmlb = $OUTPUT->blocks('fp-b');
$blockshtmlc = $OUTPUT->blocks('fp-c');
$blockshtmlpost = $OUTPUT->blocks('side-post');
$checkblocka = strpos($blockshtmla, 'data-block=') !== false;
$checkblockb = strpos($blockshtmlb, 'data-block=') !== false;
$checkblockc = strpos($blockshtmlc, 'data-block=') !== false;
$checkpostblocks = strpos($blockshtmlpost, 'data-block=') !== false;
$hasfpblockregion = isset($PAGE->theme->settings->showblockregions) !== false;

$hascourseblocks = false;
if ($checkblocka || $checkblockb || $checkblockc || $checkpostblocks) {
    $hascourseblocks = true;
}

$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID) , "escape" => false]) , 
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'fpablocks' => $blockshtmla,
    'fpbblocks' => $blockshtmlb,
    'fpcblocks' => $blockshtmlc,
    'sidepostblocks' => $blockshtmlpost,
    'hasblocks' => $hasblocks,
    'hascourseblocks' => $hascourseblocks,
    'hasfpblockregion' => $hasfpblockregion,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'hasfhsdrawer' => $hasfhsdrawer,
    'navspdraweropen' => $navspdraweropen,
    // 'hasspdrawer' => $hasspdrawer,
    'hasspdrawer' => true,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu)
];

$PAGE->requires->jquery();
$PAGE->requires->js('/theme/fordson_fel/javascript/scrolltotop.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/scrollspy.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/tooltipfix.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/blockslider.js');

$templatecontext['flatnavigation'] = $PAGE->flatnav;
echo $OUTPUT->render_from_template('theme_fordson_fel/columns2asidepost', $templatecontext);