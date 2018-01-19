<?php
/** ======================================================================================
 *  
 * quotes                                                                         quotes
 * 
 * ====================================================================================== */
 
/**
 * Template: quotes.php
 *
 * @package WP-HTML5
 * @subpackage Buttons shortcode
 */

/**
 * lizatomic_quote()
 * shortcode [quote][/quote]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
	add_shortcode('quote', 'lizatomic_quote');
	
	function lizatomic_quote($atts, $content = null) {
		
		extract(shortcode_atts(array(		
			'type' => 'large',
			'align' => 'text-align-left'		
		), $atts));
	   
        $ltt_left_quote = "";
        $ltt_right_quote = ""; 
        
        if($type=='large') { $ltt_left_quote = '<span class="ltt-quotemark">&ldquo;</span>'; } 
        if($type=='medium') { $ltt_left_quote = '<span class="ltt-quotemark left">&ldquo;</span>'; }
        if($type=='medium') { $ltt_right_quote = '<span class="ltt-quotemark right">&rdquo;</span>'; }
		
		return '<span class="ltt-quote '.$type.' text-align-'.$align.'"> '.$ltt_left_quote.' '.do_shortcode($content).''.$ltt_right_quote.'</span>';
		
	}


/* tinyMCE class */

/**
 * add_Lizatomic_scquote_quote
 *  
 * @access public
 */
class add_Lizatomic_scquote_button
{

    var $plugin_name = "lizatomic_sc_quotes";

    function add_Lizatomic_scquote_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_quotes'));
    }

    function add_sc_quotes()
    {
        // len uzivatel s pravom editovat clanky vidi quote
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scquote_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scquote_button'), 5);
        }
    }
    
    function register_Lizatomic_scquote_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scquote_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'quotes/quotes.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scquote_quote()
$tinymce_button = new add_Lizatomic_scquote_button();
?>