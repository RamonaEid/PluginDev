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

function create_licensee_finishes_html($licenseesubhead) {
    $finisheshtml = '';

    $divbegin = '<div id="finishes">';
    $divend = '</div>';

    $gridparentbegin = '<div class="grid-100 grid-container grid-parent finishes">';
    $gridparentend = '</div>';

    
    $finishesheader = '';
    $listhtml = '';
    $cols = '';
    
    $licenseesubhead = explode(',', $licenseesubhead);

    foreach ( $licenseesubhead as $system ) {
        switch ($system){
            case 'EXPOSED AGGREGATE':
                $finishesheader = create_finishesheader('Bomanite Exposed Aggregate Systems Finishes Offered');
                // List
                $listhtml = create_li_items( 'Bomanite Sandscape - uniformly exposed concrete sands and small aggregate colored concrete' );
                $listhtml .= create_li_items( 'Bomanite Alloy - lightly exposed broadcast or seeded aggregates in color hardened colored concrete, imbedding and fully adhering materials and concrete together, including glass or stone or other ceramic based materials' );
                $cols = create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Bomanite Antico - aged and pitted concrete finish achieved using Dry-Etch surface etching and retarding granules' );
                $listhtml .= create_li_items( 'Bomanite Sandscape Refined - lightly exposed color hardened colored concrete' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Bomanite Revealed - exposed aggregates including glass or stone or other ceramic based materials encapsulated in an colored engineered cementitious concrete mix applied to either fully cured concrete or concrete while in the plastic state' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                break;
            case 'GRASSCRETE':
                $finishesheader = create_finishesheader('Bomanite Pervious Concrete Systems Finishes Offered');
                // List
                $listhtml = create_li_items( 'Bomanite Grasscrete - void structured porous and permeable paving surfaces constructed using novel bio-degradable concrete forms with poured in place concrete resulting in structural drivable grass or stone surfaces - a plantable concrete pavement system' );
                // This one doesnt have columns, just ONE list
                $cols = create_ul_list( $listhtml );
                //$cols = create_finishescolumn( $listhtml );
                //$cols .= create_finishescolumn( $listhtml );
                //$cols .= create_finishescolumn( $listhtml );
                break;
            case 'IMPRINT':
                $finishesheader = create_finishesheader('Bomanite Imprint Systems Finishes Offered');
                // List
                $listhtml = create_li_items( 'Bomanite Bomacron - pattern and texture stamped colored concrete with a variety of textures cast from real stone, brick, tile, wood' );
                $listhtml .= create_li_items( 'Bomanite - original pattern stamped colored concrete' );
                $cols = create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Sealed and coated concrete - acrylic, silicone, siloxane, silane, polyurethane, Polyaspartic, fluorinated acrylic, lithium silicate in a variety of water based and solvent based carriers' );
                $listhtml .= create_li_items( 'Colored concrete - broom, swirl, float and trowel (smooth) finished ' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Bomanite Patene Artectura - acid stained, silicate stained, pigment dispersion stained and metal complex acid dyed concrete' );
                $listhtml .= create_li_items( 'Stenciled Concrete - patterned and colored concrete with surface applied troweled rubber graphics or paper stencils' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                break;
            case 'POLISHING':
                $finishesheader = create_finishesheader('Bomanite Custom Polishing Systems Finishes Offered');
                // List
                $listhtml = create_li_items( 'Bomanite Renaissance - ground and diamond-polished integrally colored concrete that utilizes penetrating lithium silicate treatment' );
                $listhtml .= create_li_items( 'Bomanite Patene Teres - ground and polished dyed concrete that utilizes penetrating lithium silicate treatment' );
                $cols = create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Bomanite VitraFlor - ground and polished un-colored concrete that utilizes penetrating lithium silicate treatment in variety of paste or cream polished through deep grind looks' );
                $listhtml .= create_li_items( 'Bomanite Belcolore - ground and polished color hardened colored concrete that utilizes penetrating lithium silicate treatment' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Bomanite Modena - hydraulic cement-based, self-leveling or trowel down aggregate containing topping based on rapid-hardening (rapid set) calcium sulfoaluminate (CSA) cement polished an treated with colloidal silica compounds' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                break;
            case 'TOPPINGS':
                $finishesheader = create_finishesheader('Bomanite Toppings Systems Finishes Offered');
                // List
                $listhtml = create_li_items( 'Bomanite Micro-Top - trowel applied cement based thin veneer type colored microtopping' );
                $listhtml .= create_li_items( 'Bomanite Thinset - trowel applied stampable concrete colored topping' );
                $listhtml .= create_li_items( 'Bomanite Micro-Top XT - exterior grade trowel or spray applied, splatter or knockdown cement based thin veneer type colored microtopping' );
                $cols = create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Self Leveling Toppings - hydraulic cement-based, self-leveling topping, resurfacer and underlayment based on rapid-hardening (rapid set) calcium sulfoaluminate (CSA) cement' );
                $listhtml .= create_li_items( 'Repair Mortars and Toppings - high-performance, fast-setting (rapid-set) or standard-setting, multi-purpose concrete repair and patching compounds' );
                $listhtml .= create_li_items( 'Bomanite Broadcast Aggregate and Broadcast Flake Flooring - high performance coatings based on epoxy, polyurethane and polyaspartic chemistry' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                $listhtml = create_li_items( 'Sealed and coated concrete - acrylic, silicone, siloxane, silane, polyurethane, Polyaspartic, fluorinated acrylic, lithium silicate in a variety of water based and solvent based carriers' );
                $listhtml .= create_li_items( 'Bomanite Patene Artectura - acid stained, silicate stained, pigment dispersion stained and metal complex acid dyed concrete' );
                $listhtml .= create_li_items( 'Bomanite Florspartic 100 - two-part polyaspartic aliphatic polyurea sealer/finish concrete coating clear or pigmented' );
                $cols .= create_finishescolumn( create_ul_list( $listhtml ) );
                break;
        }

        //$licenseesubheadhtml = $licenseesubheadhtml . $dividbegin . $divid . $finishesheader . $listhtml . $dividend;
        $finisheshtml = $finisheshtml . $gridparentbegin . $finishesheader . $cols . $gridparentend;

    }

    // Wrap whole thing in a DIV to be styled
    $finisheshtml = $divbegin . $finisheshtml . $divend;

    return $finisheshtml;
}
function create_finishesheader( $systemname ){
    $systemname = '<h3>' . $systemname . '</h3>';
    return $systemname;
}
function create_li_items( $listhtml ){
    $listhtml = '<li>' . $listhtml . '</li>';
    return $listhtml;
}
function create_ul_list ( $listhtml ){
    $listhtml = '<ul>' . $listhtml . '</ul>';
    return $listhtml;
}
function create_finishescolumn( $htmllist ){
    $htmllist = '<div class="grid-33">' . $htmllist . '</div>';
    return $htmllist;
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
        $curemail = '   <a href="mailto:' . $depheademail . '?cc=imagine@bomanite.com&subject=From%20Your%20Landing%20Page%20-%20I%20Need%20Info">' . $depheademail . '</a>';
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
        $licenseesubhead = !empty($custom_fields['custom_licenseesubhead']) ? $custom_fields['custom_licenseesubhead'][0] : '';
        $phone = !empty($custom_fields['custom_phone']) ? $custom_fields['custom_phone'][0] : '';
        $phone2 = !empty($custom_fields['custom_phone2']) ? $custom_fields['custom_phone2'][0] : '';
        $fax = !empty($custom_fields['custom_fax']) ? $custom_fields['custom_fax'][0] : '';
        $email = !empty($custom_fields['custom_email']) ? $custom_fields['custom_email'][0] : '';
        $website = !empty($custom_fields['custom_website']) ? $custom_fields['custom_website'][0] : '';
        $mailingaddress = !empty($custom_fields['custom_mailingaddress']) ? $custom_fields['custom_mailingaddress'][0] : '';
        $shippingaddress = !empty($custom_fields['custom_shippingaddress']) ? $custom_fields['custom_shippingaddress'][0] : '';
        $qualification = !empty($custom_fields['custom_qualification']) ? $custom_fields['custom_qualification'][0] : '';
        $dephead1 = !empty($custom_fields['custom_dephead1']) ? $custom_fields['custom_dephead1'][0] : '';
        $dephead1job = !empty($custom_fields['custom_dephead1job']) ? $custom_fields['custom_dephead1job'][0] : '';
        $dephead1email = !empty($custom_fields['custom_dephead1email']) ? $custom_fields['custom_dephead1email'][0] : '';
        $dephead2 = !empty($custom_fields['custom_dephead2']) ? $custom_fields['custom_dephead2'][0] : '';
        $dephead2job = !empty($custom_fields['custom_dephead2job']) ? $custom_fields['custom_dephead2job'][0] : '';
        $dephead2email = !empty($custom_fields['custom_dephead2email']) ? $custom_fields['custom_dephead2email'][0] : '';
        $dephead3 = !empty($custom_fields['custom_dephead3']) ? $custom_fields['custom_dephead3'][0] : '';
        $dephead3job = !empty($custom_fields['custom_dephead3job']) ? $custom_fields['custom_dephead3job'][0] : '';
        $dephead3email = !empty($custom_fields['custom_dephead3email']) ? $custom_fields['custom_dephead3email'][0] : '';
        $dephead4 = !empty($custom_fields['custom_dephead4']) ? $custom_fields['custom_dephead4'][0] : '';
        $dephead4job = !empty($custom_fields['custom_dephead4job']) ? $custom_fields['custom_dephead4job'][0] : '';
        $dephead4email = !empty($custom_fields['custom_dephead4email']) ? $custom_fields['custom_dephead4email'][0] : '';
        $dephead5 = !empty($custom_fields['custom_dephead5']) ? $custom_fields['custom_dephead5'][0] : '';
        $dephead5job = !empty($custom_fields['custom_dephead5job']) ? $custom_fields['custom_dephead5job'][0] : '';
        $dephead5email = !empty($custom_fields['custom_dephead5email']) ? $custom_fields['custom_dephead5email'][0] : '';
        $dephead6 = !empty($custom_fields['custom_dephead6']) ? $custom_fields['custom_dephead6'][0] : '';
        $dephead6job = !empty($custom_fields['custom_dephead6job']) ? $custom_fields['custom_dephead6job'][0] : '';
        $dephead6email = !empty($custom_fields['custom_dephead6email']) ? $custom_fields['custom_dephead6email'][0] : '';
        $dephead7 = !empty($custom_fields['custom_dephead7']) ? $custom_fields['custom_dephead7'][0] : '';
        $dephead7job = !empty($custom_fields['custom_dephead7job']) ? $custom_fields['custom_dephead7job'][0] : '';
        $dephead7email = !empty($custom_fields['custom_dephead7email']) ? $custom_fields['custom_dephead7email'][0] : '';
        $dephead8 = !empty($custom_fields['custom_dephead8']) ? $custom_fields['custom_dephead8'][0] : '';
        $dephead8job = !empty($custom_fields['custom_dephead8job']) ? $custom_fields['custom_dephead8job'][0] : '';
        $dephead8email = !empty($custom_fields['custom_dephead8email']) ? $custom_fields['custom_dephead8email'][0] : '';
        $services = !empty($custom_fields['custom_services']) ? $custom_fields['custom_services'][0] : '';
        $bonding = !empty($custom_fields['custom_bonding']) ? $custom_fields['custom_bonding'][0] : '';
        $samplepolicy = !empty($custom_fields['custom_samplepolicy']) ? $custom_fields['custom_samplepolicy'][0] : '';
        $freeestimates = !empty($custom_fields['custom_freeestimates']) ? $custom_fields['custom_freeestimates'][0] : '';
        $continuingeducation = !empty($custom_fields['custom_continuingeducation']) ? $custom_fields['custom_continuingeducation'][0] : '';
        $geographicservicearea = !empty($custom_fields['custom_geographicservicearea']) ? $custom_fields['custom_geographicservicearea'][0] : '';
        $numberstartyearofbusiness = !empty($custom_fields['custom_numberstartyearofbusiness']) ? $custom_fields['custom_numberstartyearofbusiness'][0] : '';
        $bomanitelicensee = !empty($custom_fields['custom_bomanitelicensee']) ? $custom_fields['custom_bomanitelicensee'][0] : '';
        $numberofemployees = !empty($custom_fields['custom_numberofemployees']) ? $custom_fields['custom_numberofemployees'][0] : '';
        $keyemployeesandqualifications = !empty($custom_fields['custom_keyemployeesandqualifications']) ? $custom_fields['custom_keyemployeesandqualifications'][0] : '';
        $onsiteshowroom = !empty($custom_fields['custom_onsiteshowroom']) ? $custom_fields['custom_onsiteshowroom'][0] : '';
        $aiaaccreditedshowroom = !empty($custom_fields['custom_aiaaccreditedshowroom']) ? $custom_fields['custom_aiaaccreditedshowroom'][0] : '';
        $samplesanddisplaysviewable = !empty($custom_fields['custom_samplesanddisplaysviewable']) ? $custom_fields['custom_samplesanddisplaysviewable'][0] : '';
        $showroomhours = !empty($custom_fields['custom_showroomhours']) ? $custom_fields['custom_showroomhours'][0] : '';
        $otherinfo = !empty($custom_fields['custom_otherinfo']) ? $custom_fields['custom_otherinfo'][0] : '';
        $showroomaddress = !empty($custom_fields['custom_showroomaddress']) ? $custom_fields['custom_showroomaddress'][0] : '';
        $unions = !empty($custom_fields['custom_unions']) ? $custom_fields['custom_unions'][0] : '';
        $contractorlicensenumbers = !empty($custom_fields['custom_contractorlicensenumbers']) ? $custom_fields['custom_contractorlicensenumbers'][0] : '';
        $bomanitelicenseesince = !empty($custom_fields['custom_bomanitelicenseesince']) ? $custom_fields['custom_bomanitelicenseesince'][0] : '';
        $leedaccredited = !empty($custom_fields['custom_leedaccredited']) ? $custom_fields['custom_leedaccredited'][0] : '';
        $minprojectsize = !empty($custom_fields['custom_minprojectsize']) ? $custom_fields['custom_minprojectsize'][0] : '';
        $typeofwork = !empty($custom_fields['custom_typeofwork']) ? $custom_fields['custom_typeofwork'][0] : '';
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
                        <div class="normallink"><a href="mailto:<?php echo $email ?>?cc=imagine@bomanite.com&subject=From%20Your%20Landing%20Page%20-%20I%20Need%20Info"><i class="fa fa-envelope-o"></i> <?php echo $email ?></a></div>
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

        <?php echo create_licensee_finishes_html($licenseesubhead); ?>

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