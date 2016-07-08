<?php
// $Id: module_icon.php,v 1.1.1.1 2009/03/19 14:41:41 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

//---------------------------------------------------------
// $MY_DIRNAME is set by caller
//---------------------------------------------------------

if (!defined('XOOPS_TRUST_PATH')) {
    die('not permit');
}

//---------------------------------------------------------
// timeline files
//---------------------------------------------------------
include_once XOOPS_TRUST_PATH . '/modules/timeline/init.php';

timeline_include_once('class/base/d3/module_icon.php', $MY_DIRNAME);

//---------------------------------------------------------
// main
//---------------------------------------------------------
$timeline_module_icon = new timeline_base_d3_module_icon($MY_DIRNAME, TIMELINE_TRUST_DIRNAME);
$timeline_module_icon->output_image();
