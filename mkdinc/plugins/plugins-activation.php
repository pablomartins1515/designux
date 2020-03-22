<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'mkd_register_theme_included_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if(!function_exists('mkd_register_theme_included_plugins')) {

	/**
	 * Registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */

	function mkd_register_theme_included_plugins()	{

		$plugins = array(
			array(
                'name'               => esc_html__('Mikado Core', 'burst'),
                'slug'               => 'mikado-core',
                'source'             => get_template_directory().'/plugins/mikado-core.zip',
                'required'           => true,
                'version'            => '1.1',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => 'Mikado Twitter Feed',
                'slug'               => 'mikado-twitter-feed',
                'source'             => get_template_directory().'/plugins/mikado-twitter-feed.zip',
                'required'           => true,
                'version'            => '1.0',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ), 
			array(
				'name'					=>  esc_html__('WPBakery Visual Composer', 'burst'),
				'slug'					=> 'js_composer',
				'source'				=> get_template_directory() . '/plugins/js_composer.zip', // The plugin source
				'required'				=> true,
				'version'				=> '5.5.2',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),
			array(
				'name'     				=> esc_html__('LayerSlider WP', 'burst'),
				'slug'     				=> 'LayerSlider',
				'source'   				=> get_template_directory() . '/plugins/LayerSlider.zip',
				'required' 				=> true,
				'version'				=> '6.7.6',
				'version' 				=> '',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> ''
			),
			array(
				'name'         			=> esc_html__('Envato Market', 'burst'),
				'slug'         			=> 'envato-market', 
				'source'       			=> get_template_directory() . '/plugins/envato-market.zip', 
				'required'     			=> true,
				'version'				=> '2.0.0',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),
			array(
		        'name'         			=> esc_html__( 'WooCommerce', 'burst' ),
		        'slug'         			=> 'woocommerce',
		        'external_url' 			=> 'https://wordpress.org/plugins/woocommerce/',
		        'required'     			=> false
	        ),
	        array(
		        'name'         			=> esc_html__( 'Contact Form 7', 'burst' ),
		        'slug'         			=> 'contact-form-7',
		        'external_url' 			=> 'https://wordpress.org/plugins/contact-form-7/',
		        'required'     			=> false
	        )
		);


		$config = array(
			'domain'			=> 'burst',
			'default_path'		=> '',
			'parent_slug'		=> 'themes.php',
			'capability'		=> 'edit_theme_options',
			'menu'				=> 'install-required-plugins',
			'has_notices'		=> true,
			'is_automatic'		=> false,
			'message'			=> '',
			'strings'			=> array(
				'page_title'						=> esc_html__('Install Required Plugins', 'burst'),
				'menu_title'						=> esc_html__('Install Plugins', 'burst'),
				'installing'						=> esc_html__('Installing Plugin: %s', 'burst'),
				'oops'								=> esc_html__('Something went wrong with the plugin API.', 'burst'),
				'notice_can_install_required'		=> _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'burst'),
				'notice_can_install_recommended'	=> _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'burst'),
				'notice_cannot_install'				=> _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'burst'),
				'notice_can_activate_required'		=> _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'burst'),
				'notice_can_activate_recommended'	=> _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'burst'),
				'notice_cannot_activate'			=> _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'burst'),
				'notice_ask_to_update'				=> _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'burst'),
				'notice_cannot_update'				=> _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'burst'),
				'install_link'						=> _n_noop('Begin installing plugin', 'Begin installing plugins', 'burst'),
				'activate_link'						=> _n_noop('Activate installed plugin', 'Activate installed plugins', 'burst'),
				'return'							=> esc_html__('Return to Required Plugins Installer', 'burst'),
				'plugin_activated'					=> esc_html__('Plugin activated successfully.', 'burst'),
				'complete'							=> esc_html__('All plugins installed and activated successfully. %s', 'burst'),
				'nag_type'							=> 'updated'
			)
		);
		tgmpa($plugins, $config);
	}
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) vc_set_as_theme(true);

// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function requireVcExtend(){
		require_once locate_template('/extendvc/extend-vc.php');
	}
	add_action('after_setup_theme', 'requireVcExtend',2);
}
?>