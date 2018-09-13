<?php
// Riwa only works in WordPress 4.4 or later 
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back_compat.php';
}

if ( ! function_exists( 'riwa_setup' ) ) :

function riwa_setup() {
    
    // Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'riwa', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	
	// Custom Image sizes
	add_image_size( 'riwa-listing', 360, 312, true );
	add_image_size( 'riwa-gallery-4col', 263, 228 ); // 4 Column
	add_image_size( 'riwa-gallery-3col', 364, 317 ); // 3 Column

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'riwa' ),
		'secondary'  => esc_html__( 'Footer Menu', 'riwa' ),
		'left-half'  => esc_html__( 'Left Half Menu', 'riwa' ),
		'right-half'  => esc_html__( 'Right Half Menu', 'riwa' ),
		'right-sidebar-menu'  => esc_html__( 'Right Sidebar Menu', 'riwa' ),
		//'left-sidebar-menu'  => esc_html__( 'Right Sidebar Menu', 'riwa' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// This theme styles the visual editor to resemble the theme style,
	add_editor_style( array( 'css/editor-style.css', riwa_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // riwa_setup
add_action( 'after_setup_theme', 'riwa_setup' );

	// Sets the content width in pixels, based on the theme's design and stylesheet.
 	// Priority 0 to make it available to lower priority callbacks.
function riwa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'riwa_content_width', 840 );
}
add_action( 'after_setup_theme', 'riwa_content_width', 0 ); 


// Adds custom classes to the array of body classes.
function riwa_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// If Admin Bar Acrive
	if ( is_admin_bar_showing() ) {
		$classes[] = 'admin-bar-active';
	}
    
    // If front page
	if ( is_front_page() ) {
		$classes[] = 'add-active';
	}
	
	// Push Menu
	$classes[] = 'pushmenu-push';
	
	return $classes;
}
add_filter( 'body_class', 'riwa_body_classes' );

// Add a pingback url auto-discovery header for singularly identifiable articles.
function ads_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ads_pingback_header' );

// Converts a HEX value to RGB.
function riwa_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

// Add custom image sizes attribute to enhance responsive image functionality
function riwa_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'riwa_content_image_sizes_attr', 10 , 2 );

// Add custom image sizes attribute to enhance responsive image functionality for post thumbnails
// @param array $attr Attributes for the image markup.
// @param int   $attachment Image attachment ID.
// @param array $size Registered image size or flat array of height and width dimensions.
// @return string A source size value for use in a post thumbnail 'sizes' attribute.
function riwa_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'riwa_post_thumbnail_sizes_attr', 10 , 3 );

// Modifies tag cloud widget arguments to have all tags in the widget same font size.
function riwa_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'riwa_widget_tag_cloud_args' );

// Custom Admin Column
function custom_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => esc_html__('Title','riwa'),
		'featured_image' => esc_html__('Image','riwa'),
        'comments' => '<span class="vers"><div title="'. esc_html__('Comments','riwa') .'" class="comment-grey-bubble"></div></span>',
        'date' => esc_html__('Date','riwa'),
     );
    return $columns;
}
add_filter('manage_posts_columns' , 'custom_columns');

function custom_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_image':
        echo the_post_thumbnail( array(50, 50) );
        break;
    }
}
add_action( 'manage_posts_custom_column' , 'custom_columns_data', 10, 2 );


// Add Logo to Redux Option Panel
add_action('redux/page/redux_ti/form/before', 'riwa_themeoptions_header');
function riwa_themeoptions_header() {
	echo '<div class="redux_custom_header">';
		global $redux_ti;
		if(!empty($redux_ti['logo']['url'])) : $redux_sitelogo = $redux_ti['logo']['url'];
            echo '<img src="'.esc_url($redux_sitelogo).'" alt="" class="img-responsive main_logo">';
        else : echo '<h1>'.bloginfo('name').'</h1>';
		endif;
	echo '</div>';
}