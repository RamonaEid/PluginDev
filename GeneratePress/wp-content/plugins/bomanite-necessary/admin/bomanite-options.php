<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function bomanite_add_toolset_menu() {
    // Settings Menu > append to bottom
    add_options_page(
        'Bomanite Toolset Options',         //string $page_title
        'Bomanite Toolset',                 //string $menu_title
        'manage_options',                   //string $capability
        'bomanite-toolset-menu',            //string $menu_slug
        'bomanite_toolset_options_page'     //callable $function
        );
}

function bomanite_toolset_options_page() {
    $bomanite_landingpage = (get_option('bomanite_landingpage') != '') ? get_option('bomanite_landingpage') : 'empty';
?>
    <div class="wrap">
        <h2>Bomanite Necessary Options</h2>
        <form action="options.php" method="post" name="options">
            <?php wp_nonce_field('update-options') ?>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="bomanite_landingpage">Landing Page Title (Copy/Paste)</label>
                        </th>
                        <td>
                            <input type="text" name="bomanite_landingpage" value="<?php echo $bomanite_landingpage ?> " class="regular-text ltr" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="bomanite_landingpage" />

            <p class="submit">
                <input type="submit" name="Submit" value="Update" />
            </p>
        </form>

    </div>

    <h2 class="bomanite-instructions">Instructions:</h2>
    <ol class="bomanite-instructions">
        <li>Create a Page with the <span class="bomanite-highlight">Title: EXACTLY</span> as above</li>
        <li>On the newly created page: Screen Options: check Custom Fields</li>
        <li>On the newly created page: create a Custom Field <span class="bomanite-highlight">(use UNDERSCORE to separate words)</span>: 
            <ol class="bomanite-lower-alpha">
                <li>Name: <span class="bomanite-highlight">custom_phone</span></li>
                <li>Value: <span class="bomanite-highlight">default</span></li>
            </ol>
        </li>
        <li>If you ever DELETE one of the DEFINED Custom Fields, you must EXIT the page and COME BACK <br />to see it AVAILABLE again in the Select drop-down list.</li>
            
            
    </ol>

<?php
}