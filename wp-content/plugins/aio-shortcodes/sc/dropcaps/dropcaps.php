<?php
/** ======================================================================================
 *  
 * dropcapss                                                                         dropcapss
 * 
 * ====================================================================================== */
 
/**
 * Template: dropcaps.php
 *
 * @package WP-HTML5
 * @subpackage Columns shortcode
 */

/**
 * lizatomic_dropcaps()
 * shortcode [dropcaps][/dropcaps]
 * 
 * @param mixed $atts
 * @param mixed $content
 */

function lizatomic_dropcap($atts, $content = null) {
    
extract(shortcode_atts(array('color' => '',
                             'font' => '',
                             'style' => '',
                             'size' => ''), $atts));
                                 
    return '<span class="dropcap ' . $color . ' font-' .$font . ' font-' .$style . ' ' . $size . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'lizatomic_dropcap');

/* tinyMCE class */

/**
 * add_Lizatomic_scdropcaps_dropcaps
 *  
 * @access public
 */
class add_Lizatomic_scdropcaps_button
{

    var $plugin_name = "lizatomic_sc_dropcapss";

    function add_Lizatomic_scdropcaps_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_dropcapss'));
    }

    function add_sc_dropcapss()
    {
        // len uzivatel s pravom editovat clanky vidi dropcaps
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scdropcaps_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scdropcaps_button'), 5);
        }
    }
    
    function register_Lizatomic_scdropcaps_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scdropcaps_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'dropcaps/dropcaps.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scdropcaps_dropcaps()
$tinymce_button = new add_Lizatomic_scdropcaps_button();
?>