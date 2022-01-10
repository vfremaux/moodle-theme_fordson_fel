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

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

$extraclasses = [];

if (is_mobile()) {
    $extraclasses[] = 'is-mobile';
}
if (is_tablet()) {
    $extraclasses[] = 'is-tablet';
}

$enrolform = '';
$plugin = enrol_get_plugin('easy');
if ($plugin && !isguestuser()) {
    $enrolform = $plugin->get_form();
}

list($hasfhsdrawer, $navdraweropen, $hasspdrawer, $navspdraweropen) = theme_fordson_fel_resolve_drawers($extraclasses, false);
$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$headerlogo = $PAGE->theme->setting_file_url('headerlogo', 'headerlogo');
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;

$blockshtmla = $OUTPUT->blocks('fp-a');
$blockshtmlb = $OUTPUT->blocks('fp-b');
$blockshtmlc = $OUTPUT->blocks('fp-c');
$checkblocka = strpos($blockshtmla, 'data-block=') !== false;
$checkblockb = strpos($blockshtmlb, 'data-block=') !== false;
$checkblockc = strpos($blockshtmlc, 'data-block=') !== false;
$hasfpblockregion = ($PAGE->theme->settings->blockdisplay == 1) !== false;

$hascourseblocks = false;
if ($checkblocka || $checkblockb || $checkblockc) {
    $hascourseblocks = true;
}

$footnote = $OUTPUT->footer_element('footnote');
$coursefooter = $OUTPUT->course_footer();
$OUTPUT->check_dyslexic_state();
$OUTPUT->check_highcontrast_state();
$dysstate = $OUTPUT->get_dyslexic_state();
$hcstate = $OUTPUT->get_highcontrast_state();

$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, array('context' => context_course::instance(SITEID))),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'fpablocks' => $blockshtmla,
    'fpbblocks' => $blockshtmlb,
    'fpcblocks' => $blockshtmlc,
    'hasblocks' => $hasblocks,
    'hascourseblocks' => $hascourseblocks,
    'hasfpblockregion' => $hasfpblockregion,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'hasfhsdrawer' => $hasfhsdrawer,
    'hasspdrawer' => false,
    'navspdraweropen' => false,
    'headerlogo' => $headerlogo,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'enrolform' => $enrolform,
    'hasfootnote' => !empty($footnote) && (preg_match('/[A-Za-z0-9]/', preg_replace('/<\\/?(p|div|span|br)*?>/', '', $footnote))),
    'footnote' => $footnote,
    'custommenupullright' => $PAGE->theme->settings->custommenupullright,
    'hascoursefooter' => !empty($coursefooter) && (preg_match('/[a-zA-Z0-9]/', strip_tags($coursefooter))),
    'coursefooter' => $coursefooter,
    'hasfooterelements' => !empty($PAGE->theme->settings->leftfooter) || !empty($PAGE->theme->settings->midfooter) || !empty($PAGE->theme->settings->rightfooter),
    'leftfooter' => $OUTPUT->footer_element('leftfooter'),
    'midfooter' => $OUTPUT->footer_element('midfooter'),
    'rightfooter' => $OUTPUT->footer_element('rightfooter'),
    'showlangmenu' => @$CFG->langmenu,
    'sitealternatename' => @$PAGE->theme->settings->sitealternatename,

    'useaccessibility' => @$PAGE->theme->settings->usedyslexicfont || @$PAGE->theme->settings->usehighcontrastfont,
    'usedyslexicfont' => @$PAGE->theme->settings->usedyslexicfont,
    'usehighcontrastfont' => @$PAGE->theme->settings->usehighcontrastfont,
    'dyslexicurl' => $OUTPUT->get_dyslexic_url(),
    'highcontrasturl' => $OUTPUT->get_highcontrast_url(),
    'dyslexicactive' => ($dysstate) ? 'active' : '',
    'highcontrastactive' => ($hcstate) ? 'active' : '',
    'dyslexicactiontitle' => ($dysstate) ? get_string('unsetdys', 'theme_fordson_fel') : get_string('setdys', 'theme_fordson_fel'),
    'highcontrastactiontitle' => ($hcstate) ? get_string('unsethc', 'theme_fordson_fel') : get_string('sethc', 'theme_fordson_fel'),
    'dynamiccss' => $OUTPUT->get_dynamic_css($PAGE->theme),
];

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    $templatecontext['technicalsignals'] = local_print_administrator_message();
}

theme_fordson_fel_process_texts($templatecontext);

$PAGE->requires->jquery();
$PAGE->requires->js_call_amd('theme_fordson_fel/pagescroll', 'init');
$PAGE->requires->js('/theme/fordson_fel/javascript/blockslider.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/cardimg.js');
if ($PAGE->theme->settings->preset != 'Spectrum-Achromatic') {
    $PAGE->requires->js('/theme/fordson_fel/javascript/courseblock.js');
}

$templatecontext['flatnavigation'] = $PAGE->flatnav;
echo $OUTPUT->render_from_template('theme_fordson_fel/mydashboard', $templatecontext);

