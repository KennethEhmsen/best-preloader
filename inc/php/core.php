<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Register text domain
 */
function spacexchimp_p007_textdomain() {
    load_plugin_textdomain( SPACEXCHIMP_P007_TEXT, false, SPACEXCHIMP_P007_DIR . '/languages/' );
}
add_action( 'init', 'spacexchimp_p007_textdomain' );

/**
 * Print direct link to plugin admin page
 *
 * Fetches array of links generated by WordPress Plugin admin page ( Deactivate | Edit )
 * and inserts a link to the plugin admin page
 */
function spacexchimp_p007_settings_link( $links ) {
    $page = '<a href="' . admin_url( 'options-general.php?page=' . SPACEXCHIMP_P007_SLUG ) . '">' . __( 'Settings', SPACEXCHIMP_P007_TEXT ) . '</a>';
    array_unshift( $links, $page );
    return $links;
}
add_filter( 'plugin_action_links_' . SPACEXCHIMP_P007_BASE, 'spacexchimp_p007_settings_link' );

/**
 * Print additional links to plugin meta row
 */
function spacexchimp_p007_plugin_row_meta( $links, $file ) {

    if ( strpos( $file, SPACEXCHIMP_P007_SLUG . '.php' ) !== false ) {

        $new_links = array(
                           'donate' => '<a href="https://www.spacexchimp.com/donate.html" target="_blank"><span class="dashicons dashicons-heart"></span> ' . __( 'Donate', SPACEXCHIMP_P007_TEXT ) . '</a>'
                           );
        $links = array_merge( $links, $new_links );
    }

    return $links;
}
add_filter( 'plugin_row_meta', 'spacexchimp_p007_plugin_row_meta', 10, 2 );

/**
 * Register a submenu item in the top-level menu item "Settings"
 */
function spacexchimp_p007_register_submenu_page() {

    $page_title  = SPACEXCHIMP_P007_NAME;
    $menu_title  = __( 'Preloader', SPACEXCHIMP_P007_TEXT );
    $capability  = 'manage_options';
    $menu_slug   = SPACEXCHIMP_P007_SLUG;
    $function    = 'spacexchimp_p007_render_submenu_page';

    add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
}
add_action( 'admin_menu', 'spacexchimp_p007_register_submenu_page' );

/**
 * Register settings
 */
function spacexchimp_p007_register_settings() {
    register_setting( SPACEXCHIMP_P007_SETTINGS . '_settings_group', SPACEXCHIMP_P007_SETTINGS . '_settings' );
    register_setting( SPACEXCHIMP_P007_SETTINGS . '_settings_group_si', SPACEXCHIMP_P007_SETTINGS . '_service_info' );
}
add_action( 'admin_init', 'spacexchimp_p007_register_settings' );

/**
 * Branded footer text on the plugin's settings page
 */
function spacexchimp_p007_admin_footer_text() {

    // Get current screen data
    $current_screen = get_current_screen();

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . SPACEXCHIMP_P007_SLUG;
    if ( $settings_page != $current_screen->id ) return;

    // Filter footer text
    function spacexchimp_p007_new_admin_footer_text() {
        $year = date('Y');
        return "Copyright &copy; " . $year . " <a href='https://www.spacexchimp.com' target='_blank'>Space X-Chimp</a> | Click <a href='https://www.spacexchimp.com/store.html' target='_blank'>here</a> to see our other products.";
    }
    add_filter( 'admin_footer_text', 'spacexchimp_p007_new_admin_footer_text', 11 );
}
add_action( 'current_screen', 'spacexchimp_p007_admin_footer_text' );

/**
 * Runs during the plugin activation
 */
function spacexchimp_p007_activation() {

    // Read the plugin service information from the database and put it into an array
    $info = get_option( SPACEXCHIMP_P007_SETTINGS . '_service_info' );

    // Make the "$info" array if the plugin service information in the database is not exist
    if ( ! is_array( $info ) ) $info = array();

    // Get the activation date of the plugin from the database
    $activation_date = !empty( $info['activation_date'] ) ? $info['activation_date'] : '';

    if ( $activation_date == '' ) {
        $info['activation_date'] = time();
        update_option( SPACEXCHIMP_P007_SETTINGS . '_service_info', $info );
    }
}
register_activation_hook( SPACEXCHIMP_P007_FILE, 'spacexchimp_p007_activation' );
