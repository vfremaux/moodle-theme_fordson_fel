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
 * Overriden course topics format renderer.
 *
 * @package    theme_fordson_fel
 * Special thanks to Willian Mono for course topic progress percentage code.  See comment for code.
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/format/topics/renderer.php');

class theme_fordson_fel_format_topics_renderer extends format_topics_renderer {

    public $availablestyles;

    public function __construct(moodle_page $page, $target) {
        global $PAGE, $COURSE;

        parent::__construct($page, $target);

        $this->config = get_config('theme_'.$PAGE->theme->name);
        $this->availablestyles = $this->parse_styleconfig();
    }

    /**
     * Generate a summary of a section for display on the 'coruse index page'
     *
     * @param stdClass $section The course_section entry from DB
     * @param stdClass $course The course entry from DB
     * @param array    $mods (argument not used)
     * @return string HTML to output.
     */
    protected function section_summary($section, $course, $mods) {
    	global $PAGE;
        $classattr = 'section main section-summary clearfix';
        $linkclasses = '';

        $total = 0;
        $complete = 0;
        $completioninfo = new completion_info($course);
        $cancomplete = isloggedin() && !isguestuser();
        $modinfo = get_fast_modinfo($course);
        
        $sectionmods = array();
        $completioninfo = new completion_info($course);
        if (!empty($modinfo->sections[$section->section])) {
            foreach ($modinfo->sections[$section->section] as $cmid) {
                
                $thismod = $modinfo->cms[$cmid];

                if ($thismod->modname == 'label') {
                    // Labels are special (not interesting for students)!
                    continue;
                }

                if ($thismod->uservisible) {
                    if (isset($sectionmods[$thismod->modname])) {
                        $sectionmods[$thismod->modname]['name'] = $thismod->modplural;
                        $sectionmods[$thismod->modname]['count']++;
                    }
                    else {
                        $sectionmods[$thismod->modname]['name'] = $thismod->modfullname;
                        $sectionmods[$thismod->modname]['count'] = 1;
                    }
                    if ($cancomplete && $completioninfo->is_enabled($thismod) != COMPLETION_TRACKING_NONE) {
                        $total++;
                        $completiondata = $completioninfo->get_data($thismod, true);
                        if ($completiondata->completionstate == COMPLETION_COMPLETE || $completiondata->completionstate == COMPLETION_COMPLETE_PASS) {
                            $complete++;
                        }
                    }
                }
            }
        }

        // If section is hidden then display grey section link.
        if (!$section->visible) {
            $classattr .= ' hidden';
            $linkclasses .= ' dimmed_text';
        } else if (course_get_format($course)->is_section_current($section)) {
            $classattr .= ' current';
        }

        $title = get_section_name($course, $section);
        $o = '';
        $attrs = [
            'id' => 'section-' . $section->section,
            'class' => $classattr,
            'role' => 'region',
            'aria-label' => $title
        ];

        $o .= html_writer::start_tag('li', $attrs);

        $o .= html_writer::tag('div', '', array(
            'class' => 'left side'
        ));
        $o .= html_writer::tag('div', '', array(
            'class' => 'right side'
        ));
        $o .= html_writer::start_tag('div', array(
            'class' => 'content'
        ));
        if ($total > 0) {
            $completion = new stdClass;
            $completion->complete = $complete;
            $completion->total = $total;
            $percenttext = get_string('coursecompletion', 'completion');
            $percent = 0;

            if ($complete > 0) {
                $percent = (int)(($complete / $total) * 100);
            }

            $o .= "<div class='progress fordsonsinglepage'>";
            $o .= "<div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='{$percent}' ";
            $o .= " aria-valuemin='0' aria-valuemax='100' style='width: {$percent}%;'>";
            $o .= "<div class='fhsprogresstest'>";
            $o .= "<span class='sr-only'>$percenttext</span>";
            $o .= "</div>";
            $o .= "</div>";
            $o .= "</div>";
        }
        if ($section->uservisible) {
            $title = html_writer::tag('a', $title, array(
                'href' => course_get_url($course, $section->section) ,
                'class' => $linkclasses
            ));
        }
        // Add .sectionname so that fontawesome icon can be applied to this page too.
        // Check section style overrides.
        if ($this->availablestyles) {
            $attrs = $this->get_custom_style($section);
        }
        $htmlattrs['class'] = 'section-title sectionname';
        if (!empty($attrs['class'])) {
            // Add custom style classes.
            $htmlattrs['class'] .= ' '.$attrs['class'];
        }
        if (!empty($attrs['style'])) {
            // Add custom style rules.
            $htmlattrs['style'] = $attrs['style'];
        }
        $o .= html_writer::tag('h3', $title, $htmlattrs);

        $o .= html_writer::start_tag('div', array(
            'class' => 'summarytext'
        ));

        $o .= $this->format_summary_text($section);
        $o .= $this->section_activity_summary($section, $course, null);
        $o .= html_writer::end_tag('div');

        $context = context_course::instance($course->id);
        $o .= $this->section_availability_message($section, has_capability('moodle/course:viewhiddensections', $context));

        $o .= html_writer::end_tag('div'); // Content.
        $o .= html_writer::end_tag('li');

        return $o;
    }

