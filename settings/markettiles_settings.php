<?php

defined('MOODLE_INTERNAL') || die();

/* Marketing Spot Settings temp*/
$page = new admin_settingpage($themename.'_fel_marketing', get_string('marketingheading', 'theme_fordson_fel'));

// Toggle FP Textbox Spots.
$name = $themename.'/togglemarketing';
$title = get_string('togglemarketing' , 'theme_fordson_fel');
$description = get_string('togglemarketing_desc', 'theme_fordson_fel');
$displaytop = get_string('displaytop', 'theme_fordson_fel');
$displaybottom = get_string('displaybottom', 'theme_fordson_fel');
$default = '2';
$choices = array('1' => $displaytop, '2' => $displaybottom);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot One
$name = $themename.'/marketing1info';
$title = get_string('marketing1', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot One
$name = $themename.'/marketing1';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing1image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing1image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing1content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing1buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing1buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing1target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot Two
$name = $themename.'/marketing2info';
$title = get_string('marketing2', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot Two.
$name = $themename.'/marketing2';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing2image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing2image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing2content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing2buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing2buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing2target';
$title = get_string('marketingurltarget', 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self' => $target1, '_blank' => $target2, '_parent' => $target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot Three
$name = $themename.'/marketing3info';
$title = get_string('marketing3', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot Three.
$name = $themename.'/marketing3';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing3image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing3image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing3content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing3buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing3buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing3target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self' => $target1, '_blank' => $target2, '_parent' => $target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot Four
$name = $themename.'/marketing4info';
$title = get_string('marketing4', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot
$name = $themename.'/marketing4';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing4image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing4image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing4content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing4buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing4buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing4target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot Four
$name = $themename.'/marketing5info';
$title = get_string('marketing5', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot
$name = $themename.'/marketing5';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing5image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing5image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing5content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing5buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing5buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing5target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot Four
$name = $themename.'/marketing6info';
$title = get_string('marketing6', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot
$name = $themename.'/marketing6';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing6image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing6image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing6content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing6buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing6buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing6target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot
$name = $themename.'/marketing7info';
$title = get_string('marketing7', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot Seven
$name = $themename.'/marketing7';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing7image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing7image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing7content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing7buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing7buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing7target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot
$name = $themename.'/marketing8info';
$title = get_string('marketing8', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot Eight
$name = $themename.'/marketing8';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing8image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing8image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing8content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing8buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing8buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing8target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for Marketing Spot
$name = $themename.'/marketing9info';
$title = get_string('marketing9', 'theme_fordson_fel');
$information = get_string('marketinginfo_desc', 'theme_fordson_fel');
$setting = new admin_setting_heading($name, $title, $information);
$page->add($setting);

// Marketing Spot Nine
$name = $themename.'/marketing9';
$title = get_string('marketingtitle', 'theme_fordson_fel');
$description = get_string('marketingtitle_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Background image setting.
$name = $themename.'/marketing9image';
$title = get_string('marketingimage', 'theme_fordson_fel');
$description = get_string('marketingimage_desc', 'theme_fordson_fel');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing9image');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing9content';
$title = get_string('marketingcontent', 'theme_fordson_fel');
$description = get_string('marketingcontent_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing9buttontext';
$title = get_string('marketingbuttontext', 'theme_fordson_fel');
$description = get_string('marketingbuttontext_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing9buttonurl';
$title = get_string('marketingbuttonurl', 'theme_fordson_fel');
$description = get_string('marketingbuttonurl_desc', 'theme_fordson_fel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = $themename.'/marketing9target';
$title = get_string('marketingurltarget' , 'theme_fordson_fel');
$description = get_string('marketingurltarget_desc', 'theme_fordson_fel');
$target1 = get_string('marketingurltargetself', 'theme_fordson_fel');
$target2 = get_string('marketingurltargetnew', 'theme_fordson_fel');
$target3 = get_string('marketingurltargetparent', 'theme_fordson_fel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);