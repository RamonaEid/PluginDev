<?php
/*
Plugin Name: Bomanite Plugin by Ramona Eid
Plugin URI: http://www.checklistme.com/
Description: Do NOT deactivate or delete.  Necessary plugin for Bomanite functionality.
Version: 1.4.23
Author: Ramona Eid
Author URI: http://www.checklistme.com/bio.html
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Test Domain: my-toolset

Bomanite Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Bomanite Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Bomanite Plugin. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'BOMANITE_VERSION', '1.4.23' );

add_action( 'init', 'bomanite_init' );

function bomanite_init() {
    include( plugin_dir_path(__FILE__) . 'admin/bomanite-options.php');
    include( plugin_dir_path(__FILE__) . 'admin/bomanite-accordion.php' );
    include( plugin_dir_path(__FILE__) . 'admin/bomanite-admin.php' );
    
    /*wp_register_script($id, $path, $dependencies, $version, $in_footer);*/
    wp_register_script('bomanite-full', plugins_url('js/bomanite_full.js', __FILE__), array('jquery'), BOMANITE_VERSION, true );
    wp_register_script( 'jquery-ui-accordion', '/wp-includes/js/jquery/ui/jquery.ui.accordion.min.js', array('jquery') );

    add_action( 'wp_enqueue_scripts', 'bomanite_enqueue_scripts' );
    add_action( 'wp_enqueue_scripts', 'bomanite_check_unsemantic', 99999 );

    add_action( 'the_content', 'bomanite_dynamic_content');

    add_action( 'admin_footer-post.php', 'bomanite_custom_select_options' );

    add_action( 'admin_menu', 'bomanite_add_toolset_menu' );

    add_action( 'admin_enqueue_scripts', 'bomanite_enqueue_scripts' );
    add_action( 'login_enqueue_scripts', 'bomanite_enqueue_scripts' );

    add_filter('upload_mimes', 'custom_upload_mimes');

    include_once( 'github-plugin-updater/updater.php' );

    define( 'WP_GITHUB_FORCE_UPDATE', true );

    if ( is_admin() ) {
        
        $config = array(
            'slug'                  => plugin_basename( __FILE__ ),
            'proper_folder_name'    => 'bomanite-necessary',
            'api_url'               => 'https://api.github.com/repos/RamonaEid/PluginDev',
            'raw_url'               => 'https://raw.github.com/RamonaEid/PluginDev/master',
            'github_url'            => 'https://github.com/RamonaEid/PluginDev',
            'zip_url'               => 'https://github.com/RamonaEid/PluginDev/zipball/master',
            'sslverify'             => true,
            'requires'              => '3.0',
            'tested'                => '3.3',
            'readme'                => 'README.md',
            'access_token'          => ''
        );
        
        new WP_GitHub_Updater( $config );
        
    }

}

function bomanite_enqueue_scripts() {
    wp_enqueue_style( 'jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'bomanite-accordion-style', plugins_url('css/bomanite_accordion.css', __FILE__), array(), BOMANITE_VERSION );
    wp_enqueue_style( 'bomanite-admin-style', plugins_url('css/bomanite_admin.css', __FILE__), array(), BOMANITE_VERSION );
    //https://developer.wordpress.org/reference/functions/wp_enqueue_script/
    //wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer ); $handle(reuired) > all others optiuonal
    wp_enqueue_script( 'jquery-ui-accordion', array('jquery') );
    //wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
    wp_enqueue_script( 'bomanite-full', plugins_url('js/bomanite_full.js', __FILE__), array('jquery'), BOMANITE_VERSION, true );

    global $post;
    $options = get_option( 'bomanite_landingpage' );
    if($post) {
        $page_title = $post -> post_title;
    } else {
        $page_title = "NULL";
    }
    $scriptData = array(
        'landingpage' => $options,
        'pagetitle' => $page_title,
    );
    wp_localize_script( 'bomanite-full', 'bomanite_options', $scriptData );

}
