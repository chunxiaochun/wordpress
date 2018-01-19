<?php
/*
Plugin Name: ixiezi WordPress plugin develop toolkit 
Plugin URI: http://dev.ixiezi.com (in Chinese)
Description: ixiezi is a toolkit package for WordPress plugin development, support both wordpress single user version and wordpress mu
Author: ixiezi(support@ixiezi.com)
Version: 0.2
Author URI: http://larry.ixiezi.com(in Chinese)

    Copyright 2007  Xiangqian Liu (email : support@ixiezi.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
class ixiezi {

    /**
     * Get the install directory of the plugin which calls this function, this 
     * function can be used to make your plugin work for both wordpress and wordpress 
     * mu, you can decide the include path by invoke
     * include('wp-content' . ixiezi::install_dir(__FILE__) . 'your_plugin_dir/xxx.php');
     * in your plugin file.
     * @return <type> String the plugin install directory
     */
    public static function install_dir($file) {
        if ( strpos(dirname($file), 'mu-plugins') ) {
            return 'mu-plugins';
        }
        return 'plugins';
    }

    /**
     * Return whether this is one WordPress mu instance or single version WordPress.
     * @return true if it's WordPress mu instance, otherwise return false.
     */
    public static function is_mu(){
        return function_exists('is_site_admin');
    }
}
function init_ixiezi_com_lib(){
    $ixiezi = new ixiezi();
}
add_action("init", "init_ixiezi_com_lib", -1000000);
?>
