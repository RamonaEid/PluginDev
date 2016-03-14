<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function bomanite_get_accordion() {
    bomanite_get_accordion_html();
}
function bomanite_dynamic_content($content){
    $content = bomanite_get_accordion() . $content;
    return $content;
}

function bomanite_check_unsemantic() {
    global $wp_styles;
    $srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src') );
    if ( in_array('unsemantic-grid.min.css', $srcs) || in_array('unsemantic-grid.css', $srcs) ) {
        /* echo 'unsemantic-grid registered */
    } else {
        wp_enqueue_style( 'unsemantic-grid', plugins_url('css/unsemantic-grid.min.css', dirname(__FILE__) ) );
    }
}

function bomanite_jason_variables() {
    $bomanite_landingpage = get_option('bomanite_landingpage'); ?>
    <script>
        var bomanite = <?php echo json_encode( array( 
         'landingpage' => $bomanite_landingpage
       ) ); ?>;

    </script>
<?php
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
        'custom_dephead1',
        'custom_dephead1job',
        'custom_dephead1email',
        'custom_dephead2',
        'custom_dephead2job',
        'custom_dephead2email',
        'custom_dephead3',
        'custom_dephead3job',
        'custom_dephead3email',
        'custom_dephead4',
        'custom_dephead4job',
        'custom_dephead4email',
        'custom_dephead5',
        'custom_dephead5job',
        'custom_dephead5email',
        'custom_dephead6',
        'custom_dephead6job',
        'custom_dephead6email',
        'custom_dephead7',
        'custom_dephead7job',
        'custom_dephead7email',
        'custom_dephead8',
        'custom_dephead8job',
        'custom_dephead8email',
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
        'custom_aiaaccreditedshowroom',
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

?>