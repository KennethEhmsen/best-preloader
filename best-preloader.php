<?php
/**
 * Plugin Name: Best Preloader
 * Plugin URI: http://mycyberuniverse.com/my_programs/wp-plugin-best-preloader.html
 * Description: Easily add cross browser animated preloader to your website. It will be responsive and compatible with all major browsers. It will work with any theme!
 * Author: Arthur "Berserkr" Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 1.1
 * License: GPL3
 * Text Domain: bestpreloader
 * Domain Path: /languages/
 *
 * Copyright 2015  Arthur "Berserkr" Gareginyan  (email : arthurgareginyan@gmail.com)
 *
 * This file is part of "Best Preloader".
 *
 * "Best Preloader" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "Best Preloader" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "Best Preloader".  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Prevent Direct Access
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Register text domain
 *
 * @since 0.1
 */
function bestpreloader_textdomain() {
	load_plugin_textdomain( 'bestpreloader', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'bestpreloader_textdomain' );

/**
 * Print direct link to Best Preloader admin page
 *
 * Fetches array of links generated by WP Plugin admin page ( Deactivate | Edit )
 * and inserts a link to the Best Preloader admin page
 *
 * @since  0.1
 * @param  array $links Array of links generated by WP in Plugin Admin page.
 * @return array        Array of links to be output on Plugin Admin page.
 */
function bestpreloader_settings_link( $links ) {
	$settings_page = '<a href="' . admin_url( 'options-general.php?page=best-preloader.php' ) .'">' . __( 'Settings', 'bestpreloader' ) . '</a>';
	array_unshift( $links, $settings_page );
	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'bestpreloader_settings_link' );

/**
 * Register "Preloader" submenu in "Settings" Admin Menu
 *
 * @since 0.1
 */
function bestpreloader_register_submenu_page() {
	add_options_page( __( 'Preloader', 'bestpreloader' ), __( 'Preloader', 'bestpreloader' ), 'manage_options', basename( __FILE__ ), 'bestpreloader_render_submenu_page' );
}
add_action( 'admin_menu', 'bestpreloader_register_submenu_page' );

/**
 * Attach Settings Page
 *
 * @since 0.1
 */
require_once( plugin_dir_path( __FILE__ ) . 'inc/settings_page.php' );

/**
 *  Enqueue scripts and style sheet for setting's page
 *
 * @since 1.0
 */
function bestpreloader_enqueue_scripts_admin($hook) {

    // Return if the page is not a settings page of this plugin
    if ( 'settings_page_best-preloader' != $hook ) {
        return;
    }

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script('color-picker', plugin_dir_url(__FILE__) . 'inc/js/color-picker.js', array('wp-color-picker'), false, true);
    wp_enqueue_style('style-admin', plugin_dir_url(__FILE__) . 'inc/style-admin.css');
}
add_action('admin_enqueue_scripts', 'bestpreloader_enqueue_scripts_admin');

/**
 *  Enqueue scripts and style sheet for front end of website
 *
 * @since 1.0
 */
function bestpreloader_enqueue_scripts_frontend() {

    // Read options from BD
    $options = get_option( 'bestpreloader_settings' );

    // Enqueue script and style sheet of preloader on front end
    if ( $options['enable_preloader'] == 'ON' ){
        if ( $options['display-preloader'] == '' || $options['display-preloader'] == 'Home Page Only' && is_home() || $options['display-preloader'] == 'Home Page Only' && is_front_page() ){
            wp_enqueue_script('preloader', plugin_dir_url(__FILE__) . 'inc/js/preloader.js', array('jquery'), false, true);
            wp_enqueue_style('style-preloader', plugin_dir_url(__FILE__) . 'inc/style-preloader.css');
        }
    }
}
add_action('wp_enqueue_scripts', 'bestpreloader_enqueue_scripts_frontend');

/**
 * Register settings
 *
 * @since 0.1
 */
function bestpreloader_register_settings() {
	register_setting( 'bestpreloader_settings_group', 'bestpreloader_settings' );
}
add_action( 'admin_init', 'bestpreloader_register_settings' );

/**
 * Generate the CSS of preloader from options and add it to head section of website
 *
 * @since 1.1
 */
function bestpreloader_css_options() {

    // Read options from BD and declare variables
    $options = get_option( 'bestpreloader_settings' );

    if (!empty($options['background-color'])) {
        $backgroun_color = $options['background-color'];
    } else {
        $backgroun_color = "#ffffff";
    }

    if (!empty($options['preloader-size'])) {
        $preloader_size = $options['preloader-size'];
    } else {
        $preloader_size = "100";
    }

    if (!empty($options['custom-image'])) {
        $image = $options['custom-image'];
    } else {
        $image = plugins_url( 'inc/images/preloader.gif', __FILE__ );
    }

    ?>
        <style type="text/css">
            #preloader-background {
                background-color: <?php echo $backgroun_color; ?>;
            }
            #preloader-status {
                background-image:url(<?php echo $image; ?>);
                -moz-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
                -o-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
                -webkit-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
            }
        </style>

        <noscript>
            <style type="text/css">
                #preloader,
                #preloader-background,
                #preloader-status {
                    display: none !important;
                }
            </style>
        </noscript>
    <?php
}
add_action('wp_head' , 'bestpreloader_css_options');

/**
 * Add DIV container with preloader to footer.
 *
 * @since 1.0
 */
function bestpreloader_add_container() {
    ?>
        <div id="preloader">
            <div id="preloader-background"></div>
            <div id="preloader-status"></div>
        </div>
    <?php
}
add_action('wp_footer', 'bestpreloader_add_container');

/**
 * Delete options on uninstall
 *
 * @since 0.1
 */
function bestpreloader_uninstall() {
    delete_option( 'bestpreloader_settings' );
}
register_uninstall_hook( __FILE__, 'bestpreloader_uninstall' );

/* That's all folks! */
?>