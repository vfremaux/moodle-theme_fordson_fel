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
 * Heading and course images settings page file.
 *
 * @packagetheme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 * @creditstheme_boost - MoodleHQ
 * @licensehttp://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_fordson_fel_slideshow', get_string('slideshowsettings', 'theme_fordson_fel'));


// Show hide user enrollment toggle.
$name = 'theme_fordson_fel/showslideshow';
$title = get_string('showslideshow', 'theme_fordson_fel');
$description = get_string('showslideshow_desc', 'theme_fordson_fel');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Header size setting.
$name = 'theme_fordson_fel/slideshowheight';
$title = get_string('slideshowheight', 'theme_fordson_fel');
$description = get_string('slideshowheight_desc', 'theme_fordson_fel');;
$default = '250px';
$choices = array(
        '175px' => '175px',
        '200px' => '200px',
        '225px' => '225px',
        '250px' => '250px',
        '275px' => '275px',
        '300px' => '300px',
        '325px' => '325px',
        '350px' => '350px',
        '375px' => '375px',
        '400px' => '400px',
        '425px' => '425px',
        '450px' => '450px',
        '475px' => '475px',
        '500px' => '500px',
        '525px' => '525px',
        '550px' => '550px',
        '575px' => '575px',
        '600px' => '600px',
    );
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for slide
$name = 'theme_fordson_fel/slide1info';
$heading = get_string('slide1info', 'theme_fordson_fel');
$information = get_string('slide1infodesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// Slide title
$name = 'theme_fordson_fel/slide1title';
$title = get_string('slidetitle', 'theme_fordson_fel');
$description = get_string('slidetitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

//Slide Description
$name = 'theme_fordson_fel/slide1content';
$title = get_string('slidecontent', 'theme_fordson_fel');
$description = get_string('slidecontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// logo image.
$name = 'theme_fordson_fel/slide1image';
$title = get_string('slideimage', 'theme_fordson_fel');
$description = get_string('slideimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'slide1image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for slide
$name = 'theme_fordson_fel/slide2info';
$heading = get_string('slide2info', 'theme_fordson_fel');
$information = get_string('slide2infodesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// Slide title
$name = 'theme_fordson_fel/slide2title';
$title = get_string('slidetitle', 'theme_fordson_fel');
$description = get_string('slidetitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

//Slide Description
$name = 'theme_fordson_fel/slide2content';
$title = get_string('slidecontent', 'theme_fordson_fel');
$description = get_string('slidecontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// logo image.
$name = 'theme_fordson_fel/slide2image';
$title = get_string('slideimage', 'theme_fordson_fel');
$description = get_string('slideimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'slide2image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for slide
$name = 'theme_fordson_fel/slide3info';
$heading = get_string('slide3info', 'theme_fordson_fel');
$information = get_string('slide3infodesc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Slide title
$name = 'theme_fordson_fel/slide3title';
$title = get_string('slidetitle', 'theme_fordson_fel');
$description = get_string('slidetitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

//Slide Description
$name = 'theme_fordson_fel/slide3content';
$title = get_string('slidecontent', 'theme_fordson_fel');
$description = get_string('slidecontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// logo image.
$name = 'theme_fordson_fel/slide3image';
$title = get_string('slideimage', 'theme_fordson_fel');
$description = get_string('slideimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'slide3image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);