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
 * A one column layout for course format page in fordson theme.
 *
 * @package   theme_fordson
 * @copyright 2019 Valery Fremaux
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/theme/fordson_fel/lib/mobile_detect_lib.php');

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    require_once($CFG->dirroot.'/local/technicalsignals/lib.php');
}

require_once($CFG->libdir . '/behat/lib.php');

$extraclasses = [];

if (is_mobile()) {
    $extraclasses[] = 'is-mobile';
}
if (is_tablet()) {
    $extraclasses[] = 'is-tablet';
}

$hasblocks = false;
$haspostblocks = false;
$checkpostblocks = false;

list($hasfhsdrawer, $navdraweropen, $hasspdrawer, $navspdraweropen) = theme_fordson_fel_resolve_drawers($extraclasses, $checkpostblocks, is_mobile());

$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$footnote = $OUTPUT->footer_element('footnote');
$pagedoclink = $OUTPUT->page_doc_link();
$coursefooter = $OUTPUT->course_footer();

$page = format\page\course_page::get_current_page($COURSE->id);
$OUTPUT->check_dyslexic_state();
$OUTPUT->check_highcontrast_state();
$dysstate = $OUTPUT->get_dyslexic_state();
$hcstate = $OUTPUT->get_highcontrast_state();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID) , "escape" => false]),
    'output' => $OUTPUT,
    'sectionid' => $page->get_section_id(),
    'showbacktotop' => isset($PAGE->theme->settings->showbacktotop) && $PAGE->theme->settings->showbacktotop == 1,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'hasfhsdrawer' => $hasfhsdrawer,
    'hasspdrawer' => $checkpostblocks || $PAGE->user_is_editing(),
    'navspdraweropen' => $navspdraweropen && ($checkpostblocks || $PAGE->user_is_editing()),
    'hasfootnote' => !empty($footnote) && (preg_match('/[a-z]/', preg_replace('/<\\/?(p|div|span|br)*?>/', '', $footnote))),
    'footnote' => $footnote,
    'custommenupullright' => $PAGE->theme->settings->custommenupullright,
    'hascoursefooter' => !empty($coursefooter) && (preg_match('/[a-zA-Z0-9]/', strip_tags($coursefooter))),
    'coursefooter' => $coursefooter,
    'hasdoclink' => !empty($pagedoclink) && (preg_match('/[a-zA-Z0-9]/', strip_tags($pagedoclink))),
    'pagedoclink' => $pagedoclink,
    'hascustomlogin' => @$PAGE->theme->settings->showcustomlogin == 1,
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
    'dynamiccss' => $OUTPUT->get_dynamic_css($PAGE->theme),
];

theme_fordson_fel_process_texts($templatecontext);

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    $templatecontext['technicalsignals'] = local_print_administrator_message();
}

$PAGE->requires->jquery();
$PAGE->requires->js_call_amd('theme_fordson_fel/pagescroll', 'init');
$PAGE->requires->js('/theme/fordson_fel/javascript/scrollspy.js');

echo $OUTPUT->render_from_template('theme_fordson_fel/pagefordsonpage_fel', $templatecontext);

