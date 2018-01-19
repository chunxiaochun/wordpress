<?php
/** ======================================================================================
 *  
 * video                                                                         video
 * 
 * ====================================================================================== */
 
/**
 * Template: video.php
 *
 * @package WP-HTML5
 * @subpackage Columns shortcode
 */

/**
 * lizatomic_video()
 * shortcode [video][/video]
 * 
 * @param mixed $atts
 * @param mixed $content
 */


// youtube
function lizatomic_youtube($atts, $content = null)
{  

    extract(shortcode_atts(array( 'width' => '',
	                              'height' => ''), $atts));
                                  
    return '<iframe title="YouTube video player" width="'. $width . '" height="'. $height . '" src="http://www.youtube.com/embed/' . do_shortcode($content) . '" frameborder="0" allowfullscreen></iframe>';
    
}
add_shortcode('youtube', 'lizatomic_youtube');

// vimeo
function lizatomic_vimeo($atts, $content = null)
{  

    extract(shortcode_atts(array( 'width' => '',
	                              'height' => ''), $atts));
                               
    return '<iframe width="'. $width . '" height="'. $height . '" src="http://player.vimeo.com/video/' . do_shortcode($content) . '" frameborder="0"></iframe>';
    
}
add_shortcode('vimeo', 'lizatomic_vimeo');




/* tinyMCE class */

/**
 * add_Lizatomic_scvideo_video
 *  
 * @access public
 */
class add_Lizatomic_scvideo_button
{

    var $plugin_name = "lizatomic_sc_video";

    function add_Lizatomic_scvideo_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_video'));
    }

    function add_sc_video()
    {
        // len uzivatel s pravom editovat clanky vidi video
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scvideo_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scvideo_button'), 5);
        }
    }
    
    function register_Lizatomic_scvideo_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scvideo_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'video/video.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scvideo_video()
$tinymce_button = new add_Lizatomic_scvideo_button();
?>