    /**
     * Generate the display of the header part of a section before
     * course modules are included
     *
     * @param stdClass $section The course_section entry from DB
     * @param stdClass $course The course entry from DB
     * @param bool $onsectionpage true if being printed on a single-section page
     * @param int $sectionreturn The section to return to after an action
     * @return string HTML to output.
     */
    protected function section_header($section, $course, $onsectionpage, $sectionreturn=null) {
        global $PAGE;

        // Check section style overrides.
        $attrs = array();
        if ($this->availablestyles) {
            $attrs = $this->get_custom_style($section);
        }

        $o = '';
        $currenttext = '';
        $sectionstyle = '';

        if ($section->section != 0) {
            // Only in the non-general sections.
            if (!$section->visible) {
                $sectionstyle = ' hidden';
            }
            if (course_get_format($course)->is_section_current($section)) {
                $sectionstyle = ' current';
            }
        }

        $htmlattrs = array('id' => 'section-'.$section->section,
            'class' => 'section main clearfix'.$sectionstyle, 'role'=>'region',
            'aria-label'=> get_section_name($course, $section));

        $o.= html_writer::start_tag('li', $htmlattrs);

        // Create a span that contains the section title to be used to create the keyboard section move menu.
        $o .= html_writer::tag('span', get_section_name($course, $section), array('class' => 'hidden sectionname'));

        $leftcontent = $this->section_left_content($section, $course, $onsectionpage);
        $o.= html_writer::tag('div', $leftcontent, array('class' => 'left side'));

        $rightcontent = $this->section_right_content($section, $course, $onsectionpage);
        $o.= html_writer::tag('div', $rightcontent, array('class' => 'right side'));
        $o.= html_writer::start_tag('div', array('class' => 'content'));

        // When not on a section page, we display the section titles except the general section if null
        $hasnamenotsecpg = (!$onsectionpage && ($section->section != 0 || !is_null($section->name)));

        // When on a section page, we only display the general section title, if title is not the default one
        $hasnamesecpg = ($onsectionpage && ($section->section == 0 && !is_null($section->name)));

        $classes = ' accesshide';
        if ($hasnamenotsecpg || $hasnamesecpg) {
            $classes = '';
        }
        $sectionname = html_writer::tag('span', $this->section_title($section, $course));
        if (!empty($attrs['class'])) {
            $classes .= ' '.$attrs['class'];
        }
        $htmlattrs = array('class' => 'sectionname '.$classes);
        if (!empty($attrs['style'])) {
            $htmlattrs['style'] = $attrs['style'];
        }
        $o.= html_writer::tag('h3', $sectionname, $htmlattrs);

        $o .= $this->section_availability($section);

        $o .= html_writer::start_tag('div', array('class' => 'summary'));
        if ($section->uservisible || $section->visible) {
            // Show summary if section is available or has availability restriction information.
            // Do not show summary if section is hidden but we still display it because of course setting
            // "Hidden sections are shown in collapsed form".
            $o .= $this->format_summary_text($section);
        }
        $o .= html_writer::end_tag('div');

        return $o;
    }

