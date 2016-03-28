<?php

/*GP Hooks > After Entry Title > Execute PHP > NOT ending ?> */


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function bomanite_get_accordion_html() {
    $bomanite_landingpage = (get_option('bomanite_landingpage') != '') ? get_option('bomanite_landingpage') : 'empty';
    global $post;
    if ( ($post->post_title) === $bomanite_landingpage )  : 

        $custom_fields = get_post_custom( $post->ID );
        $licenseesubhead = $custom_fields['custom_licenseesubhead'][0];
        $phone = $custom_fields['custom_phone'][0];
        $fax = $custom_fields['custom_fax'][0];
        $email = $custom_fields['custom_email'][0];
        $website = $custom_fields['custom_website'][0];
        $mailingaddress = $custom_fields['custom_mailingaddress'][0];
        $shippingaddress = $custom_fields['custom_shippingaddress'][0];
        $qualification = $custom_fields['custom_qualification'][0];
        $departmentheads = $custom_fields['custom_departmentheads'][0];
        $services = $custom_fields['custom_services'][0];
        $bonding = $custom_fields['custom_bonding'][0];
        $samplepolicy = $custom_fields['custom_samplepolicy'][0];
        $freeestimates = $custom_fields['custom_freeestimates'][0];
        $continuingeducation = $custom_fields['custom_continuingeducation'][0];
        $geographicservicearea = $custom_fields['custom_geographicservicearea'][0];
        $numberofyearsinbusiness = $custom_fields['custom_numberofyearsinbusiness'][0];
        $bomanitelicensee = $custom_fields['custom_bomanitelicensee'][0];
        $numberofemployees = $custom_fields['custom_numberofemployees'][0];
        $keyemployeesandqualifications = $custom_fields['custom_keyemployeesandqualifications'][0];
        $onsiteshowroom = $custom_fields['custom_onsiteshowroom'][0];
        $ataaccreditedshowroom = $custom_fields['custom_ataaccreditedshowroom'][0];
        $samplesanddisplaysviewable = $custom_fields['custom_samplesanddisplaysviewable'][0];
        $showroomhours = $custom_fields['custom_showroomhours'][0];
        $otherinfo = $custom_fields['custom_otherinfo'][0];
        $showroomaddress = $custom_fields['custom_showroomaddress'][0];
?>
        <!--<p><?php echo '$bomanite_landingpage: ' . $bomanite_landingpage ?></p>-->
        <h3 class="licenseesubhead"><?php echo $licenseesubhead ?></h3>
        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-25">
                    <div id="bomanite_phone">
                        <h3>Phone</h3>
                        <div class="normallink"><a href="tel:1-<?php echo $phone ?>"><i class="fa fa-phone"></i><?php echo $phone ?></a></div>
                        <h3>Fax</h3>
                        <div><?php echo $fax ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_email">
                        <h3>Email</h3>
                        <div class="normallink"><a href="mailto:<?php echo $email ?>?cc=info@bomanite.com&subject=From%20Your%20Landing%20Page%20-%20I%20Need%20Info"><i class="fa fa-envelope-o"></i><?php echo $email ?></a></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_website">
                        <h3>Website</h3>
                        <div class="normallink"><a href="http://<?php echo $website ?>" target="_blank"><i class="fa fa-laptop"></i><?php echo $website ?></a></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_mailing">
                        <h3>Mailing Address</h3>
                        <div><?php echo $mailingaddress ?></div>
                        <h3>Shipping Address</h3>
                        <div><?php echo $shippingaddress ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-25">
                    <div id="bomanite_qualification">
                        <h3>Company Qualification Statement</h3>
                        <div><?php echo $qualification ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_departmentheads">
                        <h3>Department Heads</h3>
                        <div><?php echo $departmentheads ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_services">
                        <h3>List of Services</h3>
                        <div><?php echo $services ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_bonding">
                        <h3>Bonding Information</h3>
                        <div><?php echo $bonding ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-25">
                    <div id="bomanite_samplepolicy">
                        <h3>Sample Policy</h3>
                        <div><?php echo $samplepolicy ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_freeestimates">
                        <h3>Free Estimates</h3>
                        <div><?php echo $freeestimates ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_continuingeducation">
                        <h3>Continuing Education Unit Presentations</h3>
                        <div><?php echo $continuingeducation ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_geographicservicearea">
                        <h3>Geographic Service Area</h3>
                        <div><?php echo $geographicservicearea ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-25">
                    <div id="bomanite_numberofyearsinbusiness">
                        <h3>Number of Years In Business</h3>
                        <div><?php echo $numberofyearsinbusiness ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_numberofemployees">
                        <h3>Number of Employees</h3>
                        <div><?php echo $numberofemployees ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_bomanitelicensee">
                        <h3>Bomanite Licensee</h3>
                        <div><?php echo $bomanitelicensee ?></div>
                    </div>
                </div>

                <div class="grid-25">
                    <div id="bomanite_keyemployeesandqualifications">
                        <h3>Key Employees and Qualifications</h3>
                        <div><?php echo $keyemployeesandqualifications ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-100">
                    <div id="bomanite_onsiteshowroom">
                        <h3>Onsite Showroom</h3>
                        <div><?php echo $onsiteshowroom ?></div>
                    </div>

                    <?php if ( $onsiteshowroom !== 'No' ) : ?>
                    <div id="bomanite_ataaccreditedshowroom">
                        <h3>ATA accredited showroom</h3>
                        <div><?php echo $ataaccreditedshowroom ?></div>
                    </div>

                    <div id="bomanite_samplesanddisplaysviewable">
                        <h3>Are samples and displays available for viewing?</h3>
                        <div><?php echo $samplesanddisplaysviewable ?></div>
                    </div>

                    <div id="bomanite_showroomhours">
                        <h3>Showroom Hours</h3>
                        <div><?php echo $showroomhours ?></div>
                    </div>

                    <div id="bomanite_otherinfo">
                        <h3>Other Info</h3>
                        <div><?php echo $otherinfo ?></div>
                    </div>

                    <div id="bomanite_showroomaddress">
                        <h3>Showroom Address</h3>
                        <div><?php echo $showroomaddress ?></div>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>

    <?php endif; ?>

<?php 
    //var_dump($post->post_title);
    //var_dump($bomanite_landingpage);
    //var_dump(($post->post_title) === $bomanite_landingpage);
    //die('get_bomanite_accordion_html');
    //var_dump(get_post_custom($post->ID));
    //$custom_fields = get_post_custom($post->ID);
    //echo $custom_fields['custom_phone'][0];
    //foreach ( $custom_fields as $key => $value ) {
    //    echo $key . " => " .$value[0] . "<br />";
    //}

    //if ( isset( $_GET['test'] ) ) {
    //    $test = 'Test exists in QueryString';
    //}
    //else {
    //    $test = 'Can\'t find QueryString from here.';
    //}
    //echo $test;

    //$theme = wp_get_theme();
    //var_dump( $theme->name );
}
?>