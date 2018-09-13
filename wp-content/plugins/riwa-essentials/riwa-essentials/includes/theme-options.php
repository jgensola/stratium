<?php

// Remove Demo Link
function redux_removeDemoModeLink() { 
	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
	}
	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
	}
}
add_action('init', 'redux_removeDemoModeLink');


// Theme Options
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = "redux_ti";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_title'           => esc_html__( 'Riwa Options', 'riwa' ),
        'customizer'           => true,
		'dev_mode'             => false,
		'update_notice'        => false,
    );

    Redux::setArgs( $opt_name, $args );

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General Settings', 'riwa' ),
        'id'     => 'general-settings',
        'desc'   => esc_html__( 'Basic field with no subsections.', 'riwa' ),
        'icon'   => 'el el-cogs',
        'fields' => array(
			array(
                'id'       => 'enable_preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'riwa' ),
                'subtitle' => esc_html__( 'Show loading icon', 'riwa' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
				array(
					'id'       => 'loader_text',
					'type'     => 'text',
					'required' => array( 'enable_preloader', '=', '1' ),
					'title'    => esc_html__( 'Loader Text', 'riwa' ),
					'subtitle' => esc_html__( 'Change word LOADING', 'riwa' ),
					'default'   => 'LOADING',
				),
				array(
					'id'       => 'loader_txt_color',
					'type'     => 'color',
					'required' => array( 'enable_preloader', '=', '1' ),
					'title'    => esc_html__( 'Loader Text Color', 'riwa' ),
					'subtitle' => esc_html__( 'Change to override default', 'riwa' ),
					'default'   => '#FFF',
					'output'    => array( 
						'color' => '.loading-text',
					),
				),
				array(
					'id'       => 'loader_color',
					'type'     => 'color',
					'required' => array( 'enable_preloader', '=', '1' ),
					'title'    => esc_html__( 'Loader Icon Color', 'riwa' ),
					'subtitle' => esc_html__( 'Change to override default', 'riwa' ),
					'default'   => '#e25011',
					'output'    => array( 
						'background-color' => '.cssload-thecube .cssload-cube:before',
					),
				),
				array(
					'id'       => 'loader_bg_color',
					'type'     => 'color',
					'required' => array( 'enable_preloader', '=', '1' ),
					'title'    => esc_html__( 'Loader Background Color', 'riwa' ),
					'subtitle' => esc_html__( 'Change to override default', 'riwa' ),
					'default'   => '#000',
					'output'    => array( 
						'background' => '.loader',
					),
				),
			array(
				'id'   => 'opt-divide-one',
				'type' => 'divide'
			),
		
			array(
                'id'       => 'show_top_bar',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Top Bar', 'riwa' ),
                'subtitle' => esc_html__( 'Show most top bar', 'riwa' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
				array(
					'id'       => 'topbar_left_text',
					'type'     => 'text',
					'required' => array( 'show_top_bar', '=', '1' ),
					'title'    => esc_html__( 'Left Side Text', 'riwa' ),
					'subtitle' => esc_html__( 'Change text to override default', 'riwa' ),
				),
				array(
					'id'       => 'topbar_right_text',
					'type'     => 'text',
					'required' => array( 'show_top_bar', '=', '1' ),
					'title'    => esc_html__( 'Right Side Text', 'riwa' ),
					'subtitle' => esc_html__( 'Change text to override default', 'riwa' ),
				),
				array(
					'id'       => 'nav_layout',
					'type'     => 'image_select',
					'title'    => __('Select Navigation', 'riwa'), 
					//'subtitle' => __('Select header layout', 'riwa'),
					'options'  => array(
						'01'      => array(
							'alt'   => 'Logo Left', 
							'img'   => get_template_directory_uri().'/images/settings/logo-nav.jpg'
						),
						'02'      => array(
							'alt'   => 'Centered Logo',
							'img'   => get_template_directory_uri().'/images/settings/centered-logo.jpg'
						),
                        '03'      => array(
							'alt'   => 'Logo left with right Mobile Nav',
							'img'   => get_template_directory_uri().'/images/settings/logo-mobile-nav.jpg'
						),

					),
					'default' => '1'
				),
		
			),
			
        )
    );
	
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Logo', 'riwa' ),
        'id'     => 'logo',
        'desc'   => esc_html__( 'Basic field with no subsections.', 'riwa' ),
        'icon'   => 'el el-cc',
        'fields' => array(
			array(
                'id'       => 'logo',
                'type'     => 'media',
                'url'      => false,
                'title'    => esc_html__( 'Logo', 'riwa' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default'  => array( 'url' => get_template_directory_uri().'/images/logo.png' ),
            ),
						array(
				'id'             => 'logo_size_header',
				'type'           => 'dimensions',
				'units'          => array('px','%'),    // Possible: px, em, %
				'units_extended' => 'false',  // select type of unit
				'title'          => esc_html__( 'Header Logo Size', 'riwa' ),
				'subtitle'  	 => esc_html__( 'Set width and height of logo in header', 'riwa' ),
				'desc'           => esc_html__( 'Leave blank to use default value that supported by each header style', 'riwa' ),
				'output'   		 => array( '.main_logo' ),
				'default'        => array()
			),
			array(
                'id'             => 'logo_spacing',
                'type'           => 'spacing', 
                'mode'           => 'padding',   // absolute, padding, margin
                'all'            => false,
                'units'          => array('px'),// You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',     // Allow users to select any type of unit
                //'display_units'=> 'false',   // Set to false to hide the units if the units are specified
				'output'    => array('padding' => '#main-navigation .navbar-brand'),
                'title'          => esc_html__( 'Logo Padding', 'riwa' ),
                'subtitle'       => esc_html__( 'Allow youto choose the spacing.', 'riwa' ),
                'desc'           => esc_html__( 'You can enable or disable any piece. Top, Right, Bottom, Left', 'riwa' ),
				'default'		 => array(), 
            ),
            
            array(
                'id'       => 'logo_sticky',
                'type'     => 'media',
                'url'      => false,
                'title'    => esc_html__( 'Sticky Logo', 'riwa' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.                
                'default'  => array( 'url' => get_template_directory_uri().'/images/logo_dark.png' ),
            ),
						array(
				'id'             => 'logo_size_header_sticky',
				'type'           => 'dimensions',
				'units'          => array('px','%'),    // Possible: px, em, %
				'units_extended' => 'false',  // select type of unit
				'title'          => esc_html__( 'Sticky Logo Size', 'riwa' ),
				'subtitle'  	 => esc_html__( 'Set width and height of logo in header', 'riwa' ),
				'desc'           => esc_html__( 'Leave blank to use default value that supported by each header style', 'riwa' ),
				'output'   		 => array( '.main_logo-sticky' ),
				'default'        => array()
			),
			array(
                'id'             => 'logo_spacing_sticky',
                'type'           => 'spacing', 
                'mode'           => 'padding',   // absolute, padding, margin
                'all'            => false,
                'units'          => array('px'),// You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',     // Allow users to select any type of unit
                //'display_units'=> 'false',   // Set to false to hide the units if the units are specified
				//'output'    => array('padding' => '#main-navigation .navbar-brand'),
                'title'          => esc_html__( 'Sticky Logo Padding', 'riwa' ),
                'subtitle'       => esc_html__( 'Allow youto choose the spacing.', 'riwa' ),
                'desc'           => esc_html__( 'You can enable or disable any piece. Top, Right, Bottom, Left', 'riwa' ),
				'default'		 => array(), 
            ),
            
			array(
                'id'       => 'favicon',
                'type'     => 'media',
                'url'      => false,
                'title'    => esc_html__( 'Favicon', 'riwa' ),
                'compiler' => 'true',
				'default'  => array( 'url' => get_template_directory_uri().'/images/favicon.png' ),
				'subtitle' => esc_html__( 'Only for WP v4.2 & before', 'riwa' ),
                'desc'     => esc_html__( 'For WP v4.3 & above add favicon from Customizer -> Site Identity -> Site Icon ', 'riwa' ),
            ),
		
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Sidebar', 'riwa' ),
        'id'     => 'sidebar',
        'desc'   => esc_html__( 'Mobile Menu Settings', 'riwa' ),
        'icon'   => 'el el-align-right',
        'fields' => array(
			array(
                'id'       => 'show_sidebar_logo',
                'type'     => 'switch',
                'title'    => esc_html__( 'Logo / Subtitle ', 'riwa' ),
                'subtitle' => esc_html__( 'Enabling will show sidebar logo', 'riwa' ),
                'desc' 	   => esc_html__( 'If logo is not specified, site title will be displayed', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
				array(
					'id'       => 'sidebar_logo',
					'type'     => 'media',
					'required' => array( 'show_sidebar_logo', '=', '1' ),
					'url'      => false,
					'title'    => esc_html__( 'Sidebar Logo', 'riwa' ),
					'compiler' => 'true',
					'subtitle' => esc_html__( 'Logo to be shown in the sidebar menu', 'riwa' ),
				),
			array(
                'id'       => 'sidbebar_on_desktop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable on Desktop', 'riwa' ),
                'subtitle' => esc_html__( 'Show sidebar menu on dekstop resolutions', 'riwa' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'sidbebar_social',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Links', 'riwa' ),
                'subtitle' => esc_html__( 'Enable social links in sidebar', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
				'id'       => 'sidebar_footer_txt',
				'type'     => 'text',
				'title'    => esc_html__( 'Footer Text', 'riwa' ),
				'subtitle' => esc_html__( 'Sidbar Footer Text', 'riwa' ),
				'default'  => esc_html__( 'Copyrights Your Site', 'riwa' ),
			),
		)
	));
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Subpage Headers', 'riwa' ),
        'id'     => 'subpage_headers',
        'desc'   => esc_html__( 'Subpage header images for blog etc.', 'riwa' ),
        'icon'   => 'el el-photo',
        'fields' => array(			
			array(
                'id'       => 'sub_header_image',
                'type'     => 'switch',
                'title'    => esc_html__( 'Subpage Header', 'riwa' ),
                'subtitle' => esc_html__( 'Show / hide Subpage Header', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'sub_header_style',
                'type'     => 'select',
				'required' => array( 'sub_header_image', '=', '1' ),
                'title'    => esc_html__( 'Select Header Style', 'riwa' ),
                'options'  => array(
                    'default' => 'Default',
                    'title_bread' => 'Title & Breadcrumb',
                ),
                'default'  => 'default'
            ),
			array(
                'id'       => 'default_subheader_img',
				'required' => array( 'sub_header_style', '=', 'default' ),
                'type'     => 'media',
                'url'      => false,
                'title'    => esc_html__( 'Default Subheader Image', 'riwa' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'subtitle' => esc_html__( 'Will show if no image is selected', 'riwa' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/page-header-1.jpg' ),
            ),
			array(
				'id'        => 'title_bar_color',
				'required' => array( 'sub_header_style', '=', 'title_bread' ),
				'type'      => 'color',
				'title'     => esc_html__('Title Bar Color', 'riwa'),
				'subtitle'  => esc_html__('Title & Breadcrumb Bar Color', 'riwa'),
				'default'   => '#f1c30f',
				'output'    => array(
					'background-color' => '#page_header_one',
				),
			),
			array(
				'id'        => 'title_bartxt_color',
				'required' => array( 'sub_header_style', '=', 'title_bread' ),
				'type'      => 'color',
				'title'     => esc_html__('Title Bar Text Color', 'riwa'),
				'subtitle'  => esc_html__('Title & Breadcrumb Text Color', 'riwa'),
				'default'   => '#111111',
				'output'    => array( 
					'color' => '#page_header_one .title, #page_header_one .page_link .breadcrumbs span',
				),
			),
			array(
                'id'       => 'breadcrumb_status',
				'required' => array( 'sub_header_style', '=', 'title_bread' ),
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Breadcrumb', 'riwa' ),
                'subtitle' => esc_html__( 'Show to enable breadcrumb', 'riwa' ),
                'default'  => '1'// 1 = on | 0 = off
            ),

            
        )
    ) );
	
	
	// TYPOGRAPHY
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'riwa' ),
        'id'     => 'typography',
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'custom_font_body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'riwa' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'riwa' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
				'output'      => array( 'body, p, .navbar-default .navbar-nav > li > a, .navbar-nav > li > .dropdown-menu li a, .riwa .esg-filterbutton, .wpcf7-form input[type=date], .wpcf7-form input[type=tel], .wpcf7-form input[type=text], .wpcf7-form input[type=email], .wpcf7-form textarea' ),
            ),
			
            array(
                'id'       => 'custom_font_h2',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading H2', 'riwa' ),
                'subtitle' => esc_html__( 'Specify the H3 properties.', 'riwa' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
				'output'      => array( 'h2' ),
            ),
			
			array(
                'id'       => 'custom_font_h3',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading H3', 'riwa' ),
                'subtitle' => esc_html__( 'Specify the H3 properties.', 'riwa' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
				'output'      => array( 'h3, .vc_tta-title-text, h3 a:hover, #news-slider .news_content .comment_text:hover h3, .specialist_info h3' ),
            ),
			array(
                'id'       => 'custom_font_h4',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading H4', 'riwa' ),
                'subtitle' => esc_html__( 'Specify the H4 properties.', 'riwa' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
				'output'      => array( 'h4' ),
            ),
			
			
			
			
        )
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Colors', 'riwa' ),
        'id'     => 'colors',
        'desc'   => esc_html__( 'Manage website colors.', 'riwa' ),
        'icon'   => 'el el-magic',
        'fields' => array(
			// MAIN COLORS
			array(
                'id'        => 'main_colors_start',
                'type'      => 'section',
                'title'     => esc_html__('Main Colors', 'riwa'),
                'indent'    => true,
            ),
                    array(
                        'id'        => 'main_site_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Main Color', 'riwa'),
                        'subtitle'  => esc_html__('Select Main site color', 'riwa'),
                        'default'   => '#f1c30f',
                        'output'    => array( 
							'background-color' => '#testinomial-slider .owl-controls .owl-page span:after, 
												   #testinomial-slider .owl-controls .owl-page.active span:after, 
												   .button3:hover, 
												   .button3:focus, 
												   #news-slider .news_content .date_comment span,
												   #comments .comment-reply-link:hover,
												   #commentform .submit:hover,
                                                   .service-box:hover,
                                                   .service-box hr,
                                                   .feature i,
                                                   .pricing-table:hover,
                                                   .skill-progress .progress .progress-bar,
                                                   #client-slider .item
												   ',
																
							'border-bottom' => '', 
							'color' => '.popular-food .dish, 
										.faq_wrapper .items > li > a:hover, 
										.faq_wrapper .items > li > a.expanded,
                                        .service-box-3:hover .icon,
                                        .pricing-table h4,
                                        .counters-item i,
                                        .work-filter li a:hover, 
                                        .work-filter li a.active
                                        
                                        ',
							'border-color' => '#news-slider .news_content .date_comment,
                                               .feature i,
                                               #service-2 .r-tabs-nav .r-tabs-state-active a,
                                               .work-filter li a:before, 
                                               .work-filter li a.active:before
                                               ',
						),
                    ),
                    array(
                        'id'        => 'secondary_site_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Secondary Color', 'riwa'),
                        'subtitle'  => esc_html__('Select secodary color', 'riwa'),
                        'default'   => '#f1c30f',
                        'output'    => array( 
							'background-color' => 'ul.welcome_list li:before, 
                                                   #specialist-slider .owl-prev:hover, 
                                                   #specialist-slider .owl-next:hover, 
                                                   #our-specialist .owl-prev:hover, 
                                                   #our-specialist .owl-next:hover, 
                                                   #news-slider .owl-prev:hover, 
                                                   #news-slider .owl-next:hover, 
                                                   footer .search-form button,
                                                   .page-links a span,
                                                   .counters-item:hover
                                                   ',
        
							'color' => '#page_header .page_title .page_link, 
                                        #testinomial-slider:before, 
                                        .widget-area ul.menu li a:hover, 
                                        a:hover, a:focus,
                                        .vertical-text,
                                        .heading-small-text,
                                        .service-box-3 h5
                                        ',
        
							'border-bottom-color' => '.heading', 
        
							'border-color' => '#specialist-slider .owl-prev:hover, 
                                               #specialist-slider .owl-next:hover, 
                                               #our-specialist .owl-prev:hover, 
                                               #our-specialist .owl-next:hover, 
                                               #news-slider .owl-prev:hover, 
                                               #news-slider .owl-next:hover, 
                                               ul.post-categories a:hover,
                                               .page-links a span,
                                               .blog_item blockquote
                                               ',
                            
						),
                    ),

					
            array(
                'id'        => 'main_colors_end',
                'type'      => 'section',
                'indent'    => false,
            ),
			// TOP BAR COLORS
			array(
                'id'        => 'topbar_colors_start',
                'type'      => 'section',
                'title'     => esc_html__('Top Bar Colors', 'riwa'),
                'indent'    => true,
            ),
                    array(
                        'id'        => 'topbar_bg_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Top Bar Background Color', 'riwa'),
                        'subtitle'  => esc_html__('Will replace top bar background color', 'riwa'),
                        'default'   => '#000',
                        'output'    => array( 
							'background-color' => '.topbar', 
						),
                    ),
                    array(
                        'id'        => 'topbar_txt_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Top Bar Text Color', 'riwa'),
                        'subtitle'  => esc_html__('Will replace top bar text color', 'riwa'),
                        'default'   => '#fff',
                        'output'    => array( 
							'color' => '.topbar, .topbar p, .topbar p a, .topbar p i', 
							
						),
                    ),
            array(
                'id'        => 'topbar_colors_end',
                'type'      => 'section',
                'indent'    => false,
            ), 
			// NAVIGATION COLORS
			array(
                'id'        => 'nav_colors_start',
                'type'      => 'section',
                'title'     => esc_html__('Navigation Colors', 'riwa'),
                'indent'    => true,
            ),
                    
					array(
                        'id'        => 'nav_txthover_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Navigation Mouse-over text Color', 'riwa'),
                        'subtitle'  => esc_html__('Will replace mouse-over text color', 'riwa'),
                        'default'   => '#f1c30f',
                        'output'    => array( 
							'color' => '.navbar-default .navbar-nav > li > a:hover, 
                                        .navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover, 
                                        ul.dropdown-menu li ul.dropdown-menu li a:hover
                                        ', 
                            
							'background-color' => '#main-navigation .navbar-nav > li > .dropdown-menu > li > a:hover,
                                        ul.dropdown-menu li ul.dropdown-menu li a:hover
                                        ',
							
						),
                    ),
					array(
                        'id'        => 'nav_txtselected_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Navigation Selected Color', 'riwa'),
                        'subtitle'  => esc_html__('Will replace Selected color', 'riwa'),
                        'default'   => '#f1c30f',
                        'output'    => array( 
							'background-color' => '.navbar-default .navbar-nav > li > .dropdown-menu > li.active a, 
                                                   ul.dropdown-menu li ul.dropdown-menu li.active a
                                                   ', 
							'border-color' => '.navbar-default .navbar-nav > li.active > a',
						),
                    ),
					
					
					
            array(
                'id'        => 'nav_colors_end',
                'type'      => 'section',
                'indent'    => false,
            ),     
			
			// Back TO TOP
			array(
                'id'        => 'backtotop_colors_start',
                'type'      => 'section',
                'title'     => esc_html__('Back to Top Colors', 'riwa'),
                'indent'    => true,
            ),
             	array(
					'id'       => 'show_backtotop',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back To Top Arrow', 'riwa' ),
					'subtitle' => esc_html__( 'Show or hide back to top arrow', 'riwa' ),
					'default'  => 1,
					'on'       => 'Enabled',
					'off'      => 'Disabled',
				),
			        array(
                        'id'        => 'backtotop_bg_color',
						'required'  => array( 'show_backtotop', '=', '1' ),
                        'type'      => 'color',
                        'title'     => esc_html__('Top Bar Background Color', 'riwa'),
                        'subtitle'  => esc_html__('Will replace top bar background color', 'riwa'),
                        'default'   => '#f1c30f',
                        'output'    => array( 
							'background-color' => '#back-top', 
						),
                    ),
                    array(
                        'id'        => 'backtotop_icon_color',
						'required'  => array( 'show_backtotop', '=', '1' ),
                        'type'      => 'color',
                        'title'     => esc_html__('Icon Color', 'riwa'),
                        'subtitle'  => esc_html__('Back to top icon color', 'riwa'),
                        'default'   => '#fff',
                        'output'    => array( 
							'color' => '#back-top.show', 
						),
                    ),
					array(
						'id'            => 'backtotop_icon_opacity',
						'required'      => array( 'show_backtotop', '=', '1' ),
						'type'          => 'slider',
						'title'         => esc_html__( 'Opacity', 'riwa' ),
						'subtitle'      => esc_html__( 'Change Back To Top icon opacity', 'riwa' ),
						'default'       => .8,
						'min'           => .1,
						'step'          => .1,
						'max'           => 1,
						'resolution'    => 0.1,
						//'display_value' => 'text',
						'output'    => array( 
							'opacity' => '#back-top.show'
						),
					),
					
            array(
                'id'        => 'backtotop_colors_end',
                'type'      => 'section',
                'indent'    => false,
            ), 
			// BUTTONS 
			array(
                'id'        => 'button_colors_start',
                'type'      => 'section',
                'title'     => esc_html__('Buttons Colors', 'riwa'),
                'indent'    => true,
            ),
                    array(
                        'id'        => 'buttons_bg_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Background', 'riwa'),
                        'subtitle'  => esc_html__('Change background color', 'riwa'),
                        'default'   => '#f1c30f',
                        'output'    => array( 
							'background-color' => '.btn-common, 
                                                   .search-form button, 
                                                   .wpcf7-form input[type=submit],
                                                   .post-password-form input[type=submit],
                                                    #service-2 #responsiveTabsDemo .button,
                                                    .pricing-table .button
                                                    ', 
						),
                    ),
                    array(
                        'id'        => 'buttons_bghover_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Backgound Mouse-Over ', 'riwa'),
                        'subtitle'  => esc_html__('Change background Mouse-over color', 'riwa'),
                        'default'   => '#1c1c1c',
                        'output'    => array( 
							'background-color' => '.btn-common:hover, 
                                                   .search-form button:hover, 
                                                   .wpcf7-form input[type=submit]:hover,
                                                   .post-password-form input[type=submit]:hover', 
						),
                    ),
					array(
                        'id'        => 'buttons_txt_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Normal Text', 'riwa'),
                        'subtitle'  => esc_html__('Change button text color', 'riwa'),
                        'default'   => '#fff',
                        'output'    => array( 
							'color' => '.btn-common, .search-form button, .wpcf7-form input[type=submit]', 
						),
                    ),
					array(
                        'id'        => 'buttons_txthover_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Mouse-Over Text', 'riwa'),
                        'subtitle'  => esc_html__('Change button  Mouserver text color', 'riwa'),
                        'default'   => '#fff',
                        'output'    => array( 
							'color' => '.btn-common:hover, .search-form button:hover, .wpcf7-form input[type=submit]:hover', 
						),
                    ),
					
            array(
                'id'        => 'button_colors_end',
                'type'      => 'section',
                'indent'    => false,
            ),
			
            
        )
    ) );
	

	// POST
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Posts', 'riwa' ),
        'id'         => 'post_settings',
        'desc'       => esc_html__( 'Post related settings', 'riwa' ),
        //'subsection' => true,
		'icon'   => 'el el-list-alt',
        'fields'     => array(
		
		// POST LISTING
		array(
			'id'        => 'topbar_postlisting_start',
			'type'      => 'section',
			'title'     => esc_html__('Post Listing Settings', 'riwa'),
			'indent'    => true,
		),
			array(
                'id'       => 'show_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_commenntcount',
                'type'     => 'switch',
                'title'    => esc_html__( 'Comment Count', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_authorname',
                'type'     => 'switch',
                'title'    => esc_html__( 'Author', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_posttags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_postedin',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			
		array(
			'id'        => 'topbar_postlisting_end',
			'type'      => 'section',
			'indent'    => false,
		),
		array(
			'id'        => 'topbar_singlepost_start',
			'type'      => 'section',
			'title'     => esc_html__('Single Post Settings', 'riwa'),
			'indent'    => true,
		),
			array(
                'id'       => 'show_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Author info', 'riwa' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_social',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Sharing Icons', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_categories',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			array(
                'id'       => 'show_pagination',
                'type'     => 'switch',
                'title'    => esc_html__( 'Next/Prev Post Links', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
		array(
			'id'        => 'topbar_singlepost_end',
			'type'      => 'section',
			'indent'    => false,
		),
            

        )
    ) );
	
	// PAGE
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'riwa' ),
        'id'         => 'page_settings',
        'desc'       => esc_html__( 'Page related settings', 'riwa' ),
        //'subsection' => true,
		'icon'   => 'el el-list-alt',
        'fields'     => array(
		
		// PAGE LISTING
		array(
			'id'        => 'page_settings_start',
			'type'      => 'section',
			'title'     => esc_html__('Page Settings', 'riwa'),
			'indent'    => true,
		),
			array(
                'id'       => 'show_page_title',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Title', 'riwa' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			
		array(
			'id'        => 'page_settings_end',
			'type'      => 'section',
			'indent'    => false,
		),
            

        )
    ) );
	
	// FOOTER
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer', 'riwa' ),
        'id'         => 'footer_settings',
        'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'riwa' ),
        //'subsection' => true,
		'icon'   => 'el el-website',
        'fields'     => array(
				array(
					'id'       => 'footer_bg',
					'type'     => 'switch',
					'title'    => esc_html__( 'Select Background Color', 'riwa' ),
					'subtitle' => esc_html__( 'Select between dark black or Site Color', 'riwa' ),
					'default'  => 0,
					'on'       => 'Change Color',
					'off'      => 'Default Color',
				),
				array(
					'id'       => 'footer_bg_color',
					'type'     => 'select',
					'required' => array( 'footer_bg', '=', '1' ),
					'title'    => esc_html__( 'Select Color', 'riwa' ),
					'options'  => array(
						'dark' => 'black',
						'bg_blue' => 'Site Color',
					),
					'default'  => 'dark'
            	),
				array(
					'id'       => 'show_widgets',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Widgets', 'riwa' ),
					'subtitle' => esc_html__( 'Show / Hide widgets area', 'riwa' ),
					'default'  => 1,
					'on'       => 'Show',
					'off'      => 'Hide',
				),
				array(
					'id'       => 'widget_cols',
					'type'     => 'button_set',
					'required' => array( 'show_widgets', '=', '1' ),
					'title'    => esc_html__( 'Widget Columns', 'riwa' ),
					'subtitle' => esc_html__( 'Select number of columns', 'riwa' ),
					'options'  => array(
						'1' => 'One Column',
						'2' => 'Two Columns',
						'3' => 'Three Columns',
						'4' => 'Four Columns'
					),
					'default'  => '4'
				),
				array(
					'id'       => 'show_copyright',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Copyright Area', 'riwa' ),
					'subtitle' => esc_html__( 'Show / Hide Copyright bar', 'riwa' ),
					'default'  => 0,
					'on'       => 'Show',
					'off'      => 'Hide',
				),
				array(
					'id'       => 'copyright_text',
					'type'     => 'text',
					'required' => array( 'show_copyright', '=', '1' ),
					'title'    => esc_html__( 'Copyright Text', 'riwa' ),
					'desc'     => esc_html__( 'For Example: &copy;2016 Riwa. All rights reserved.', 'riwa' ),
				  //'subtitle' => esc_html__( 'Example subtitle.', 'riwa' ),
				),
				array(
					'id'       => 'copyright_text',
					'type'     => 'text',
					'required' => array( 'show_copyright', '=', '1' ),
					'title'    => esc_html__( 'Copyright Text', 'riwa' ),
					'desc'     => esc_html__( 'For Example: &copy;2016 Riwa. All rights reserved.', 'riwa' ),
				  //'subtitle' => esc_html__( 'Example subtitle.', 'riwa' ),
				),
				array(
					'id'   => 'opt-divide',
					'type' => 'divide'
            	),
				array(
					'id'       => 'social_facebook',
					'type'     => 'text',
					'title'    => esc_html__( 'Facebook', 'riwa' ),
					'desc'     => esc_html__( 'Enter facebook profile link', 'riwa' ),
				),
				array(
					'id'       => 'social_twitter',
					'type'     => 'text',
					'title'    => esc_html__( 'Twitter', 'riwa' ),
					'desc'     => esc_html__( 'Enter twitter profile link', 'riwa' ),
				),
				array(
					'id'       => 'social_linkedin',
					'type'     => 'text',
					'title'    => esc_html__( 'Linkedin', 'riwa' ),
					'desc'     => esc_html__( 'Enter linkedin profile link', 'riwa' ),
				),
				array(
					'id'       => 'social_googleplus',
					'type'     => 'text',
					'title'    => esc_html__( 'Google Plus', 'riwa' ),
					'desc'     => esc_html__( 'Enter google plus profile link', 'riwa' ),
				),
				array(
					'id'       => 'social_instagram',
					'type'     => 'text',
					'title'    => esc_html__( 'Instagram', 'riwa' ),
					'desc'     => esc_html__( 'Enter instagram profile link', 'riwa' ),
				),
            

        )
    ) );