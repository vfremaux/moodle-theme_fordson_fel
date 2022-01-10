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
 * @package theme_essential_barchen
 * @category theme
 * @author valery fremaux (valery.fremaux@gmail.com)
 * @copyright 2008 Valery Fremaux (Edunao.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * Page reorganisation service
 */
defined('MOODLE_INTERNAL') || die();

function theme_fordson_fel_get_category($catid, $chelper) {
    return \core_course_category::get($catid);
}

function theme_fordson_fel_course_in_list($course) {
    return new \core_course_list_element($course);
}

function theme_fordson_fel_get_login_token() {
    return \core\session\manager::get_login_token();
}