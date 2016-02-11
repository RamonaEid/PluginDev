<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function bomanite_jason_variables() {
    $bomanite_landingpage = get_option('bomanite_landingpage'); ?>
    <script>
        var bomanite = <?php echo json_encode( array( 
         'landingpage' => $bomanite_landingpage
       ) ); ?>

    </script>
<?php
}
?>