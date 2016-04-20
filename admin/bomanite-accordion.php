<?php

/*GP Hooks > After Entry Title > Execute PHP > NOT ending ?> */


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function create_licensee_subhead_html($licenseesubhead) {
    $licenseesubheadhtml = 'Licensed in the following Bomanite<sup>&reg;</sup> Systems:<br />';
    $source = '';

    $licenseesubhead = explode(',', $licenseesubhead);

    foreach ( $licenseesubhead as $system ) {
        switch ($system){
            case 'EXPOSED AGGREGATE':
                $source = 'http://bomanite.com/system_parent/exposed-aggregate-systems/';
                break;
            case 'GRASSCRETE':
                $source = 'http://bomanite.com/system_parent/pervious-concrete-systems/';
                break;
            case 'IMPRINT':
                $source = 'http://bomanite.com/system_parent/imprint-system/';
                break;
            case 'POLISHING':
                $source = 'http://bomanite.com/system_parent/custom-polishing-systems/';
                break;
            case 'TOPPINGS':
                $source = 'http://bomanite.com/system_parent/toppings-system/';
                break;
        }

        $licenseesubheadhtml = $licenseesubheadhtml . '<a href="' . $source  . '" target="_blank">' . $system  . '</a> | ';
    }

    // Trim last ' | ' from the string
    $licenseesubheadhtml = substr($licenseesubheadhtml, 0, -3);

    return $licenseesubheadhtml;
}

function create_phone2_html( $phone2 ) {
    $phone2html = '';
    if($phone2 != 'na') {
        $phone2html = '<h3>Other Phone</h3><div class="normallink"><a href="tel:1-' . $phone2 . '"><i class="fa fa-phone"></i> ' . $phone2 . '</a></div>';
    }
    //else {
    //    $phone2html = '<div class="normallink"><a href="tel:1-' . $phone2 . '<i class="fa fa-phone"></i> ' . $phone2 . '</a></div>' ;
    //}
    return $phone2html;
}

function create_dep_head_html( $depheademail, $dephead, $depheadjob ) {
    $depheadhtml = '';
    if($depheademail){
        $curemail = '   <a href="mailto:' . $depheademail . '?cc=info@bomanite.com&subject=From%20Your%20Landing%20Page%20-%20I%20Need%20Info">' . $depheademail . '</a>';
    }
    else {
        $curemail = '';
    }
    $depheadhtml = '<p>' . '<span class="dephead">' . $dephead . ':</span><span class="depheadjob"> ' . $depheadjob . '</span> <span class="depheademail">' . $curemail . '</span></p>';
    return $depheadhtml;
}

function calculate_years_in_business_html( $numberstartyearofbuiness ) {
    if($numberstartyearofbuiness != 'na') {
        $numberofyearsinbusinesshtml = '';
        $curyear = date('Y');
        
        $yeardiff = $curyear - $numberstartyearofbuiness;
        if($yeardiff == 0){
            $numberofyearsinbusinesshtml = '1 year in business';
        }
        else {
            $numberofyearsinbusinesshtml = $yeardiff . ' years in business';
        }
    }
    else {
        $numberofyearsinbusinesshtml = $numberstartyearofbuiness;
    }
    
    
    return $numberofyearsinbusinesshtml;
}

