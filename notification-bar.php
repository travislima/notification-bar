<?php 
/*
Plugin Name:  Notification Bar
Plugin URI:   https://travislima.com
Description:  BCreates a notifcation bar on your WordPress website.
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
