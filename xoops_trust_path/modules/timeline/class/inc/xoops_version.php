<?php
// $Id: xoops_version.php,v 1.2 2009/03/19 15:31:31 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

if (!defined('XOOPS_TRUST_PATH')) {
    die('not permit');
}

//=========================================================
// class timeline_inc_xoops_version
//=========================================================
class timeline_inc_xoops_version extends timeline_base_inc_xoops_version
{
    public $_HAS_ONINSATLL = true;
    public $_HAS_MAIN      = true;
    public $_HAS_ADMIN     = true;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct($dirname)
    {
        parent::__construct($dirname);
    }

    public static function getSingleton($dirname)
    {
        static $singletons;
        if (!isset($singletons[$dirname])) {
            $singletons[$dirname] = new timeline_inc_xoops_version($dirname);
        }
        return $singletons[$dirname];
    }

    //---------------------------------------------------------
    // main
    //---------------------------------------------------------
    public function modversion()
    {
        return $this->build_modversion();
    }

    public function get_version()
    {
        return _C_TIMELINE_VERSION;
    }

    // --- class end ---
}
