<?php
// $Id: oninstall.php,v 1.1 2009/03/19 15:31:31 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

if (!defined('XOOPS_TRUST_PATH')) {
    die('not permit');
}

//=========================================================
// class timeline_inc_oninstall
//=========================================================
class timeline_inc_oninstall extends timeline_base_inc_oninstall
{

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->set_trust_dirname(TIMELINE_TRUST_DIRNAME);
    }

    public static function getInstance()
    {
        static $instance;
        if (!isset($instance)) {
            $instance = new timeline_inc_oninstall();
        }
        return $instance;
    }

    // --- class end ---
}
