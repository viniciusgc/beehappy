<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once OWLY_THEME_DIR . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'owly_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function owly_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'     				=> esc_html__('DesignThemes Core Features Plugin', 'owly'),
			'slug'     				=> 'designthemes-core-features',
			'source'   				=> OWLY_THEME_DIR . '/framework/plugins/designthemes-core-features.zip',
			'required' 				=> true,
			'version' 				=> '1.5',
		),

		array(
			'name'     				=> esc_html__('DesignThemes Portfolio Addon', 'owly'),
			'slug'     				=> 'designthemes-portfolio-addon',
			'source'   				=> OWLY_THEME_DIR . '/framework/plugins/designthemes-portfolio-addon.zip',
			'required' 				=> false,
			'version' 				=> '1.4',
		),

		array(
			'name' 					=> esc_html__('Contact Form 7', 'owly'),
			'slug' 					=> 'contact-form-7',
			'required' 				=> false,
		),

		array(
			'name' 					=> esc_html__('WooCommerce - excelling eCommerce', 'owly'),
			'slug' 					=> 'woocommerce',
			'required' 				=> false,
		),

		array(
			'name'     				=> esc_html__('Unyson', 'owly'),
			'slug'     				=> 'unyson',
			'required' 				=> true,
		),

		array(
			'name'     				=> esc_html__('Kirki Toolkit', 'owly'),
			'slug'     				=> 'kirki',
			'required' 				=> true,
		)
	);

	$args = array(
		'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . network_site_url(),
		'timeout'    => 30,
	);

	$response = wp_remote_get( 'http://wedesignthemes.com/plugins/designthemes/version-new.php', $args );
	$data = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( is_array( $data ) && ! empty( $data ) ) {
		$updated_plugin_list = array_merge( $data, $plugins );
	} else {
		$updated_plugin_list = $plugins;
	}

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'owly',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $updated_plugin_list, $config );
}?>