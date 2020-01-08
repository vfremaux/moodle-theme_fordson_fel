<?php

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot.'/theme/fordson_fel/lib/Mobile-Detect/Mobile_Detect.php');

use theme_fordson_fel\Mobile_Detect;

function is_mobile() {
    $detector = new Mobile_Detect();
    return $detector->isMobile();
}

function is_tablet() {
    $detector = new Mobile_Detect();
    return $detector->isTablet();
}