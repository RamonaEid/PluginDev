<?php
/*
Plugin Name: Bomanite Plugin by Ramona Eid
Plugin URI: http://www.checklistme.com/
Description: Necessary plugin for Bomanite functionality.  Do NOT deactivate or delete.
Version: 1.0.1
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

include_once( 'github-plugin-updater/updater.php' );

add_action( 'init', 'bomanite_init' );

function bomanite_init() {
    include( plugin_dir_path(__FILE__) . 'admin/bomanite-options.php');
    include( plugin_dir_path(__FILE__) . 'admin/bomanite-accordion.php' );
    //include( plugin_dir_path(__FILE__) . 'admin/bomanite-admin.php' );
    
    /*wp_register_script($id, $path, $dependencies, $version, $in_footer);*/
    wp_register_script('bomanite-full', plugins_url('js/bomanite_full.js', __FILE__), array('jquery'), '012916', true );

   add_action( 'wp_enqueue_scripts', 'bomanite_enqueue_scripts' );

    add_action( 'admin_footer-post.php', 'bomanite_custom_select_options' );

    add_action( 'admin_menu', 'bomanite_add_toolset_menu' );

    //add_action( 'wp_head', 'bomanite_jason_variables' );

    add_action ( 'bomanite_get_accordion', 'bomanite_get_accordion_html' );

    add_action( 'admin_enqueue_scripts', 'bomanite_enqueue_scripts' );
    add_action( 'login_enqueue_scripts', 'bomanite_enqueue_script' );
}

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


function bomanite_enqueue_scripts() {
    wp_enqueue_style( 'jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'bomanite-admin-style', plugins_url('css/bomanite_admin.css', __FILE__) );
    //wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer ); $handle(reuired) > all others optiuonal
    wp_enqueue_script( 'jquery-ui-accordion', array('jquery') );
    //wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
    wp_enqueue_script( 'bomanite-full', plugins_url('js/bomanite_full.js', __FILE__), array('jquery'), '012916', true );

    $options = get_option( 'bomanite_landingpage' );
    $scriptData = array(
        'landingpage' => $options,
    );
    wp_localize_script( 'bomanite-full', 'bomanite_options', $scriptData );

}


function bomanite_custom_select_options(){
    if ( ! isset ( $GLOBALS['post'] ) )
        return;

    $post_type = get_post_type( $GLOBALS['post'] );

    if ( ! post_type_supports( $post_type, 'custom-fields' ) )
        return;

    

?>
<script>
    var landingPageTitle = <?php echo '"' . get_option( 'bomanite_landingpage' ) . '"'; ?>;
    var customfields = [
        'custom_bonding',
        'custom_departmentheads',
        'custom_email',
        'custom_fax',
        'custom_licenseesubhead',
        'custom_mailingaddress',
        'custom_phone',
        'custom_qualification',
        'custom_services',
        'custom_shippingaddress',
        'custom_website',
        'custom_samplepolicy',
        'custom_freeestimates',
        'custom_continuingeducation',
        'custom_geographicservicearea',
        'custom_numberofyearsinbusiness',
        'custom_bomanitelicensee',
        'custom_numberofemployees',
        'custom_keyemployeesandqualifications',
        'custom_onsiteshowroom',
        'custom_ataaccreditedshowroom',
        'custom_samplesanddisplaysviewable',
        'custom_showroomhours',
        'custom_otherinfo',
        'custom_showroomaddress'
    ];
    jQuery.each(customfields, function (i) {
        if (jQuery("#title").val() != landingPageTitle) {
            jQuery("[value='" + customfields[i] + "']").remove();
        }
        else {
            // avoid duplication
            if (jQuery("[value='" + customfields[i] + "']").length < 1) {
                jQuery("#metakeyselect").append("<option value='" + customfields[i] + "'>" + customfields[i] + "</option>");
            }
                // add an asterisk to indicate complete
            else {
                jQuery("[value='" + customfields[i] + "']").text("***" + customfields[i]);
            }
        }
    });
    jQuery(document).ajaxComplete(function (e) {
        var completed = jQuery('#the-list td.left').children('input[type="text"]');
        var len = jQuery(completed).length - 1;
        
        //jQuery('#ajax-response').text("Number of completed selections is: " + jQuery(completed).length + ' len is: ' + len);
        
        var completedfield = jQuery(jQuery('#the-list td.left').children('input[type="text"]')[len]).val();

        jQuery("[value='" + completedfield + "']").text("***" + completedfield);
    });
</script>
<?php
}