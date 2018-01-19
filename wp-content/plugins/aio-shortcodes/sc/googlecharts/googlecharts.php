<?php
/** ======================================================================================
 *  
 * googlecharts                                                                         googlecharts
 * 
 * ====================================================================================== */
 
/**
 * Template: googlecharts.php
 *
 * @package WP-HTML5
 * @subpackage Columns shortcode
 */

/**
 * lizatomic_googlecharts()
 * shortcode [googlecharts][/googlecharts]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
 
function lizatomic_googlechart( $atts ) {
	extract(shortcode_atts(array(
        'data' => '12.5,15,20,30',
        'type' => 's',
        'width' => '500',
        'height' => '300',
        'labels' => 'January|February|March|April',   
        'colors' => 'FF0000|33CCCC|FFCC00|99CC00',
	    'color1' => 'ffffff',
        'color2' => 'C0C0C0'        
	), $atts));
   
    return '<img src="http://chart.apis.google.com/chart?chd=t:'.$data.'&chf=bg,lg,45,'.$color1.',0,'.$color2.',1&chs='.$width.'x'.$height.'&cht='.$type.'&chco='.$colors.'&chdl='.$labels.'" />';
}
add_shortcode('googlechart', 'lizatomic_googlechart');



/* tinyMCE class */

/**
 * add_Lizatomic_scgooglecharts_googlecharts
 *  
 * @access public
 */
class add_Lizatomic_scgooglecharts_button
{

    var $plugin_name = "lizatomic_sc_googlecharts";

    function add_Lizatomic_scgooglecharts_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_googlecharts'));
    }

    function add_sc_googlecharts()
    {
        // len uzivatel s pravom editovat clanky vidi googlecharts
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scgooglecharts_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scgooglecharts_button'), 5);
        }
    }
    
    function register_Lizatomic_scgooglecharts_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scgooglecharts_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'googlecharts/googlecharts.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scgooglecharts_googlecharts()
$tinymce_button = new add_Lizatomic_scgooglecharts_button();
?>