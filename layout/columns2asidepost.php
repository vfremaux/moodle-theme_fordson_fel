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
 * A two column layout for the fordson_fel theme.
 *
 * @package   theme_fordson_fel
 * @copyright 2018 Valery Fremaux
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    require_once($CFG->dirroot.'/local/technicalsignals/lib.php');
}

if (@$PAGE->theme->settings->breadcrumbstyle == '1') {
    $PAGE->requires->js_call_amd('theme_fordson_fel/jBreadCrumb', 'init');
}

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

$hasfhsdrawer = !empty($PAGE->theme->settings->shownavdrawer);
if (isloggedin() && $hasfhsdrawer && isset($PAGE->theme->settings->shownavclosed) && $PAGE->theme->settings->shownavclosed == 0) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}

$hasspdrawer = !empty($PAGE->theme->settings->shownavspdrawer);
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

$blockshtmla = $OUTPUT->blocks('fp-a');
$blockshtmlb = $OUTPUT->blocks('fp-b');
$blockshtmlc = $OUTPUT->blocks('fp-c');
// $blockshtmlsidepost = $OUTPUT->blocks('side-post');
$hasfpblockregion = isset($PAGE->theme->settings->showblockregions) !== false;

$checkpreblocks = strpos($blockshtmlpre, 'data-block=') !== false;
$checkblocka = strpos($blockshtmla, 'data-block=') !== false;
$checkblockb = strpos($blockshtmlb, 'data-block=') !== false;
$checkblockc = strpos($blockshtmlc, 'data-block=') !== false;
$checkpostblocks = strpos($blockshtmlpost, 'data-block=') !== false;

$hasblocks = strpos($blockshtml, 'data-block=') !== false;

$footnote = $OUTPUT->footnote();
$pagedoclink = $OUTPUT->page_doc_link();
$coursefooter = $OUTPUT->course_footer();

$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID) , "escape" => false]) , 
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'fpablocks' => $blockshtmla,
    'fpbblocks' => $blockshtmlb,
    'fpcblocks' => $blockshtmlc,
    'sidepostblocks' => $postblockshtml,
    'hasfpblockregion' => $hasfpblockregion,
    'hasblocks' => $hasblocks,
    'haspostblocks' => $haspostblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'hasfhsdrawer' => $hasfhsdrawer,
    'hasspdrawer' => $checkpostblocks || $PAGE->user_is_editing(),
    'navspdraweropen' => $navspdraweropen && ($checkpostblocks || $PAGE->user_is_editing()),
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'hasfootnote' => !empty($footnote) && (preg_match('/[a-z]/', strip_tags($footnote))),
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
    'showlangmenu' => @$CFG->langmenu
];

theme_fordson_fel_process_footer_texts($templatecontext);

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    $templatecontext['technicalsignals'] = local_print_administrator_message();
}

$PAGE->requires->jquery();
$PAGE->requires->js('/theme/fordson_fel/javascript/scrolltotop.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/scrolltobottom.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/scrollspy.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/tooltipfix.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/blockslider.js');

$templatecontext['flatnavigation'] = $PAGE->flatnav;
echo $OUTPUT->render_from_template('theme_fordson_fel/columns2asidepost', $templatecontext);