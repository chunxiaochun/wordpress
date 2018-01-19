<?php
/** ======================================================================================
 *  
 * box                                                                                 box
 * 
 * ====================================================================================== */
 
/**
 * Template: box.php
 *
 * @package WP-HTML5
 * @subpackage Content box shortcode
 */

/**
 * lizatomic_box()
 * shortcode [box][/box]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
function lizatomic_box($atts, $content = null)
{  
    extract(shortcode_atts(array('color' => 'blue',
                                 'icon' => 'accept'), $atts));
                                 
    return '<div class="ltt-contentbox ' . $color . '"><span class="icon ' . $icon . '"></span>' . do_shortcode($content) . '</div>';
}
add_shortcode('box', 'lizatomic_box');


/* tinyMCE class */

/**
 * add_Lizatomic_scbox_box
 *  
 * @access public
 */
class add_Lizatomic_scbox_button
{

    var $plugin_name = "lizatomic_sc_boxs";

    function add_Lizatomic_scbox_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_boxs'));
    }

    function add_sc_boxs()
    {
        // len uzivatel s pravom editovat clanky vidi box
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scbox_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scbox_button'), 5);
        }
    }
    
    function register_Lizatomic_scbox_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scbox_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'box/box.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scbox_box()
$tinymce_button = new add_Lizatomic_scbox_button();
?>