<?php
// Enqueues scripts and styles.
function riwa_scripts() {
	
	// THEME CSS FILES
    wp_enqueue_style( 'riwa-style', get_stylesheet_uri() );
//	wp_enqueue_style( 'riwa-fonts', riwa_fonts_url(), array(), null );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' );
	wp_enqueue_style( 'bootstrap-datepicker', get_template_directory_uri() . '/css/bootstrap-datetimepicker.min.css', array(), '1.0' );
	wp_enqueue_style( 'riwa-icons', get_template_directory_uri() . '/css/riwa-icons.css', array(), '1.0' );
	wp_enqueue_style( 'font-awesome-min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'owl-carousel-min', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.3.3' );
	wp_enqueue_style( 'owl-carousel-default-min', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.3.3' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/fancybox.min.css', array(), '2.1.5' );
	wp_enqueue_style( 'zerogrid', get_template_directory_uri() . '/css/zerogrid.min.css', array(), '3.0' );
	wp_enqueue_style( 'owl-transitions', get_template_directory_uri() . '/css/owl.transitions.min.css', array(), '1.3.2' );
	wp_enqueue_style( 'riwa-sidepanel', get_template_directory_uri() . '/css/side-panel.min.css', array(), '1.0.0' );
	wp_enqueue_style( 'riwa-sidebar-menu', get_template_directory_uri() . '/css/sidebar-menu.min.css', array(), '1.0.0' );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.min.css', array(), '1.0.0' );
	wp_enqueue_style( 'riwa-css', get_template_directory_uri() . '/css/riwa.min.css', array(), '1.0' );

	// THEME JS FILES
	wp_enqueue_script( 'riwa-html5', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2' );
	wp_script_add_data( 'riwa-html5', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'riwa-html5', get_template_directory_uri() . '/js/respond.min.js', array(), '1.4.2' );
	wp_script_add_data( 'riwa-html5', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'riwa-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'riwa-html5', 'conditional', 'lt IE 9' );
	
    wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
	wp_enqueue_script( 'bootstrap-datepicker', get_template_directory_uri() . '/js/bootstrap-datetimepicker.min.js', array(), '3.3.6', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.3.3', true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array(), '2.1.11', true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), '2.1.5', true );
	wp_enqueue_script( 'fancybox-media', get_template_directory_uri() . '/js/jquery.fancybox-media.min.js', array(), '1.0.6', true );
	wp_enqueue_script( 'riwa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20160412', true );
	wp_enqueue_script( 'riwa-social-script', get_template_directory_uri() . '/js/social.js', array( 'jquery' ), FALSE, true );
	wp_enqueue_script( 'riwa-wow', get_template_directory_uri() . '/js/wow.min.js', array(), '0.1.9', true );
	wp_enqueue_script( 'riwa-countTo', get_template_directory_uri() . '/js/countTo.min.js', array('jquery'), '0.1', true );
	wp_enqueue_script( 'riwa-appear', get_template_directory_uri() . '/js/jquery.appear.min.js', array('jquery'), '0.1', true );
	wp_enqueue_script( 'riwa-sidepanel', get_template_directory_uri() . '/js/side-panel.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'riwa-dlmenumdr', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'riwa-dlmenu', get_template_directory_uri() . '/js/jquery.dlmenu.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'riwa-res-tab', get_template_directory_uri() . '/js/jquery.responsiveTabs.min.js', array('jquery'), '1.6.1', true );
	wp_enqueue_script( 'riwa-functions-theme', get_template_directory_uri() . '/js/functions.min.js', array('jquery'), '1.0', true );
	
	wp_localize_script( 'riwa-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'riwa' ),
		'collapse' => __( 'collapse child menu', 'riwa' ),
	) );
    
    global $redux_ti;
    wp_localize_script('jquery', 'riwa_params', array(
        'url_logo' =>  $redux_ti['logo']['url'],
        'url_logo_sticky' => $redux_ti['logo_sticky']['url'],
    ));
    
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'riwa-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'riwa_scripts' );

// LOAD ADMIN SIDE CSS & JS
function load_custom_wp_admin_style() {
	wp_register_style( 'admin_font_awesome_min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'admin_font_awesome_min' );
	wp_register_style( 'admin_styles', get_template_directory_uri() . '/css/admin_styles.css', false, '1.0.0' );
	wp_enqueue_style( 'admin_styles' );
	
	wp_register_script( 'vc_extend_js', get_template_directory_uri() . '/js/vc_extend.js', true, '1.0.0' );
	wp_enqueue_script( 'vc_extend_js' );			
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );