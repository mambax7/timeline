<?php
// $Id: param.php,v 1.2 2011/12/26 05:45:39 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

//---------------------------------------------------------
// change log
// 2011-12-25 K.OHWADA
// get_user_timeoffset()
//---------------------------------------------------------

if (!defined('XOOPS_TRUST_PATH')) {
    die('not permit');
}

//=========================================================
// class timeline_base_xoops_param
//=========================================================
class timeline_base_xoops_param
{
    public $_module_mid;
    public $_language;

    public $_JPAPANESE_ARRAY = array('japanese', 'japaneseutf', 'ja_utf8');

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        $this->_module_mid = $this->get_module_mid();
        $this->_language   = $this->get_config_by_name('language');
    }

    //---------------------------------------------------------
    // config
    //---------------------------------------------------------
    public function get_config_by_name($name)
    {
        global $xoopsConfig;
        if (isset($xoopsConfig[$name])) {
            return $xoopsConfig[$name];
        }
        return false;
    }

    public function is_japanese()
    {
        if (in_array($this->_language, $this->_JPAPANESE_ARRAY)) {
            return true;
        }
        return false;
    }

    //---------------------------------------------------------
    // module config
    //---------------------------------------------------------
    public function get_module_config_text_by_name($name, $format = 'n')
    {
        $val = $this->get_module_config_by_name($name);
        if (empty($val)) {
            return null;
        }

        switch ($format) {
            case 's':
                $ret = $this->sanitize($val);
                break;

            case 'textarea':
                $ret = str_replace('"', "'", $val);
                break;

            case 'n':
            default:
                $ret = $val;
                break;
        }
        return $ret;
    }

    public function get_module_config_by_name($name)
    {
        global $xoopsModuleConfig;
        if (isset($xoopsModuleConfig[$name])) {
            return $xoopsModuleConfig[$name];
        }
        return null;
    }

    //---------------------------------------------------------
    // my module
    //---------------------------------------------------------
    public function get_module_mid($format = 's')
    {
        return $this->get_module_value_by_name('mid', $format);
    }

    public function get_module_name($format = 's')
    {
        return $this->get_module_value_by_name('name', $format);
    }

    public function get_module_value_by_name($name, $format = 's')
    {
        global $xoopsModule;
        if (is_object($xoopsModule)) {
            return $xoopsModule->getVar($name, $format);
        }
        return false;
    }

    //---------------------------------------------------------
    // my user
    //---------------------------------------------------------
    public function get_user_uid($format = 's')
    {
        return $this->get_user_value_by_name('uid', $format);
    }

    public function get_user_uname($format = 's')
    {
        return $this->get_user_value_by_name('uname', $format);
    }

    public function get_user_value_by_name($name, $format = 's')
    {
        global $xoopsUser;
        if (is_object($xoopsUser)) {
            return $xoopsUser->getVar($name, $format);
        }
        return false;
    }

    public function get_user_groups()
    {
        global $xoopsUser;
        if (is_object($xoopsUser)) {
            return $xoopsUser->getGroups();
        }
        return array(XOOPS_GROUP_ANONYMOUS);
    }

    public function get_user_is_login()
    {
        global $xoopsUser;
        if (is_object($xoopsUser)) {
            return true;
        }
        return false;
    }

    public function get_user_is_module_admin()
    {
        global $xoopsUser;
        if (is_object($xoopsUser)) {
            if ($xoopsUser->isAdmin($this->_module_mid)) {
                return true;
            }
        }
        return false;
    }

    public function is_login_user()
    {
        return $this->get_user_is_login();
    }

    public function is_module_admin()
    {
        return $this->get_user_is_module_admin();
    }

    //---------------------------------------------------------
    // timestamp
    //---------------------------------------------------------
    public function user_to_server_time($time, $default = 0)
    {
        if ($time <= 0) {
            return $default;
        }

        $timeoffset = $this->get_user_timeoffset() - $this->get_default_timezone();
        $timestamp  = $time - ($timeoffset * 3600);
        return $timestamp;
    }

    public function get_user_timeoffset()
    {
        global $xoopsUser;
        if ($xoopsUser) {
            $timeoffset = $xoopsUser->getVar('timezone_offset');
        } else {
            $timeoffset = $this->get_default_timezone();
        }
        return $timeoffset;
    }

    public function get_default_timezone()
    {
        global $xoopsConfig;
        return $xoopsConfig['default_TZ'];
    }

    //---------------------------------------------------------
    // utility
    //---------------------------------------------------------
    public function sanitize($str)
    {
        return htmlspecialchars($str, ENT_QUOTES);
    }

    // --- class end ---
}