    /**
     * Generate a summary of the activites in a section
     *
     * @param stdClass $section The course_section entry from DB
     * @param stdClass $course the course record from DB
     * @param array    $mods (argument not used)
     * @return string HTML to output.
     */
    protected function section_activity_summary($section, $course, $mods) {
        global $PAGE;

        $modinfo = get_fast_modinfo($course);
        if (empty($modinfo->sections[$section->section])) {
            return '';
        }

        // Generate array with count of activities in this section.
        $sectionmods = array();
        $total = 0;
        $complete = 0;
        $cancomplete = isloggedin() && !isguestuser();
        $completioninfo = new completion_info($course);
        foreach ($modinfo->sections[$section->section] as $cmid) {
            $thismod = $modinfo->cms[$cmid];

            if ($thismod->modname == 'label') {
                // Labels are special (not interesting for students)!
                continue;
            }

            if ($thismod->uservisible) {
                if (isset($sectionmods[$thismod->modname])) {
                    $sectionmods[$thismod->modname]['name'] = $thismod->modplural;
                    $sectionmods[$thismod->modname]['count']++;
                }
                else {
                    $sectionmods[$thismod->modname]['name'] = $thismod->modfullname;
                    $sectionmods[$thismod->modname]['count'] = 1;
                }
                if ($cancomplete && $completioninfo->is_enabled($thismod) != COMPLETION_TRACKING_NONE) {
                    $total++;
                    $completiondata = $completioninfo->get_data($thismod, true);
                    if ($completiondata->completionstate == COMPLETION_COMPLETE || $completiondata->completionstate == COMPLETION_COMPLETE_PASS) {
                        $complete++;
                    }
                }
            }
        }

        if (empty($sectionmods)) {
            // No sections.
            return '';
        }

        $output = '';
        // Output Link to Topic modules.
        // $title = get_section_name($course, $section);
        $linktitle = get_string('viewsectionmodules', 'theme_fordson_fel');
        $output = html_writer::link(new moodle_url('/course/view.php', array('id' => $PAGE->course->id, 'section' => $section->section)) , $linktitle, array('class' => 'section-go-link btn btn-secondary'));

        // Output section activities summary
        $output .= html_writer::start_tag('div', array(
            'class' => 'section-summary-activities'
        ));

        $output .= html_writer::tag('span', get_string('section_mods', 'theme_fordson_fel') , array(
            'class' => 'activity-count'
        ));
        foreach ($sectionmods as $mod) {
            $output .= html_writer::start_tag('span', array(
                'class' => 'activity-count'
            ));
            $output .= $mod['name'] . ': ' . $mod['count'];
            $output .= html_writer::end_tag('span');
        }

        // Output section completion data.
        if ($total > 0) {
            $a = new stdClass;
            $a->complete = $complete;
            $a->total = $total;
            $output .= '<br>';
            $output .= html_writer::tag('span', get_string('progresstotal', 'completion', $a) , array(
                'class' => 'activity-count'
            ));
        }

        // End Willian Mono.

        $output .= html_writer::end_tag('div');

        return $output;
    }

