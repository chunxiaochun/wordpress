<?php
/** ======================================================================================
 *  
 * googlemaps                                                                         googlemaps
 * 
 * ====================================================================================== */
 
/**
 * Template: googlemaps.php
 *
 * @package WP-HTML5
 * @subpackage Columns shortcode
 */

/**
 * lizatomic_googlemaps()
 * shortcode [googlemaps][/googlemaps]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
 
//google maps
function lizatomic_googlemaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
  
 return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe>';
 
 //<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/?ie=UTF8&amp;ll=48.221599,16.354802&amp;spn=0.010107,0.026715&amp;t=h&amp;z=16&amp;output=embed"></iframe>
}
add_shortcode("googlemap", "lizatomic_googlemaps");



/* tinyMCE class */

/**
 * add_Lizatomic_scgooglemaps_googlemaps
 *  
 * @access public
 */
class add_Lizatomic_scgooglemaps_button
{

    var $plugin_name = "lizatomic_sc_googlemaps";

    function add_Lizatomic_scgooglemaps_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_googlemaps'));
    }

    function add_sc_googlemaps()
    {
        // len uzivatel s pravom editovat clanky vidi googlemaps
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scgooglemaps_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scgooglemaps_button'), 5);
        }
    }
    
    function register_Lizatomic_scgooglemaps_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scgooglemaps_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'googlemaps/googlemaps.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scgooglemaps_googlemaps()
$tinymce_button = new add_Lizatomic_scgooglemaps_button();
?>