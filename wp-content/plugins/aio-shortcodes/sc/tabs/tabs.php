<?php
/** ======================================================================================
 *  
 * tabs                                                                         tabs
 * 
 * ====================================================================================== */
 
/**
 * Template: tabs.php
 *
 * @package WP-HTML5
 * @subpackage Tabs shortcode
 */

/**
 * lizatomic_tabs()
 * shortcode [tabs][/tabs]
 * 
 * @param mixed $atts
 * @param mixed $content
 */

// slider wrapper
function lizatomic_tabs($atts, $content = null)
{  
global $tabid,$headings;    
    extract(shortcode_atts(array( 'tabid' => 'tabID1',
	                              'type' => 'vertical',
                                  'effect' => 'fade',
               	                  'headings' => 'Tab1|Tab2|Tab3'), $atts));
    
    if ($type == 'vertical') {
     $output .= '<div class="ltt-slider-ver">
               <ul id="ltt-pager-'.$tabid.'" class="ltt-slider-ver-nav">';
    } else if ($type == 'horizontal') {
     $output .= '<div class="ltt-slider-hor">
               <ul id="ltt-pager-'.$tabid.'" class="ltt-slider-hor-nav">';
    }
    	
	$ltt_tabs = explode('|', $headings);
		$i=0;
	    //iterate through tabs headings 
		foreach($ltt_tabs as $ltt_tab) {
			
			$output .= '<li>';
            $output .= '<a id="'.$tabid.'-goto' . $i . '" class="tabvertnav" href="#">';
            $output .= '<span>';
            $output .= $ltt_tab;
            $output .= '</span>';
            $output .= '</a>';
            $output .= '</li>';
			$i++;
		}
    
    $output .= '</ul>'; 
    
    if ($type == 'vertical') {
    $output .= '<div id="' . $tabid . '" class="ltt-slider-ver-content">';
    } else if ($type == 'horizontal') {
    $output .= '<div class="clear"></div><div id="' . $tabid . '" class="ltt-slider-hor-content">';    
    }
    
    
    
    
    
    echo "\n" . '<script type="text/javascript">' . "\n";
    echo '<!--' . "\n";
    echo '$(function() {' . "\n";
    echo '$("#'.$tabid.'").cycle({ ' . "\n";
    echo '  auto: true,' . "\n";
    echo '  speed: 600,' . "\n";
    echo '  startingSlide: 0,' . "\n";
    echo '  pager:  "#ltt-pager-'.$tabid.'",' . "\n";
    echo '  fx: "'.$effect.'" ' . "\n";
    echo '}); ' . "\n";
    echo ' $("ul#ltt-pager-'.$tabid.' a").not(".tabvertnav").remove();' . "\n";
    
    $ltt_tabs = explode('|', $headings);
    $i=0;		
    //iterate through tabs headings 
    foreach($ltt_tabs as $ltt_tab) {
    
    
    echo '            $("#'.$tabid.'-goto' . $i . '").click(function() { ' . "\n";
    echo '				$("#' . $tabid . '").cycle(' . $i . ');    ' . "\n";
    echo '				return false; ' . "\n";
    echo '		    });' . "\n";
    $i++;
    }
    
    echo '			' . "\n";
    echo '		});' . "\n";
    echo '$(".ltt-slider-hor-content div").css("filter", "none")' . "\n";;
    echo '// -->' . "\n";
    echo '  </script>' . "\n";

    
    return $output . do_shortcode($content) . '</div><div class="clear"></div></div>';   	
	
}
add_shortcode('tabs', 'lizatomic_tabs');


global $tabid,$headings;
// slides
function lizatomic_tabs_slide($atts, $content = null)
{ 
    return '<div>'.do_shortcode($content).'<div class=""clear"></div></div>';
}
add_shortcode('tab', 'lizatomic_tabs_slide');




function add_tabs_js() { 
    
  add_action('wp_footer', 'tabs_js');  
    
}

//tabs js
function tabs_js() {
global $tabid,$headings;

echo "\n" . '<script type="text/javascript">' . "\n";
echo '$(function() {' . "\n";
echo '$("#'.$tabid.'").cycle({ ' . "\n";
echo '  auto: true,' . "\n";
echo '  speed: 300,' . "\n";
echo '  startingSlide: 0,' . "\n";
echo '  pager:  "#ltt-pager-'.$tabid.'",' . "\n";
echo '  fx: "fade" ' . "\n";
echo '}); ' . "\n";
echo ' $("ul#ltt-pager-'.$tabid.' a").not(".tabvertnav").remove();' . "\n";

$ltt_tabs = explode('|', $headings);
$i=0;		
//iterate through tabs headings 
foreach($ltt_tabs as $ltt_tab) {


echo '            $("#'.$tabid.'-goto' . $i . '").click(function() { ' . "\n";
echo '				$("#' . $tabid . '").cycle(' . $i . ');    ' . "\n";
echo '				return false; ' . "\n";
echo '		    });' . "\n";
$i++;
}

echo '			' . "\n";
echo '		});' . "\n";
echo '  </script>' . "\n";

}





/* tinyMCE class */

/**
 * add_Lizatomic_sctabs_tabs
 *  
 * @access public
 */
class add_Lizatomic_sctabs_button
{

    var $plugin_name = "lizatomic_sc_tabs";

    function add_Lizatomic_sctabs_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_tabs'));
    }

    function add_sc_tabs()
    {
        // len uzivatel s pravom editovat clanky vidi tabs
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_sctabs_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_sctabs_button'), 5);
        }
    }
    
    function register_Lizatomic_sctabs_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_sctabs_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'tabs/tabs.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_sctabs_tabs()
$tinymce_button = new add_Lizatomic_sctabs_button();
?>