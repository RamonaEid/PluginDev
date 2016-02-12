<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function bomanite_get_accordion() {
    bomanite_get_accordion_html();
}
function bomanite_dynamic_content($content){
    $content = bomanite_get_accordion() . $content;
    return $content;
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

?>