<?php
/** ======================================================================================
 *  
 * cols                                                                         cols
 * 
 * ====================================================================================== */
 
/**
 * Template: cols.php
 *
 * @package WP-HTML5
 * @subpackage Columns shortcode
 */

/**
 * lizatomic_col()
 * shortcode [col][/col]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
function lizatomic_one_half($atts, $content = null)
{  
    extract(shortcode_atts(array('last' => 'no'), $atts));
    
    return '<div class="one-half' . is_last($last) .  '">' . do_shortcode($content) . '</div>';
}
add_shortcode('one-half', 'lizatomic_one_half');


function lizatomic_one_third($atts, $content = null)
{  
    extract(shortcode_atts(array('last' => 'no'), $atts));
    
    return '<div class="one-third' . is_last($last) .  '">' . do_shortcode($content) . '</div>';
}
add_shortcode('one-third', 'lizatomic_one_third');


function lizatomic_two_thirds($atts, $content = null)
{  
    extract(shortcode_atts(array('last' => 'no'), $atts));
    
    return '<div class="two-thirds' . is_last($last) .  '">' . do_shortcode($content) . '</div>';
}
add_shortcode('two-thirds', 'lizatomic_two_thirds');


function lizatomic_one_fourth($atts, $content = null)
{  
    extract(shortcode_atts(array('last' => 'no'), $atts));
    
    return '<div class="one-fourth' . is_last($last) .  '">' . do_shortcode($content) . '</div>';
}
add_shortcode('one-fourth', 'lizatomic_one_fourth');

function lizatomic_three_fourths($atts, $content = null)
{  
    extract(shortcode_atts(array('last' => 'no'), $atts));
    
    return '<div class="three-fourths' . is_last($last) .  '">' . do_shortcode($content) . '</div>';
}
add_shortcode('three-fourths', 'lizatomic_three_fourths');


function is_last($last) {
    if($last == "yes") { $last = ' last'; } else { $last = ''; }
    return $last;
}


/* tinyMCE class */

/**
 * add_Lizatomic_sccol_col
 *  
 * @access public
 */
class add_Lizatomic_sccol_button
{

    var $plugin_name = "lizatomic_sc_cols";

    function add_Lizatomic_sccol_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_cols'));
    }

    function add_sc_cols()
    {
        // len uzivatel s pravom editovat clanky vidi col
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_sccol_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_sccol_button'), 5);
        }
    }
    
    function register_Lizatomic_sccol_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_sccol_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'cols/cols.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_sccol_col()
$tinymce_button = new add_Lizatomic_sccol_button();
?>