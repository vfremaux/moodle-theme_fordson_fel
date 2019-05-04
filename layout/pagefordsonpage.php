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
if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    require_once($CFG->dirroot.'/local/technicalsignals/lib.php');
}

require_once($CFG->libdir . '/behat/lib.php');

$extraclasses = [];

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$hasblocks = false;
$haspostblocks = false;

$coursefooter = $OUTPUT->course_footer();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID) , "escape" => false]),
    'output' => $OUTPUT,
    'showbacktotop' => isset($PAGE->theme->settings->showbacktotop) && $PAGE->theme->settings->showbacktotop == 1,
    'bodyattributes' => $bodyattributes,
    'hascoursefooter' => !empty($coursefooter) && (preg_match('/[a-z]/', strip_tags($coursefooter))),
    'coursefooter' => $coursefooter,
];

if (is_dir($CFG->dirroot.'/local/technicalsignals')) {
    $templatecontext['technicalsignals'] = local_print_administrator_message();
}

$PAGE->requires->jquery();
if (isset($PAGE->theme->settings->showbacktotop) && $PAGE->theme->settings->showbacktotop == 1) {
    $PAGE->requires->js('/theme/fordson_fel/javascript/scrolltotop.js');
    $PAGE->requires->js('/theme/fordson_fel/javascript/scrolltobottom.js');
    $PAGE->requires->js('/theme/fordson_fel/javascript/scrollspy.js');
}

echo $OUTPUT->render_from_template('theme_fordson_fel/pagefordsonpage_fel', $templatecontext);

