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

$hasspdrawer = isset($PAGE->theme->settings->shownavspdrawer) && $PAGE->theme->settings->shownavspdrawer == 1;
if (isloggedin() && $hasspdrawer && isset($PAGE->theme->settings->showspclosed) && $PAGE->theme->settings->showspclosed == 0) {
    $navspdraweropen = (get_user_preferences('spdrawer-open-nav', 'true') == 'true');
} else {
    $navspdraweropen = false;
}
if ($navspdraweropen) {
    $extraclasses[] = 'spdrawer-open-right';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$postblockshtml = $OUTPUT->blocks('side-post');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$haspostblocks = strpos($postblockshtml, 'data-block=') !== false;

$blockshtmla = $OUTPUT->blocks('fp-a');
$blockshtmlb = $OUTPUT->blocks('fp-b');
$blockshtmlc = $OUTPUT->blocks('fp-c');
$blockshtmlsidepost = $OUTPUT->blocks('side-post');
$hasfpblockregion = isset($PAGE->theme->settings->showblockregions) !== false;

$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID) , "escape" => false]) , 
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'fpablocks' => $blockshtmla,
    'fpbblocks' => $blockshtmlb,
    'fpcblocks' => $blockshtmlc,
    'sidepostblocks' => $blockshtmlsidepost,
    'hasfpblockregion' => $hasfpblockregion,
    'hasblocks' => $hasblocks,
    'haspostblocks' => $haspostblocks,
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
print_object($templatecontext);
echo $OUTPUT->render_from_template('theme_fordson_fel/columns2asidepost', $templatecontext);