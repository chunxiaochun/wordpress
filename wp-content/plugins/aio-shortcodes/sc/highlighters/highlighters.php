<?php
/** ======================================================================================
 *  
 * highlighters                                                                         highlighters
 * 
 * ====================================================================================== */
 
/**
 * Template: highlighters.php
 *
 * @package WP-HTML5
 * @subpackage Buttons shortcode
 */

/**
 * lizatomic_highlighter()
 * shortcode [highlighter][/highlighter]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
function lizatomic_highlighter($atts, $content = null)
{  
    extract(shortcode_atts(array('color' => 'blue'), $atts));
                                 
    return '<span class="highlighter ' . $color . '"">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlighter', 'lizatomic_highlighter');


/* tinyMCE class */

/**
 * add_Lizatomic_schighlighter_highlighter
 *  
 * @access public
 */
class add_Lizatomic_schighlighter_button
{

    var $plugin_name = "lizatomic_sc_highlighters";

    function add_Lizatomic_schighlighter_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_highlighters'));
    }

    function add_sc_highlighters()
    {
        // len uzivatel s pravom editovat clanky vidi highlighter
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_schighlighter_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_schighlighter_button'), 5);
        }
    }
    
    function register_Lizatomic_schighlighter_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_schighlighter_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'highlighters/highlighters.js';
        
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_schighlighter_highlighter()
$tinymce_button = new add_Lizatomic_schighlighter_button();
?>