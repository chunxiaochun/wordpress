<?php
/** ======================================================================================
 *  
 * socials                                                                         socials
 * 
 * ====================================================================================== */
 
/**
 * Template: socials.php
 *
 * @package WP-HTML5
 * @subpackage Columns shortcode
 */

/**
 * lizatomic_social()
 * shortcode [social][/social]
 * 
 * @param mixed $atts
 * @param mixed $content
 */
add_shortcode('digg', 'lizatomic_digg');
function lizatomic_digg($atts, $content = null) {		
	$output = "<script type='text/javascript'>
(function() {
var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
s.type = 'text/javascript';
s.async = true;
s.src = 'http://widgets.digg.com/buttons.js';
s1.parentNode.insertBefore(s, s1);
})();
</script>
<!-- Medium Button -->
<a class='DiggThisButton DiggMedium'></a>";
	
	return $output;
}

add_shortcode('stumble','lizatomic_stumble');
function lizatomic_stumble($atts, $content = null){
	$output = "<script src='http://www.stumbleupon.com/hostedbadge.php?s=5'></script>";
	return $output;
}

add_shortcode('facebook','lizatomic_facebook');
function lizatomic_facebook($atts, $content = null){
	$output = "<a name='fb_share' type='button_count' href='http://www.facebook.com/sharer.php'>Share</a><script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>";
	return $output;
}

add_shortcode('buzz','lizatomic_buzz');
function lizatomic_buzz($atts, $content = null){
	$output = "<a title='Post to Google Buzz' class='google-buzz-button' href='http://www.google.com/buzz/post' data-button-style='normal-count'></a>
<script type='text/javascript' src='http://www.google.com/buzz/api/button.js'></script>";
	return $output;
}

add_shortcode('twitter','lizatomic_twitter');
function lizatomic_twitter($atts, $content = null){
$lizatomic_twitter = get_option('lizatomic_twitter');
if($lizatomic_twitter)
	$output = "<script type='text/javascript' src='http://twittercounter.com/embed/{$lizatomic_twitter}/ffffff/111111'></script>";
	return $output;
}

add_shortcode('feedburner','lizatomic_feedburner');
function lizatomic_feedburner($atts, $content = null){
$lizatomic_feedburner = get_option('lizatomic_feedburner');   
	extract(shortcode_atts(array(
		"name" => 'name'
	), $atts));
    if($lizatomic_feedburner)
	$output = "<a href='http://feeds.feedburner.com/{$lizatomic_feedburner}'><img src='http://feeds.feedburner.com/~fc/{$lizatomic_feedburner}?bg=99CCFF&amp;fg=444444&amp;anim=0' height='26' width='88' style='border:0' alt='' />
</a>";
	return $output;
}

add_shortcode('retweet','lizatomic_retweet');
function lizatomic_retweet($atts, $content = null){
	$output = "<a href='http://twitter.com/share' class='twitter-share-button' data-count='vertical'>Tweet</a><script type='text/javascript' src='http://platform.twitter.com/widgets.js'></script>";
	return $output;
}


/* tinyMCE class */

/**
 * add_Lizatomic_scsocial_social
 *  
 * @access public
 */
class add_Lizatomic_scsocial_button
{

    var $plugin_name = "lizatomic_sc_socials";

    function add_Lizatomic_scsocial_button()
    {        
        add_filter('tiny_mce_version', array(&$this, 'increase_tinymce_version'));        
        add_action('init', array(&$this, 'add_sc_socials'));
    }

    function add_sc_socials()
    {
        // len uzivatel s pravom editovat clanky vidi social
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
            return;
        // rich editor
        if (get_user_option('rich_editing') == 'true') {
            // pre wp2.5
            add_filter("mce_external_plugins", array(&$this, "add_Lizatomic_scsocial_plugin"), 5);
            add_filter('mce_buttons_3', array(&$this, 'register_Lizatomic_scsocial_button'), 5);
        }
    }
    
    function register_Lizatomic_scsocial_button($buttons)
    {
        array_push($buttons, "", $this->plugin_name);
        return $buttons;
    }

    function add_Lizatomic_scsocial_plugin($plugin_arr)
    {
        global $lizatomic_sc;
        $plugin_arr[$this->plugin_name] = $lizatomic_sc . 'social/social.js';
        return $plugin_arr;
    }
    
    function increase_tinymce_version($version)
    {
        return ++$version;
    }
}

//vytvor instanciu add_Lizatomic_scsocial_social()
$tinymce_button = new add_Lizatomic_scsocial_button();
?>