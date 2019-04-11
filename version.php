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
 * Version file.
 *
 * @package    theme_fordson_fel
 * @copyright  Valery Fremaux valery.fremaux@gmail.com
 * @credits    theme_boost - MoodleHQ / 2016 Chris Kenniburg
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2019030600;
$plugin->release  = 'Moodle 3.6 fordson_fel v3.6 release 1 Build(2019030600)';
$plugin->maturity  = MATURITY_STABLE;
$plugin->requires  = 2018112800;
$plugin->component = 'theme_fordson_fel';
$plugin->dependencies = array(
    'theme_boost'  => 2018051400,
);

// Non moodle attributes.
$plugin->codeincrement = '3.6.0005';
