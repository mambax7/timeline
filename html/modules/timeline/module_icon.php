<?php
// $Id: module_icon.php,v 1.1.1.1 2009/03/19 14:42:18 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

$xoopsOption['nocommon'] = true;
require '../../mainfile.php';

if (!defined('XOOPS_TRUST_PATH')) {
    die('set XOOPS_TRUST_PATH into mainfile.php');
}

$MY_DIRNAME = basename(__DIR__);

require XOOPS_ROOT_PATH . '/modules/' . $MY_DIRNAME . '/include/mytrustdirname.php'; // set $mytrustdirname
require XOOPS_TRUST_PATH . '/modules/' . $MY_TRUST_DIRNAME . '/module_icon.php';
