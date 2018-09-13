<?php

// Classes
require get_template_directory() . '/inc/classes/class-header.php'; 			// Header Class
require get_template_directory() . '/inc/classes/class-subheaders.php'; 		// Sub Header Class
require get_template_directory() . '/inc/classes/class-footer.php'; 			// Footer Class
require get_template_directory() . '/inc/classes/class-common.php'; 			// Common Features
require get_template_directory() . '/inc/classes/class-navwalker.php';			// Nav Walker
require get_template_directory() . '/inc/classes/class-sidebar-navwalker.php';	// Nav Walker

// Functions
require get_template_directory() . '/inc/plugin_activation.php';// Plugin Activation
require get_template_directory() . '/inc/plugins.php';			// Required Plugins
require get_template_directory() . '/inc/googlefont.php';		// Google fonts
require get_template_directory() . '/inc/misc.php';				// Misc functions
require get_template_directory() . '/inc/widgets.php';			// Widget areas
require get_template_directory() . '/inc/template_tags.php';	// Custom template tags
require get_template_directory() . '/inc/customizer.php'; 		// Customizer additions
require get_template_directory() . '/inc/enqueues.php';			// Include Css a& JS
require get_template_directory() . '/inc/breadcrumb.php';		// Breadcrumb
require get_template_directory() . '/inc/vt_resize.php';		// Image Resizer
require get_template_directory() . '/inc/social-sharing.php';		// Social sharing

// Meta Boxes
define( 'ACF_LITE' , true ); 