<?php
/** ======================================================================================
 *  
 * toggleboxs                                                                         toggleboxs
 * 
 * ====================================================================================== */
 
/**
 * Template: toggleboxs.php
 *
 * @package WP-HTML5
 * @subpackage Buttons shortcode
 */

/**
 * lizatomic_togglebox()
 * shortcode [togglebox][/togglebox]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
function lizatomic_togglebox($atts, $content = null)
{  
    extract(shortcode_atts(array('state' => 'open',
                                 'head' => 'Togglebox header'), $atts));
    
    return '<div class="ltt-toggler ' . $state . '"><h2 class="ltt-trigger"><a href="#">' . $head . '</a></h2>
            <div class="ltt-toggle-container">' . do_shortcode($content) . '</div>
            </div>';
                                 
    //return '<span class="togglebox ' . $state . '"">' . do_shortcode($content) . '</span>';
}
add_shortcode('togglebox', 'lizatomic_togglebox');


/* tinyMCE class */

/**
 * add_Lizatomic_sctogglebox_togglebox
 *  
 * @access public
 */
class add_Lizatomic_sctogglebox_button
{

    var $plugin_name = "lizatomic_sc_toggleboxs";

    function add_Lizatomic_sctogglebox_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_toggleboxs'));
    }

    function add_sc_toggleboxs()
    {
        // len uzivatel s pravom editovat clanky vidi togglebox
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_sctogglebox_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_sctogglebox_button'), 5);
        }
    }
    
    function register_Lizatomic_sctogglebox_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_sctogglebox_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'togglebox/togglebox.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_sctogglebox_togglebox()
$tinymce_button = new add_Lizatomic_sctogglebox_button();
?>