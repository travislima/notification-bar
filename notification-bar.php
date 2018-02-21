<?php 
/*
Plugin Name:  Notification Bar
Plugin URI:   https://travislima.com
Description:  Creates a notifcation bar on your WordPress website.
Version:      1.0
Author:       travislima
Author URI:   https://travislima.com
License:      GPLv3.0+
Text Domain:  notification-bar
*/

// Creates a link to the settings page under the WordPress Settings in the WP Dashoboard.

function nb_general_settings_page() {

	add_submenu_page(
		'options-general.php',
		__( 'Notification Bar', 'notification-bar' ),
		__( 'Notifications', 'notification-bar' ),
		'manage_options',
		'nb_notification_bar',
		'nb_render_settings_page'

	);

}

add_action( 'admin_menu', 'nb_general_settings_page' );


// Creates the settings page
function nb_render_settings_page () {
	?>
	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<h2><?php _e( 'Notification Bar Settings', 'notification-bar' ); ?></h2>

		<form method="post" action="options.php">

			<?php
			//Get settings for the plugin to display in the form
			settings_fields( 'nb_general_settings' );
			do_settings_sections( 'nb_general_settings' );

			//Form submit button
			submit_button();
			?>

		</form>	

	</div>
	<!-- End of Wrap Div -->

<?php 	
}


//Creates settings page for the plugin

function nb_initialize_settings() {

	add_settings_section(
		'general_section',
		__( 'General Settings', 'notification-bar' ),
		'general_settings_callback',
		'nb_general_settings'
	);

	add_settings_field(
		'notification_text',
		__( 'Notification Text', 'notification-bar' ),
		'text_input_callback',
		'nb_general_settings',
		'general_section',

		array(
			'label_for' => 'notification_text',
			'option_group' => 'nb_general_settings',
			'option_id' => 'notification_text'
		)
	);

	add_settings_field(
		'display_location',
		__( 'Where will the notification bar display?', 'notification-bar' ),
		'radio_input_callback',
		'nb_general_settings',
		'general_section',
		
		array(
			'label_for' => 'display_location',
			'option_group' => 'nb_general_settings',
			'option_id' => 'display_location',
			'option_description' => 'Display notification bar on bottom of the site',
			'radio-options' => array(
				'display_none' => 'Do not display notification bar',
				'display_top' => 'Display notification bar on the top of the site',
				'diaply_bottom' => 'Display notification bar on the bottom of the site'
			)
		)
	);

	//register_settings(
	//	'nb_general_settings',      !!!!! Uncomment when closer to finishing the code tutorial.
	//	'nb_general_settings'
	//);
}

add_action( 'admin_init', 'nb_initialize_settings' );

























