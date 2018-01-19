<?php
/*
Plugin Name: All-In-One Shortcodes
Plugin URI: http://lizatom.com
Description: Ultimate Wordpress shortcodes solution.
Version: 1.0.0
Author: Lizatom.com
Author URI: http://lizatom.com
License: GPL2
*/

/*  Copyright 2011  lizatom.com (tom@lizatom.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// some definition we will use
define( 'LTSC_PUGIN_NAME', 'All-In-One Shortcodes');
define( 'LTSC_PLUGIN_DIRECTORY', 'aio-shortcodes');
define( 'LTSC_CURRENT_VERSION', '1.0.0' );
// i18n plugin domain for language files
define( 'EMU2_I18N_DOMAIN', 'ltsc' ); // lizatom shortcodes

/* Custom CSS styles on WYSIWYG Editor – Start
======================================= */

if ( ! function_exists( 'myCustomTinyMCE' ) ) {

function myCustomTinyMCE($init) {
$init['theme_advanced_buttons3_add_before'] = 'styleselect'; // Adds the buttons at the begining. (theme_advanced_buttons2_add adds them at the end) Float Left=fleft,Float Right=fright,Clear=clear
$lizatomic_cssstyles = get_option('lizatomic_cssstyles');
if($lizatomic_cssstyles)
$init['theme_advanced_styles'] = $lizatomic_cssstyles;
add_filter( 'mce_css', 'tdav_css' );
return $init;
}
add_filter('tiny_mce_before_init', 'myCustomTinyMCE' );

}


// incluiding the Custom CSS on our theme.
function mycustomStyles(){
wp_enqueue_style( 'myCustomStyles', '', '','','all' ); /*adjust this path if you place “mycustomstyles.css” in a different folder than the theme's root.*/
}
add_action('init', 'mycustomStyles');
/* Custom CSS styles on WYSIWYG Editor – End
======================================= */ 


//protected 
 add_shortcode('protected','ltt_protected');
function ltt_protected($atts, $content = null){

	if ( is_user_logged_in() ) {
		//$content = ltt_delete_htmltags($content);	
		$content = do_shortcode($content);
		$output = $content;
	} else {
		$output = "<div id='ltt-protected'>
				<p class='ltt-registration'>You must be registered to see the content below.</p>
					<div class='ltt-protected-form'>
					<form action='" . get_option('home') . "/wp-login.php' method='post'>
						<p><label>Username:</label>
                        <input type='text' name='log' id='log' value='" . wp_specialchars(stripslashes($user_login), 1) . "' size='20' /></p>
						<p><label>Password:</label>
                        <input type='password' name='pwd' id='pwd' size='20' /></p>
						<input type='submit' name='submit' value='Login' id='ltt-login-button' />
					</form> 
					</div> <!-- .ltt-protected-form -->
				<p class='ltt-registration'>Not a member? <a href='".site_url('wp-login.php?action=register', 'login_post')."'>Register today!</a></p>
				</div> <!-- .ltt-protected -->";
	}
				
	return $output;
}

$lizatomic_path = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
$lizatomic_sc = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'sc/';


// js
add_action('wp_print_scripts', 'ltsc_insert_js');

function ltsc_insert_js() {
    
	global $lizatomic_path;
    
	if(!is_admin()) {               
		
		// jquery
		wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://code.jquery.com/jquery-latest.pack.js', '', '', false );
        wp_enqueue_script('jquery'); 
        // jcycle
		wp_enqueue_script('jquery=cycle',
            'http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.2.73.js', array('jquery'), '', false);
        // nivo
		wp_enqueue_script('ltsc_nivo', $lizatomic_path . '/js/jquery.nivo.slider.pack.js', array('jquery'), '', false);
        // custom
		wp_enqueue_script('ltsc_custom', $lizatomic_path . '/js/ltsc-custom.js', array('jquery'), '', true);        
		
	}
	
}

// css
add_action('wp_head', 'ltsc_insert_css');
	
function ltsc_insert_css() {
    
global $lizatomic_path;	

echo '<link rel="stylesheet" href="'.$lizatomic_path.'style.css" media="screen" />';
	
}
 
 
include ( 'sc/buttons/buttons.php' ); 
include ( 'sc/highlighters/highlighters.php' );
include ( 'sc/togglebox/togglebox.php');
include ( 'sc/cols/cols.php');
include ( 'sc/nivo/nivo.php');
include ( 'sc/tabs/tabs.php');
include ( 'sc/video/video.php');
include ( 'sc/box/box.php'); 
include ( 'sc/social/social.php'); 
include ( 'sc/dropcaps/dropcaps.php');
include ( 'sc/tooltips/tooltips.php');
include ( 'sc/quotes/quotes.php');
include ( 'sc/lists/list.php');
include ( 'sc/googlemaps/googlemaps.php');
include ( 'sc/googlecharts/googlecharts.php');

function lizatomic_refresh_mce($ver) {
		
	  $ver += 3;
	  return $ver;
	  
	}	
	
add_filter( 'tiny_mce_version', 'lizatomic_refresh_mce');

// load language files
function ltsc_set_lang_file() {
	# set the language file
	$currentLocale = get_locale();
	if(!empty($currentLocale)) {
		$moFile = dirname(__FILE__) . "/lang/" . $currentLocale . ".mo";
		if (@file_exists($moFile) && is_readable($moFile)) {
			load_textdomain(EMU2_I18N_DOMAIN, $moFile);
		}

	}
}
ltsc_set_lang_file();

// create custom plugin settings menu
add_action( 'admin_menu', 'ltsc_create_menu' );

//call register settings function
add_action( 'admin_init', 'ltsc_register_settings' );


register_activation_hook(__FILE__, 'ltsc_activate');
register_deactivation_hook(__FILE__, 'ltsc_deactivate');
register_uninstall_hook(__FILE__, 'ltsc_uninstall');

// activating the default values
function ltsc_activate() {
	add_option('ltsc_option_3', 'any_value');
}

// deactivating
function ltsc_deactivate() {
	// needed for proper deletion of every option
	delete_option('ltsc_option_3');
}

// uninstalling
function ltsc_uninstall() {
	# delete all data stored
	delete_option('ltsc_option_3');	
}

function ltsc_create_menu() {	
	// or create options menu page
	add_options_page(__('All-In-One Shortcodes', EMU2_I18N_DOMAIN), __("All-In-One Shortcodes", EMU2_I18N_DOMAIN), 9,  LTSC_PLUGIN_DIRECTORY.'/ltsc_settings_page.php');
}


function ltsc_register_settings() {
	//register settings
	register_setting( 'ltsc-settings-group', 'lizatomic_twitter' );
	register_setting( 'ltsc-settings-group', 'lizatomic_feedburner' );
	register_setting( 'ltsc-settings-group', 'lizatomic_cssstyles' );
}

?>