    protected function section_edit_control_items($course, $section, $onsectionpage = false) {
        global $PAGE, $CFG;

        $sectionreturn = $onsectionpage ? $section->section : null;

        $caneditsection = false;
        if (is_dir($CFG->dirroot.'/local/sectioncontexts')) {
            $sectioncontext = context_course_section::instance($section->id);
            $caneditsection = has_capability('local/sectioncontexts:editsection', $sectioncontext);
            if (!$caneditsection) {
                return [];
            }
        }

        $controls = parent::section_edit_control_items($course, $section, $onsectionpage);
        $context = context_course::instance($course->id);

        // Get available section style overrides from config.
        $availablestyles = $this->parse_styleconfig();

        // Theme adds style related additional attribute in format.
        if (!empty($this->availablestyles) && ($section->section > 0) && $PAGE->user_is_editing()) {
            if (has_capability('moodle/course:update', $context) || $caneditsection) {
                $params = array('id' => $section->id);
                if (!empty($sectionreturn)) {
                    $params['sr'] = $sectionreturn;
                }
                $contentclassurl = new moodle_url('/theme/fordson_fel/sections/sectionclass.php', $params);
                $text = new lang_string('chooseclass', 'theme_'.$PAGE->theme->name);

                $controls['changesection'] = array(
                    'url'   => $contentclassurl,
                    'icon' => 'i/colourpicker',
                    'name' => $text,
                    'pixattr' => array('class' => '', 'alt' => $text),
                    'attr' => array('class' => 'icon changesection', 'title' => $text));
            }

            if (is_dir($CFG->dirroot.'/local/sectioncontexts')) {
                // Theme adds per section role assign.
                if ($PAGE->user_is_editing()) {
                    if (has_capability('local/sectioncontexts:assignrole', $context)) {
                        $sectioncontext = context_course_section::instance($section->id);
                        $assignroleurl = new moodle_url('/admin/roles/assign.php', array('contextid' => $sectioncontext->id, 'sesskey' => sesskey()));
                        $text = new lang_string('assignrole', 'role');
                        $controls['assignrole'] = array(
                            'url'   => $assignroleurl,
                            'icon' => 'i/role',
                            'name' => $text,
                            'pixattr' => array('class' => '', 'alt' => $text),
                            'attr' => array('class' => 'icon assignrole', 'title' => $text));
                    }
                }
            }
        }

        return $controls;
    }

    public function get_custom_style(&$section) {
        global $DB;

        $attrs = array();
        $availableconfigs = $this->availablestyles['configs'];
        $styleoverride = $DB->get_field('course_format_options', 'value', array('sectionid' => $section->id, 'name' => 'styleoverride'));
        if ($styleoverride) {
            if (array_key_exists($styleoverride, $availableconfigs)) {
                $styletoapply = $availableconfigs[$styleoverride];
                if (preg_match('/^\\{(.*)\\}/', $styletoapply, $matches)) {
                    // If is a real style rule, apply as style attrribute.
                    $attrs['style'] = $matches[1];
                } else {
                    $attrs['class'] = @$attrs['class'].' '.$styletoapply;
                }
            }
        }

        return $attrs;
    }

    /**
     * Parses the theme configuration flexsectionstyles setting and
     * extracts usable style information for section headings.
     *
     * admitted syntax are : 
     * <stylename>:<stylelabel>:<stylerule>
     * 
     * stylerule can be a class name, or a {<cssrulelist>} real css fragment.
     */
    public function parse_styleconfig() {
        if (!empty($this->config->sectionsstyles)) {
            $rules = explode("\n", $this->config->sectionsstyles);
            foreach ($rules as $r) {
                if (preg_match('/^(#|\\/)/', $r)) {
                    // Ignore commented line.
                    continue;
                }
                if (preg_match('/^[\\s]*$/', $r)) {
                    // Ignore empty or only space lines.
                    continue;
                }
                if (preg_match('/^(.*?):(.*?):(.*)$/', $r, $matches)) {
                    $styleconfigs[$matches[1]] = $matches[3];
                    $stylelabels[$matches[1]] = $matches[2];
                }
            }
            return array('configs' => $styleconfigs, 'labels' => $stylelabels);
        }

        return array('configs' => array(), 'labels' => array());
    }

}