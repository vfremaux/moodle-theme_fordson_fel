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
 * SCSS Lib file.
 *
 * @package    theme_fordson_fel
 * @copyright  2016 Chris Kenniburg
 *
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Post process the CSS tree.
 *
 * @param string $tree The CSS tree.
 * @param theme_config $theme The theme config object.
 */
function theme_fordson_fel_css_tree_post_processor($tree, $theme) {
    $prefixer = new theme_boost\autoprefixer($tree);
    $prefixer->prefix();
}

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_fordson_fel_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    $iterator = new DirectoryIterator($CFG->dirroot . '/theme/fordson_fel/scss/preset/');
    $presetisset = '';
    $presetscss = '';
    foreach ($iterator as $pfile) {
        if (!$pfile->isDot()) {
            $presetname = substr($pfile, 0, strlen($pfile) - 5); // Name - '.scss'.
            if ($filename == $presetname) {
                $presetscss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/preset/' . $pfile);
                $presetisset = true;
            }
        }
    }
    if (!$presetisset) {
        $filename .= '.scss';
        if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_'.$theme->name, 'preset', 0, '/', $filename))) {
            $presetscss .= $presetfile->get_content();
        }
        else {
            // Safety fallback - maybe new installs etc.
            // Nothing presetted.
            $presetscss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/preset/Default.scss');
        }
    }

    if (empty($theme->settings->presetaslast)) {
        $scss .= $presetscss;
    }

    $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/fordson_fel_variables.scss');

    // Page Layout
    debug_trace("Fordson fel using layout file {$theme->settings->pagelayout} ");
    if ($theme->settings->pagelayout == 1) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/pagelayout/layout1.scss');
    }
    if ($theme->settings->pagelayout == 2) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/pagelayout/layout2.scss');
    }
    if ($theme->settings->pagelayout == 3) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/pagelayout/layout3.scss');
    }
    if ($theme->settings->pagelayout == 4) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/pagelayout/layout4.scss');
    }
    if ($theme->settings->pagelayout == 5) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/pagelayout/layout5.scss');
    }

    // Section Style
    debug_trace("Fordson fel using sectionlayout file {$theme->settings->sectionlayout} ");
    if ($theme->settings->sectionlayout == 1) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle1.scss');
    }
    if ($theme->settings->sectionlayout == 2) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle2.scss');
    }
    if ($theme->settings->sectionlayout == 3) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle3.scss');
    }
    if ($theme->settings->sectionlayout == 4) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle4.scss');
    }
    if ($theme->settings->sectionlayout == 5) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle5.scss');
    }
    if ($theme->settings->sectionlayout == 6) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle6.scss');
    }
    if ($theme->settings->sectionlayout == 7) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle7.scss');
    }
    if ($theme->settings->sectionlayout == 8) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/sectionlayout/sectionstyle8.scss');
    }

    debug_trace("Fordson fel using marketingstyle file {$theme->settings->marketingstyle} ");
    if ($theme->settings->marketingstyle == 1) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/marketingstyle/marketingstyle1.scss');
    }
    if ($theme->settings->marketingstyle == 2) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/marketingstyle/marketingstyle2.scss');
    }
    if ($theme->settings->marketingstyle == 3) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/marketingstyle/marketingstyle3.scss');
    }
    if ($theme->settings->marketingstyle == 4) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/marketingstyle/marketingstyle4.scss');
    }

    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/styles.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/styles.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/non_core_plugins.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/non_core_plugins.scss');
    }

    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/blocks.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/blocks.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/stylebreadcrumb.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/stylebreadcrumb.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/navbar.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/navbar.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/tabs.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/tabs.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/quiz.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/quiz.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/responsive.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/responsive.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/modthumb.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/modthumb.scss');
    }
    if (is_readable($CFG->dirroot . '/theme/fordson_fel/scss/buttons.scss')) {
        $scss .= file_get_contents($CFG->dirroot . '/theme/fordson_fel/scss/buttons.scss');
    }

    if (!empty($theme->settings->presetaslast)) {
        $scss .= $presetscss;
    }

    // Add variant local sheet.
    if (preg_match('/\d{2}$/', $theme->name)) {
        // We are in a numbered variant.
        if (is_readable($CFG->dirroot . '/theme/'.$theme->name.'/scss/variant.scss')) {
            $scss .= file_get_contents($CFG->dirroot . '/theme/'.$theme->name.'/scss/variant.scss');
        }
    }

    return $scss;
}

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return array
 */
