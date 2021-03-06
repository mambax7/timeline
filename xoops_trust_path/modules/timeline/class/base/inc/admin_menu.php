<?php
// $Id: admin_menu.php,v 1.1.1.1 2009/03/19 14:41:42 ohwada Exp $

//=========================================================
// timeline module
// 2009-03-15 K.OHWADA
//=========================================================

if (!defined('XOOPS_TRUST_PATH')) {
    die('not permit');
}

//=========================================================
// class timeline_base_inc_admin_menu
//=========================================================
class timeline_base_inc_admin_menu
{
    public $_prefix_mi;

    public $_DIRNAME;
    public $_PREFIX = 'ADMENU';

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct($dirname)
    {
        $this->_DIRNAME   = $dirname;
        $this->_prefix_mi = '_MI_' . $dirname . '_' . $this->_PREFIX . '_';
    }

    //---------------------------------------------------------
    // main
    //---------------------------------------------------------
    public function define_main_menu()
    {
        // dummy
    }

    public function define_sub_menu()
    {
        // dummy
    }

    public function build_main_menu()
    {
        return $this->build_menu_common($this->define_main_menu());
    }

    public function build_sub_menu()
    {
        return $this->build_menu_common($this->define_sub_menu());
    }

    public function build_menu_common($menu)
    {
        if (!is_array($menu) || !count($menu)) {
            return null;
        }

        $arr = array();
        foreach ($menu as $k => $v) {
            $title  = $this->get_lang_mi($v['title']);
            $link   = 'admin/index.php';
            $target = '';
            if (isset($v['fct']) && $v['fct']) {
                $link .= '?fct=' . $v['fct'];
            }
            if (isset($v['target']) && $v['target']) {
                $target = $v['target'];
            }
            $arr[$k] = array(
                'title'  => $title,
                'link'   => $link,
                'target' => $target,
            );
        }

        return $arr;
    }

    //---------------------------------------------------------
    // langauge
    //---------------------------------------------------------
    public function get_lang_mi($name)
    {
        $const_name = strtoupper($this->_prefix_mi . $name);
        if (defined($const_name)) {
            return constant($const_name);
        }
        return $const_name;
    }

    // --- class end ---
}
