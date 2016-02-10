<?php
//Generated from: http://wpsettingsapi.jeroensormani.com/
add_action( 'admin_menu', 'bomanite_add_admin_menu' );
add_action( 'admin_init', 'bomanite_settings_init' );


function bomanite_add_admin_menu(  ) { 

	add_submenu_page( 'tools.php', 'Bomanite Plugin by Ramona Eid', 'Bomanite Plugin by Ramona Eid', 'manage_options', 'bomanite_plugin_by_ramona_eid', 'bomanite_plugin_by_ramona_eid_options_page' );

}


function bomanite_settings_init(  ) { 

	register_setting( 'pluginPage', 'bomanite_settings' );

	add_settings_section(
		'bomanite_pluginPage_section', 
		__( 'Your section description', 'wordpress' ), 
		'bomanite_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'bomanite_text_field_0', 
		__( 'Settings field description', 'wordpress' ), 
		'bomanite_text_field_0_render', 
		'pluginPage', 
		'bomanite_pluginPage_section' 
	);


}


function bomanite_text_field_0_render(  ) { 

	$options = get_option( 'bomanite_settings' );
?>
<input type='text' name='bomanite_settings[bomanite_text_field_0]' value='<?php echo $options['bomanite_text_field_0']; ?>'>
<?php

}


function bomanite_settings_section_callback(  ) { 

	echo __( 'This section description', 'wordpress' );

}


function bomanite_options_page(  ) { 

?>
<form action='options.php' method='post'>

    <h2>Bomanite Plugin by Ramona Eid</h2>

    <?php
    settings_fields( 'pluginPage' );
    do_settings_sections( 'pluginPage' );
    submit_button();
    ?>

</form>
<?php

}

?>