function theme_fordson_fel_get_pre_scss($theme) {
    global $CFG, $PAGE;

    $prescss = "/* Generated variables from theme configuration */\n";

    $configurable = [
    // Config key => variableName,
    'brandprimary' => ['brandprimary'],
    'brandprimaryalt' => ['brandprimaryalt'],
    'brandsecondary' => ['brandsecondary'],
    'brandsecondaryalt' => ['brandsecondaryalt'],
    'brandsuccess' => ['success'],
    'brandinfo' => ['info'],
    'brandwarning' => ['warning'],
    'branddanger' => ['danger'],

    'topnavbarbkg' => ['topnavbar-bg'],
    'topnavbarfg' => ['topnavbar-fg'],
    'topnavbarbkghov' => ['topnavbar-bg-hover'],
    'topnavbarteacherbkg' => ['teachernavbarcolor'],

    'bodybkg' => ['body-bg'],

    'breadcrumbbkg' => ['breadcrumb-bg'],
    'breadcrumbfg' => ['breadcrumb-fg'],

    'cardbkg' => ['card-bg'],

    'drawerbkg' => ['drawer-bg'],
    'drawerfg' => ['drawer-fg'],

    'footerbkg' => ['footer-bg'],
    'footerfg' => ['footer-fg'],

    'fploginformbkg' => ['fploginform-bg'],
    'fploginformfg' => ['fploginform-fg'],

    'headerimagepadding' => ['headerimagepadding'],
    'markettextbkg' => ['markettextbg'],
    'iconwidth' => ['fpicon-width'],
    'courseboxheight' => ['courseboxheight'],
    'learningcontentpadding' => ['learningcontentpadding'],
    'blockwidthfordson_fel' => ['blockwidthfordson_fel'],
    'slideshowheight' => ['slideshowheight'],
    'activityiconsize' => ['activityiconsize'],
    'activitycustomiconwidth' => ['activitycustomiconwidth'],
    'gutterwidth' => ['gutterwidth'],

    'usecustomfonts' => ['usecustomfonts'],
    'generalaltccsselector' => ['altfontselector'],
    ];

    // Add settings variables.
    foreach ($configurable as $configkey => $targets) {
        if (isset($theme->settings->{$configkey})) {
            $value = $theme->settings->{$configkey};
        }
        if (empty($value)) {
            // $value = 'undefined';
            continue;
        }
        array_map(function ($target) use (&$prescss, $value) {
            $prescss .= '$' . $target . ': ' . $value . ";\n";
        }
        , (array)$targets);
    }

    // Load the fonts urls
    $generalbodyfonturl = $theme->setting_file_url('generalbodyfont', 'generalbodyfont');
    if (!empty($generalbodyfonturl)) {
        $prescss .= '$generalbodyfont: url("'.$generalbodyfonturl."\");\n";
    }

    $generalaltfonturl = $theme->setting_file_url('generalaltfont', 'generalaltfont');
    if (!empty($generalaltfonturl)) {
        $prescss .= '$generalaltfont: url("'.$generalaltfonturl."\");\n";
    }

    $titlefonturl = $theme->setting_file_url('titlefont', 'titlefont');
    if (!empty($titlefonturl)) {
        $prescss .= '$titlefont: url("'.$titlefonturl."\");\n";
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $prescss .= $theme->settings->scsspre;
    }

    // Set the default image for the header.
    $slide1image = $theme->setting_file_url('slide1image', 'slide1image');
    if (isset($slide1image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.slide1image {background-image: url("' . $slide1image . '"); background-size:cover; background-repeat: no-repeat; background-position:center;}';
    }

    // Set the default image for the header.
    $slide2image = $theme->setting_file_url('slide2image', 'slide2image');
    if (isset($slide2image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.slide2image {background-image: url("' . $slide2image . '"); background-size:cover; background-repeat: no-repeat; background-position:center;}';
    }

    // Set the default image for the header.
    $slide3image = $theme->setting_file_url('slide3image', 'slide3image');
    if (isset($slide3image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.slide3image {background-image: url("' . $slide3image . '"); background-size:cover; background-repeat: no-repeat; background-position:center;}';
    }


    // Set the default image for the header.
    $headerbg = $theme->setting_file_url('headerdefaultimage', 'headerdefaultimage');

    // Set the background image for the page.
    $pagebg = $theme->setting_file_url('backgroundimage', 'backgroundimage');
    if (isset($pagebg)) {
        $prescss .= 'body {background-image: url("' . $pagebg . '"); background-size:cover; background-position:center;}';
    }

    // Set the background image for the login page.
    /*
    $loginbg = $theme->setting_file_url('loginimage', 'loginimage');
    if ($PAGE->theme->settings->showcustomlogin == 1) {
        if (isset($loginbg)) {
            // $prescss .= '#page.customloginimage {background-image: url("' . $loginbg . '") !important; background-size:cover; background-position:center;}';
        }
    } else {
        if (isset($loginbg)) {
            $prescss .= 'body#page-login-signup {background-image: url("' . $loginbg . '") !important; background-size:cover; background-position:center;}';
            $prescss .= 'body#page-login-index {background-image: url("' . $loginbg . '") !important; background-size:cover; background-position:center;}';
        }
    }
    */

    // Set the image.
    $marketing1image = $theme->setting_file_url('marketing1image', 'marketing1image');
    if (isset($marketing1image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing1image {background-image: url("' . $marketing1image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing2image = $theme->setting_file_url('marketing2image', 'marketing2image');
    if (isset($marketing2image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing2image {background-image: url("' . $marketing2image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing3image = $theme->setting_file_url('marketing3image', 'marketing3image');
    if (isset($marketing3image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing3image {background-image: url("' . $marketing3image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing4image = $theme->setting_file_url('marketing4image', 'marketing4image');
    if (isset($marketing4image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing4image {background-image: url("' . $marketing4image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing5image = $theme->setting_file_url('marketing5image', 'marketing5image');
    if (isset($marketing5image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing5image {background-image: url("' . $marketing5image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing6image = $theme->setting_file_url('marketing6image', 'marketing6image');
    if (isset($marketing6image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing6image {background-image: url("' . $marketing6image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing7image = $theme->setting_file_url('marketing7image', 'marketing7image');
    if (isset($marketing7image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing7image {background-image: url("' . $marketing7image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing8image = $theme->setting_file_url('marketing8image', 'marketing8image');
    if (isset($marketing8image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing8image {background-image: url("' . $marketing8image . '"); background-size:cover; background-position:center;}';
    }

    // Set the image.
    $marketing9image = $theme->setting_file_url('marketing9image', 'marketing9image');
    if (isset($marketing9image)) {
        // Add a fade in transition to avoid the flicker on course headers ***.
        $prescss .= '.marketing9image {background-image: url("' . $marketing9image . '"); background-size:cover; background-position:center;}';
    }

    return $prescss;
}

