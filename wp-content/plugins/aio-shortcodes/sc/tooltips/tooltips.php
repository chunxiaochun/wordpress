<?php
/** ======================================================================================
 *  
 * tooltips                                                                         tooltips
 * 
 * ====================================================================================== */
 
/**
 * Template: tooltips.php
 *
 * @package WP-HTML5
 * @subpackage Buttons shortcode
 */

/**
 * lizatomic_tooltip()
 * shortcode [tooltip][/tooltip]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
	add_shortcode('tooltip', 'lizatomic_tooltip');
	
	function lizatomic_tooltip($atts, $content = null) {
		
		extract(shortcode_atts(array(		
			'text' => '',
			'color' => ''		
		), $atts));
	
		add_action('wp_footer', 'ltsc_tooltip_insertjs');
		return '<span class="ltt-tooltip '.$color.'"><span class="tooltip-content"><span class="tooltip-arr"></span>'.$text.'</span>'.do_shortcode($content).'</span>';
		
	}
    
/**
 * ltsc_tooltip_insertjs()
 * inserts tooltip js
 *  
 */
	
	
	function ltsc_tooltip_insertjs() {
	
    echo "<script type='text/javascript'>
		$(function() {		  
          $.fn.extend({ 	
		ltttooltip: function() {		
			var bubble = this;			
			this.hover(function() {				
				bubble.children('span').children('span').css({ display: 'block' });
				bubble.children('span').stop().css({ display: 'block', opacity: 0, bottom: '30px' }).animate({ opacity: 1, bottom: '40px' }, 200);				
			}, function() {				
				bubble.children('span').stop().animate({ opacity: 0, bottom: '50px' }, 200, function() {					
					jQuery(this).hide();					
				});				
			});			
		}
        });         
          
		    jQuery('.ltt-tooltip').each(function() {
					jQuery(this).ltttooltip();
				});
		});
  </script>";
		
	}    


/* tinyMCE class */

/**
 * add_Lizatomic_sctooltip_tooltip
 *  
 * @access public
 */
class add_Lizatomic_sctooltip_button
{

    var $plugin_name = "lizatomic_sc_tooltips";

    function add_Lizatomic_sctooltip_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_tooltips'));
    }

    function add_sc_tooltips()
    {
        // len uzivatel s pravom editovat clanky vidi tooltip
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_sctooltip_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_sctooltip_button'), 5);
        }
    }
    
    function register_Lizatomic_sctooltip_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_sctooltip_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'tooltips/tooltips.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_sctooltip_tooltip()
$tinymce_button = new add_Lizatomic_sctooltip_button();
?>