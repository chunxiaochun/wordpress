<?php
/** ======================================================================================
 *  
 * lists                                                                         lists
 * 
 * ====================================================================================== */

/**
 * Template: lists.php
 *
 * @package WP-HTML5
 * @subpackage Buttons shortcode
 */

/**
 * lizatomic_list()
 * shortcode [list][/list]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
function lizatomic_list($atts, $content = null)
{  
    extract(shortcode_atts(array('style' => ''), $atts));
    
    return '<ul class="custom '. $style .'" >' . do_shortcode($content) . '</ul>';
                                 
    //return '<span class="list ' . $state . '"">' . do_shortcode($content) . '</span>';
}
add_shortcode('list', 'lizatomic_list');


/* tinyMCE class */

/**
 * add_Lizatomic_sclist_list
 *  
 * @access public
 */
class add_Lizatomic_sclist_button
{

    var $plugin_name = "lizatomic_sc_lists";

    function add_Lizatomic_sclist_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_lists'));
    }

    function add_sc_lists()
    {
        // len uzivatel s pravom editovat clanky vidi list
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_sclist_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_sclist_button'), 5);
        }
    }
    
    function register_Lizatomic_sclist_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_sclist_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'lists/list.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_sclist_list()
$tinymce_button = new add_Lizatomic_sclist_button();
?>