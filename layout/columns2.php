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

require_once($CFG->dirroot.'/theme/fordson_fel/lib/mobile_detect_lib.php');
require_once($CFG->dirroot.'/theme/fordson_fel/lib.php');

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    require_once($CFG->dirroot.'/local/technicalsignals/lib.php');
}

if (@$PAGE->theme->settings->breadcrumbstyle == '1') {
    $PAGE->requires->js_call_amd('theme_fordson_fel/jBreadCrumb', 'init');
}

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

$extraclasses = [];

if (is_mobile()) {
    $extraclasses[] = 'is-mobile';
}
if (is_tablet()) {
    $extraclasses[] = 'is-tablet';
}

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;

$blockshtmla = $OUTPUT->blocks('fp-a');
$blockshtmlb = $OUTPUT->blocks('fp-b');
$blockshtmlc = $OUTPUT->blocks('fp-c');
$hasfpblockregion = isset($PAGE->theme->settings->showblockregions) !== false;

list($hasfhsdrawer, $navdraweropen, $hasspdrawer, $navspdraweropen) = theme_fordson_fel_resolve_drawers($extraclasses, false, is_mobile());
$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$footnote = $OUTPUT->footnote();
$pagedoclink = $OUTPUT->page_doc_link();
$coursefooter = $OUTPUT->course_footer();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID) , "escape" => false]) , 
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'fpablocks' => $blockshtmla,
    'fpbblocks' => $blockshtmlb,
    'fpcblocks' => $blockshtmlc,
    'hasfpblockregion' => $hasfpblockregion,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'hasfhsdrawer' => $hasfhsdrawer,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'hasfootnote' => !empty($footnote) && (preg_match('/[A-Za-z0-9]/', preg_replace('/<.*?>/', '', $footnote))),
    'footnote' => $footnote,
    'custommenupullright' => $PAGE->theme->settings->custommenupullright,
    'hascoursefooter' => !empty($coursefooter) && (preg_match('/[a-z]/', strip_tags($coursefooter))),
    'coursefooter' => $coursefooter,
    'hasdoclink' => !empty($pagedoclink) && (preg_match('/[a-z]/', strip_tags($pagedoclink))),
    'pagedoclink' => $pagedoclink,
    'hascustomlogin' => $PAGE->theme->settings->showcustomlogin == 1,
    'hasfooterelements' => !empty($PAGE->theme->settings->leftfooter) || !empty($PAGE->theme->settings->midfooter) || !empty($PAGE->theme->settings->rightfooter),
    'leftfooter' => @$PAGE->theme->settings->leftfooter,
    'midfooter' => @$PAGE->theme->settings->midfooter,
    'rightfooter' => @$PAGE->theme->settings->rightfooter,
    'showlangmenu' => @$CFG->langmenu,
    'sitealternatename' => @$PAGE->theme->settings->sitealternatename
];

if (function_exists('debug_blocks')) {
    $templatecontext['blocksdebuginfo'] = debug_blocks();
}

theme_fordson_fel_process_footer_texts($templatecontext);

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    $templatecontext['technicalsignals'] = local_print_administrator_message();
}

$PAGE->requires->jquery();
$PAGE->requires->js_call_amd('theme_fordson_fel/pagescroll', 'init');
$PAGE->requires->js('/theme/fordson_fel/javascript/scrollspy.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/tooltipfix.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/blockslider.js');

$templatecontext['flatnavigation'] = $PAGE->flatnav;

echo $OUTPUT->render_from_template('theme_fordson_fel/columns2', $templatecontext);