function bomanite_get_accordion_html() {
    $bomanite_landingpage = (get_option('bomanite_landingpage') != '') ? get_option('bomanite_landingpage') : 'empty';
    global $post;
    if ( ($post->post_title) === $bomanite_landingpage )  : 

        $custom_fields = get_post_custom( $post->ID );
        $licenseesubhead = $custom_fields['custom_licenseesubhead'][0];
        $phone = $custom_fields['custom_phone'][0];
        $phone2 = $custom_fields['custom_phone2'][0];
        $fax = $custom_fields['custom_fax'][0];
        $email = $custom_fields['custom_email'][0];
        $website = $custom_fields['custom_website'][0];
        $mailingaddress = $custom_fields['custom_mailingaddress'][0];
        $shippingaddress = $custom_fields['custom_shippingaddress'][0];
        $qualification = $custom_fields['custom_qualification'][0];
        $dephead1 = $custom_fields['custom_dephead1'][0];
        $dephead1job = $custom_fields['custom_dephead1job'][0];
        $dephead1email = $custom_fields['custom_dephead1email'][0];
        $dephead2 = $custom_fields['custom_dephead2'][0];
        $dephead2job = $custom_fields['custom_dephead2job'][0];
        $dephead2email = $custom_fields['custom_dephead2email'][0];
        $dephead3 = $custom_fields['custom_dephead3'][0];
        $dephead3job = $custom_fields['custom_dephead3job'][0];
        $dephead3email = $custom_fields['custom_dephead3email'][0];
        $dephead4 = $custom_fields['custom_dephead4'][0];
        $dephead4job = $custom_fields['custom_dephead4job'][0];
        $dephead4email = $custom_fields['custom_dephead4email'][0];
        $dephead5 = $custom_fields['custom_dephead5'][0];
        $dephead5job = $custom_fields['custom_dephead5job'][0];
        $dephead5email = $custom_fields['custom_dephead5email'][0];
        $dephead6 = $custom_fields['custom_dephead6'][0];
        $dephead6job = $custom_fields['custom_dephead6job'][0];
        $dephead6email = $custom_fields['custom_dephead6email'][0];
        $dephead7 = $custom_fields['custom_dephead7'][0];
        $dephead7job = $custom_fields['custom_dephead7job'][0];
        $dephead7email = $custom_fields['custom_dephead7email'][0];
        $dephead8 = $custom_fields['custom_dephead8'][0];
        $dephead8job = $custom_fields['custom_dephead8job'][0];
        $dephead8email = $custom_fields['custom_dephead8email'][0];
        $services = $custom_fields['custom_services'][0];
        $bonding = $custom_fields['custom_bonding'][0];
        $samplepolicy = $custom_fields['custom_samplepolicy'][0];
        $freeestimates = $custom_fields['custom_freeestimates'][0];
        $continuingeducation = $custom_fields['custom_continuingeducation'][0];
        $geographicservicearea = $custom_fields['custom_geographicservicearea'][0];
        $numberstartyearofbusiness = $custom_fields['custom_numberstartyearofbusiness'][0];
        $bomanitelicensee = $custom_fields['custom_bomanitelicensee'][0];
        $numberofemployees = $custom_fields['custom_numberofemployees'][0];
        $keyemployeesandqualifications = $custom_fields['custom_keyemployeesandqualifications'][0];
        $onsiteshowroom = $custom_fields['custom_onsiteshowroom'][0];
        $aiaaccreditedshowroom = $custom_fields['custom_aiaaccreditedshowroom'][0];
        $samplesanddisplaysviewable = $custom_fields['custom_samplesanddisplaysviewable'][0];
        $showroomhours = $custom_fields['custom_showroomhours'][0];
        $otherinfo = $custom_fields['custom_otherinfo'][0];
        $showroomaddress = $custom_fields['custom_showroomaddress'][0];
        $unions = $custom_fields['custom_unions'][0];
        $contractorlicensenumbers = $custom_fields['custom_contractorlicensenumbers'][0];
        $bomanitelicenseesince = $custom_fields['custom_bomanitelicenseesince'][0];
        $leedaccredited = $custom_fields['custom_leedaccredited'][0];
        $minprojectsize = $custom_fields['custom_minprojectsize'][0];
        $typeofwork = $custom_fields['custom_typeofwork'][0];
?>
        <!--<p><?php echo '$bomanite_landingpage: ' . $bomanite_landingpage ?></p>-->
        <h3 class="licenseesubhead"><?php echo create_licensee_subhead_html($licenseesubhead); ?></h3>
        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-50">
                    <div id="bomanite_phone">
                        <h3>Phone</h3>
                        <div class="normallink"><a href="tel:1-<?php echo $phone ?>"><i class="fa fa-phone"></i> <?php echo $phone ?></a></div>
                        <?php echo create_phone2_html($phone2); ?>
                        <h3>Fax</h3>
                        <div><?php echo $fax ?></div>
                    </div>
                </div>

                <div class="grid-50">
                    <div id="bomanite_email">
                        <h3>Email</h3>
                        <div class="normallink"><a href="mailto:<?php echo $email ?>?cc=info@bomanite.com&subject=From%20Your%20Landing%20Page%20-%20I%20Need%20Info"><i class="fa fa-envelope-o"></i> <?php echo $email ?></a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-50">
                    <div id="bomanite_website">
                        <h3>Website</h3>
                        <div class="normallink"><a href="http://<?php echo $website ?>" target="_blank"><i class="fa fa-laptop"></i> <?php echo $website ?></a></div>
                    </div>
                </div>

                <div class="grid-50">
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
                <div class="grid-100">
                    <div id="bomanite_departmentheads">
                        <h3>Department Heads</h3>
                        <div class="normallink">
                            <?php 
                                if($dephead1) {
                                    echo create_dep_head_html( $dephead1email, $dephead1, $dephead1job );
                                }
                                if($dephead2) {
                                    echo create_dep_head_html( $dephead2email, $dephead2, $dephead2job );
                                }
                                if($dephead3) {
                                    echo create_dep_head_html( $dephead3email, $dephead3, $dephead3job );
                                }
                                if($dephead4) {
                                    echo create_dep_head_html( $dephead4email, $dephead4, $dephead4job );
                                }
                                if($dephead5) {
                                    echo create_dep_head_html( $dephead5email, $dephead5, $dephead5job );
                                }
                                if($dephead6) {
                                    echo create_dep_head_html( $dephead6email, $dephead6, $dephead6job );
                                }
                                if($dephead7) {
                                    echo create_dep_head_html( $dephead7email, $dephead7, $dephead7job );
                                }
                                if($dephead8) {
                                    echo create_dep_head_html( $dephead8email, $dephead8, $dephead8job );
                                }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="grid-100">
                    <div id="bomanite_qualification">
                        <h3>Company Qualification Statement</h3>
                        <div><?php echo $qualification ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-50">
                    <div id="bomanite_services">
                        <h3>List of Services</h3>
                        <div><?php echo $services ?></div>
                    </div>
                </div>

                <div class="grid-50">
                    <div id="bomanite_bonding">
                        <h3>Bonding Information</h3>
                        <div><?php echo $bonding ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-50">
                    <div id="bomanite_samplepolicy">
                        <h3>Sample Policy</h3>
                        <div><?php echo $samplepolicy ?></div>
                    </div>
                </div>

                <div class="grid-50">
                    <div id="bomanite_freeestimates">
                        <h3>Free Estimates</h3>
                        <div><?php echo $freeestimates ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-50">
                    <div id="bomanite_continuingeducation">
                        <h3>Continuing Education Presentations</h3>
                        <div><?php echo $continuingeducation ?></div>
                    </div>
                </div>

                <div class="grid-50">
                    <div id="bomanite_geographicservicearea">
                        <h3>Geographic Service Area</h3>
                        <div><?php echo $geographicservicearea ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-50">
                    <div id="bomanite_numberstartyearofbusiness">
                        <h3>Number of Years In Business</h3>
                        <div><?php echo calculate_years_in_business_html($numberstartyearofbusiness) ?></div>
                    </div>
                </div>

                <div class="grid-50">
                    <div id="bomanite_numberofemployees">
                        <h3>Number of Employees</h3>
                        <div><?php echo $numberofemployees ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-50">
                    <div id="bomanite_bomanitelicensee">
                        <h3>Bomanite Licensee</h3>
                        <div><?php echo $bomanitelicensee ?></div>
                    </div>
                </div>

                <div class="grid-50">
                    <div id="bomanite_keyemployeesandqualifications">
                        <h3>Key Employees and Qualifications</h3>
                        <div><?php echo $keyemployeesandqualifications ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-33">
                    <div id="bomanite_unions">
                        <h3>Union Affiliations</h3>
                        <div><?php echo $unions ?></div>
                    </div>
                </div>

                <div class="grid-33">
                    <div id="bomanite_contractorlicensenumbers">
                        <h3>Contractor License Number</h3>
                        <div><?php echo $contractorlicensenumbers ?></div>
                    </div>
                </div>

                <div class="grid-33">
                    <div id="bomanite_bomanitelicenseesince">
                        <h3>Bomanite Licensee since</h3>
                        <div><?php echo $bomanitelicenseesince ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-33">
                    <div id="bomanite_leedaccredited">
                        <h3>LEED accredited staff</h3>
                        <div><?php echo $leedaccredited ?></div>
                    </div>
                </div>

                <div class="grid-33">
                    <div id="bomanite_minprojectsize">
                        <h3>Minimum project size</h3>
                        <div><?php echo $minprojectsize ?></div>
                    </div>
                </div>

                <div class="grid-33">
                    <div id="bomanite_typeofwork">
                        <h3>Type of work installed</h3>
                        <div><?php echo $typeofwork ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="grid-100 grid-container grid-parent">
                <div class="grid-100">
                    <div id="bomanite_onsiteshowroom">
                        <h3>Design Center</h3>
                        <div><?php echo $onsiteshowroom ?></div>
                    </div>

                    <?php if ( $onsiteshowroom !== 'No' ) : ?>
                    <div id="bomanite_aiaaccreditedshowroom">
                        <h3>AIA CES Registered Design Center Tour</h3>
                        <div><?php echo $aiaaccreditedshowroom ?></div>
                    </div>

                    <div id="bomanite_samplesanddisplaysviewable">
                        <h3>Are samples and displays available for viewing?</h3>
                        <div><?php echo $samplesanddisplaysviewable ?></div>
                    </div>

                    <div id="bomanite_showroomhours">
                        <h3>Design Center Hours</h3>
                        <div><?php echo $showroomhours ?></div>
                    </div>

                    <div id="bomanite_otherinfo">
                        <h3>Other Info</h3>
                        <div><?php echo $otherinfo ?></div>
                    </div>

                    <div id="bomanite_showroomaddress">
                        <h3>Design Center Address</h3>
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