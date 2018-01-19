<?php
/** ======================================================================================
 *  
 * buttons                                                                         buttons
 * 
 * ====================================================================================== */
 
/**
 * Template: buttons.php
 *
 * @package WP-HTML5
 * @subpackage Buttons shortcode
 */

/**
 * lizatomic_button()
 * shortcode [button][/button]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
function lizatomic_button($atts, $content = null)
{  
    extract(shortcode_atts(array('url' => '#', 
                                 'type' => 'rounded',  
                                 'size' => 'small',                        
                                 'color' => 'blue',
                                 'rel' => 'dofollow'), $atts));
                                 
    return '<a href="' . $url . '" class="button ' . $type . " " . $size . " " .  $color .
        '" rel="' . $rel . '"><span>' . do_shortcode($content) . '</span></a>';
}
add_shortcode('button', 'lizatomic_button');

/**
 * lizatomic_button_icon()
 * shortcode [button_icon][/button_icon]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
function lizatomic_button_icon($atts, $content = null)
{  
    extract(shortcode_atts(array('url' => '#',                      
                                 'color' => 'light',
                                 'rel' => 'dofollow',
                                 'icon' => 'accept'), $atts));
                                 
    return '<a href="' . $url . '" class="button icon ' . $color .
        '" rel="' . $rel . '"><span class="rightbtn">' . $content . '</span> <span class="ico ' . $icon . '"></span></a>';
}
add_shortcode('button_icon', 'lizatomic_button_icon');

/* tinyMCE class */

/**
 * add_Lizatomic_scbuttons_button
 *  
 * @access public
 */
class add_Lizatomic_scbuttons_button
{

    var $plugin_name = "lizatomic_sc_buttons";

    function add_Lizatomic_scbuttons_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_buttons'));
    }

    function add_sc_buttons()
    {
        // len uzivatel s pravom editovat clanky vidi button
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scbuttons_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scbuttons_button'), 5);
        }
    }
    
    function register_Lizatomic_scbuttons_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scbuttons_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'buttons/buttons.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scbuttons_button()
$tinymce_button = new add_Lizatomic_scbuttons_button();
?>