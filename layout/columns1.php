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
 * A one column layout for the fordson_fel theme.
 *
 * @package   theme_boost
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/theme/fordson_fel/lib/mobile_detect_lib.php');

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    require_once($CFG->dirroot.'/local/technicalsignals/lib.php');
}

if ($PAGE->theme->settings->breadcrumbstyle == '1') {
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

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$hasblocks = false;

$hasfpblockregion = isset($PAGE->theme->settings->showblockregions) !== false;

$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$footnote = $OUTPUT->footer_element('footnote');
$pagedoclink = $OUTPUT->page_doc_link();
$coursefooter = $OUTPUT->course_footer();
$OUTPUT->check_dyslexic_state();
$OUTPUT->check_highcontrast_state();
$dysstate = $OUTPUT->get_dyslexic_state();
$hcstate = $OUTPUT->get_highcontrast_state();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID) , "escape" => false]) , 
    'output' => $OUTPUT,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'hasfootnote' => !empty($footnote) && (preg_match('/[A-Za-z0-9]/', preg_replace('/<\\/?(p|div|span|br)*?>/', '', $footnote))),
    'custommenupullright' => $PAGE->theme->settings->custommenupullright,
    'footnote' => $footnote,
    'hascoursefooter' => !empty($coursefooter) && (preg_match('/[a-z]/', strip_tags($coursefooter))),
    'coursefooter' => $coursefooter,
    'hasdoclink' => !empty($pagedoclink) && (preg_match('/[a-z]/', strip_tags($pagedoclink))),
    'pagedoclink' => $pagedoclink,
    'hascustomlogin' => $PAGE->theme->settings->showcustomlogin == 1,
    'hasfooterelements' => !empty($PAGE->theme->settings->leftfooter) || !empty($PAGE->theme->settings->midfooter) || !empty($PAGE->theme->settings->rightfooter),
    'leftfooter' => $OUTPUT->footer_element('leftfooter'),
    'midfooter' => $OUTPUT->footer_element('midfooter'),
    'rightfooter' => $OUTPUT->footer_element('rightfooter'),
    'showlangmenu' => @$CFG->langmenu,
    'sitealternatename' => @$PAGE->theme->settings->sitealternatename,
    'technicalsignals' => local_print_administrator_message(),

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

theme_fordson_fel_pass_layout_options($templatecontext);
theme_fordson_fel_process_texts($templatecontext);

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    $templatecontext['technicalsignals'] = local_print_administrator_message();
}

$PAGE->requires->jquery();
$PAGE->requires->js_call_amd('theme_fordson_fel/pagescroll', 'init');
$PAGE->requires->js('/theme/fordson_fel/javascript/scrollspy.js');
$PAGE->requires->js('/theme/fordson_fel/javascript/tooltipfix.js');

echo $OUTPUT->render_from_template('theme_fordson_fel/columns1', $templatecontext);