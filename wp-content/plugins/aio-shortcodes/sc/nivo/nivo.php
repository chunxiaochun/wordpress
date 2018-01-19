<?php
/** ======================================================================================
 *  
 * nivo                                                                         nivo
 * 
 * ====================================================================================== */
 
/**
 * Template: nivo.php
 *
 * @package WP-HTML5
 * @subpackage Columns shortcode
 */

/**
 * lizatomic_nivo()
 * shortcode [nivo][/nivo]
 * 
 * @param mixed $atts
 * @param mixed $content
 */

// slider wrapper
function lizatomic_nivoslider($atts, $content = null)
{  
 global $nivo_w, $nivo_h;
 
    extract(shortcode_atts(array( 'width' => 500,
	                              'height' => 220,
               	                  'thumbnails' => 'no'), $atts));
    
    add_action('wp_footer', 'ltsc_nivo_insertjs');
                                  
    $nivo_w = $width; 
    $nivo_h = $height; 
    return '<div id="slider-wrapper"><div id="slider" class="nivoSlider">' . do_shortcode($content) . '</div></div>';
	
	//set_values_tofooter( $width, $height);	
	
}
add_shortcode('nivo_slider', 'lizatomic_nivoslider');


/**
 * ltsc_nivo_insertjs()
 * inserts nivo js
 *  
 */
	
	
	function ltsc_nivo_insertjs() {
	
    echo "	<script type='text/javascript'>
	$(window).load(function() {
	$('#slider').nivoSlider();
	});
	</script>";
		
	} 

// slides
function lizatomic_nivoslide($atts, $content = null)
{  
global $nivo_w, $nivo_h, $lizatomic_path;

    extract(shortcode_atts(array( 'title' => '',
	                              'url' => ''), $atts)); 

  if ( $content == 'ABSOLUTE_PATH_TO_THE_IMAGE_1' ) { 
	$content = $lizatomic_path . '/images/nivo/toystory.jpg';
	} else if ( $content == 'ABSOLUTE_PATH_TO_THE_IMAGE_2' ) { 
	$content = $lizatomic_path . '/images/nivo/up.jpg';
	} else if ( $content == 'ABSOLUTE_PATH_TO_THE_IMAGE_3' ) { 
	$content = $lizatomic_path . '/images/nivo/walle.jpg';
	}
	
	if( $url != '' ) { $urlopen = '<a href="' . $url . '">'; }
	if( $url != '' ) { $urlend = '</a>'; }
	
	//<img src="/scripts/timthumb.php?src=/images/whatever.jpg&h=150&w=150&zc=1" alt=""> 
    return $urlopen . '<img src="' . $lizatomic_path . 'timthumb.php?src=' . $content . '&h=' . $nivo_h . '&w=' . $nivo_w . '&zc=1' . '" title="' . $title . '" />' . $urlend;
}
add_shortcode('nivo_slide', 'lizatomic_nivoslide');

//nivo css
function nivo_css() {
global $nivo_w, $nivo_h;

	  echo '<style type="text/css">';			
	  echo '#slider { width:' . $nivo_w . 'px;' . ' height:' . $nivo_h . 'px; }';
	  echo '.nivo-controlNav { right: 10px; top: 10px; }';	
	  echo '</style>';
}

add_action('wp_footer', 'nivo_css');



/* tinyMCE class */

/**
 * add_Lizatomic_scnivo_nivo
 *  
 * @access public
 */
class add_Lizatomic_scnivo_button
{

    var $plugin_name = "lizatomic_sc_nivo";

    function add_Lizatomic_scnivo_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_nivo'));
    }

    function add_sc_nivo()
    {
        // len uzivatel s pravom editovat clanky vidi nivo
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scnivo_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scnivo_button'), 5);
        }
    }
    
    function register_Lizatomic_scnivo_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scnivo_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'nivo/nivo.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scnivo_nivo()
$tinymce_button = new add_Lizatomic_scnivo_button();
?>