<?php
add_action( 'tgmpa_register', 'riwa_register_required_plugins' );
function riwa_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Visual Composer
        array(
            'name'               => esc_html__('Visual Composer','riwa'), // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/plugins/js_composer.zip',
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
           // 'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        // Revolution Slider
        array(
            'name'               => esc_html__('Revolution Slider','riwa'),
            'slug'               => 'revslider',
            'source'             => get_template_directory() . '/plugins/revslider.zip',
            'required'           => true,
        ),
		//  Riwa Essentials
        array(
            'name'               => esc_html__('Riwa Essentials','riwa'),
            'slug'               => 'riwa-essentials',
            'source'             => esc_url('http://www.themesindustry.com/plugins/update-server/packages/riwa-essentials.zip','riwa'),
            'required'           => true, 
        ),
        // Plugins From WordPress respository.
        array(
            'name'      => esc_html__('Contact Form 7','riwa'),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('Advanced Custom Fields','riwa'),
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
		array(
            'name'      => esc_html__('Redux Framework','riwa'),
            'slug'      => 'redux-framework',
            'required'  => true,
        ),
		
		


    );

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
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                     // Message to output right before the plugins table.

    );
    tgmpa( $plugins, $config );
}