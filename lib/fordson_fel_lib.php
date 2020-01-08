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
 * FileSettings Lib file.
 *
 * @package    theme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @credits    theme_boost - MoodleHQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/weblib.php');

function theme_fordson_fel_get_course_activities() {
    global $CFG, $PAGE, $OUTPUT;

    // A copy of block_activity_modules.
    $course = $PAGE->course;
    $content = new stdClass();
    $modinfo = get_fast_modinfo($course);
    $modfullnames = array();

    $archetypes = array();

    foreach ($modinfo->cms as $cm) {
        // Exclude activities which are not visible or have no link (=label).
        if (!$cm->uservisible or !$cm->has_view()) {
            continue;
        }
        if (array_key_exists($cm->modname, $modfullnames)) {
            continue;
        }
        if (!array_key_exists($cm->modname, $archetypes)) {
            $archetypes[$cm->modname] = plugin_supports('mod', $cm->modname, FEATURE_MOD_ARCHETYPE, MOD_ARCHETYPE_OTHER);
        }
        if ($archetypes[$cm->modname] == MOD_ARCHETYPE_RESOURCE) {
            if (!array_key_exists('resources', $modfullnames)) {
                $modfullnames['resources'] = get_string('resources');
            }
        } else {
            $modfullnames[$cm->modname] = $cm->modplural;
        }
    }
    core_collator::asort($modfullnames);

    return $modfullnames;
}

function theme_fordson_fel_strip_html_tags($text) {
    $text = preg_replace(
        array(
            // Remove invisible content.
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
            // Add line breaks before and after blocks.
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
            ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
            ),
        $text
        );
return strip_tags( $text );
}

/**
 * Cut the Course content.
 *
 * @param $str
 * @param $n
 * @param $end_char
 * @return string
 */
function theme_fordson_fel_course_trim_char($str, $n = 500, $endchar = '&#8230;') {
    if (strlen($str) < $n) {
        return $str;
    }

    $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));
    if (strlen($str) <= $n) {
        return $str;
    }

    $out = "";
    $small = substr($str, 0, $n);
    $out = $small.$endchar;
    return $out;
}

function theme_fordson_fel_get_random_filearea_url($filearea) {
    global $PAGE;

    // Process args to randomize on all images in this filearea.
    $fs = get_file_storage();

    $syscontext = context_system::instance();
    $component = 'theme_'.$PAGE->theme->name;

    if ($loginimages = $fs->get_area_files($syscontext->id, $component, $filearea, 0, "itemid, filepath, filename", false)) { // Ignore dirs.
        shuffle($loginimages);
        $image = array_shift($loginimages);

        return moodle_url::make_pluginfile_url($syscontext->id, $component, $filearea, 0, $image->get_filepath(), $image->get_filename(), true);
    }

    return false;
}

/**
 * We check we are in a course module or not.
 */
function fordson_fel_page_location_incourse_themeconfig() {
    GLOBAL $PAGE;

    $course = $PAGE->cm;

    if ($course) {
        return true;
    } else {
        return false;
    }
}

/**
 * Inject some settings in text zones
 */
function theme_fordson_fel_process_footer_texts(&$templatecontext) {
    global $PAGE, $OUTPUT;

    $textzones = ['footnote', 'leftfooter', 'midfooter', 'rightfooter'];

    foreach ($textzones as $tz) {
        $templatecontext[$tz] = str_replace('{{socialicons}}', $OUTPUT->social_icons(), $templatecontext[$tz]);
        $templatecontext[$tz] = str_replace('{{brandorganization}}', @$PAGE->theme->settings->brandorganization, $templatecontext[$tz]);
        $templatecontext[$tz] = str_replace('{{brandwebsite}}', @$PAGE->theme->settings->brandwebsite, $templatecontext[$tz]);
        $templatecontext[$tz] = str_replace('{{brandphone}}', @$PAGE->theme->settings->brandphone, $templatecontext[$tz]);
        $templatecontext[$tz] = str_replace('{{brandemail}}', @$PAGE->theme->settings->brandemail, $templatecontext[$tz]);
        if (\tool_usertours\manager::get_current_tour()) {
            $link = \html_writer::link('', get_string('resettouronpage', 'tool_usertours'), [
                    'data-action'   => 'tool_usertours/resetpagetour',
                ]);
            $templatecontext[$tz] = str_replace('{{resettourlink}}', $link, $templatecontext[$tz]);
        } else {
            $templatecontext[$tz] = str_replace('{{resettourlink}}', '', $templatecontext[$tz]);
        }
    }

}