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

function theme_fordson_fel_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    global $DB;
    static $theme;

    if (empty($options['theme'])) {
        if (empty($theme)) {
            $theme = theme_config::load('fordson_fel');
        }
    } else {
        // Allows reading another set of parameters.
        $theme = $options['theme'];
    }

    if ($filearea == 'modthumb') {
        // Exceptionnnaly we let pass without control the course modules context queries to intro files.
        // We allow format_page component pages which real component identity is given by the context id.

        $fs = get_file_storage();
        if ($course->format == 'page') {
            include_once($CFG->dirroot.'/course/format/page/classes/page.class.php');
            if (!course_page::check_page_public_accessibility($course)) {
                // Process as usual.
                require_course_login($course);
            }
        } else {
            require_course_login($course);
        }

        // Seek for the real component hidden beside the context.
        $cm = $DB->get_record('course_modules', array('id' => $context->instanceid));
        $component = 'mod_'.$DB->get_field('modules', 'name', array('id' => $cm->module));
        $relativepath = implode('/', $args);
        $fullpath = "/{$context->id}/$component/$filearea/$relativepath";
        $fs->get_file_by_hash(sha1($fullpath));
        if ((!$file = $fs->get_file_by_hash(sha1($fullpath))) || $file->is_directory()) {
            return false;
        }
        send_stored_file($file, 0, 0, true); // Download MUST be forced - security!
        die;
    }

    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === '')) {
        $theme = theme_config::load('fordson_fel');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else if ($filearea === 'headerlogo') {
        return $theme->setting_file_serve('headerlogo', $args, $forcedownload, $options);
    } else if ($filearea === 'favicon') {
        return $theme->setting_file_serve('favicon', $args, $forcedownload, $options);
    } else if ($filearea === 'feature1image') {
        return $theme->setting_file_serve('feature1image', $args, $forcedownload, $options);
    } else if ($filearea === 'feature2image') {
        return $theme->setting_file_serve('feature2image', $args, $forcedownload, $options);
    } else if ($filearea === 'feature3image') {
        return $theme->setting_file_serve('feature3image', $args, $forcedownload, $options);
    } else if ($filearea === 'headerdefaultimage') {
        return $theme->setting_file_serve('headerdefaultimage', $args, $forcedownload, $options);
    } else if ($filearea === 'backgroundimage') {
        return $theme->setting_file_serve('backgroundimage', $args, $forcedownload, $options);
    } else if ($filearea === 'loginimage') {
        return $theme->setting_file_serve('loginimage', $args, $forcedownload, $options);
    } else if ($filearea === 'logintopimage') {
        return $theme->setting_file_serve('logintopimage', $args, $forcedownload, $options);
    } else if ($filearea === 'marketing1image') {
        return $theme->setting_file_serve('marketing1image', $args, $forcedownload, $options);
    } else if ($filearea === 'marketing2image') {
        return $theme->setting_file_serve('marketing2image', $args, $forcedownload, $options);
    } else if ($filearea === 'marketing3image') {
        return $theme->setting_file_serve('marketing3image', $args, $forcedownload, $options);
    } else if ($filearea === 'marketing4image') {
        return $theme->setting_file_serve('marketing4image', $args, $forcedownload, $options);
    } else if ($filearea === 'marketing5image') {
        return $theme->setting_file_serve('marketing5image', $args, $forcedownload, $options);
    } else if ($filearea === 'marketing6image') {
        return $theme->setting_file_serve('marketing6image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide1image') {
        return $theme->setting_file_serve('slide1image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide2image') {
        return $theme->setting_file_serve('slide2image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide3image') {
        return $theme->setting_file_serve('slide3image', $args, $forcedownload, $options);

    } else {
        send_file_not_found();
    }
}

/**
 * This function creates the dynamic HTML needed for some
 * settings and then passes it back in an object so it can
 * be echo'd to the page.
 *
 * This keeps the logic out of the layout files.
 *
 * @param string $setting bring the required setting into the function
 * @param bool $format
 * @param string $setting
 * @param array $theme
 * @param stdclass $CFG
 * @return string
 */
 /*
function theme_fordson_fel_get_setting($setting, $format = false) {
    global $CFG;
    require_once($CFG->dirroot . '/lib/weblib.php');
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('fordson_fel');
    }
    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}
*/