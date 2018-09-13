<?php
/**
 * The template for displaying the header
 */
 global $redux_ti; // Get theme options
?><!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { 
			if(!empty($redux_ti['favicon']['url'])) : $redux_favicon = $redux_ti['favicon']['url'];
	?>
    <link rel="icon" href="<?php echo esc_url($redux_favicon); ?>">
    <?php endif; } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="150">
<div class="dark-screen"></div>
<div class="wrapper" id="top">

<!-- LOADER -->
<?php 
	global $redux_ti;
	if(!empty($redux_ti['enable_preloader']) && $redux_ti['enable_preloader'] == "1") :
		do_action( 'riwa_preloader'); 
	endif;
?>
<!--LOADER Ends-->

<!--Header-->
<header id="main-navigation">

    <?php 
        // Topbar
        if(!empty($redux_ti['show_top_bar']) && $redux_ti['show_top_bar'] == "1") :
            do_action( 'riwa_topbar');
        endif;

        // Navigation
        if(!empty($redux_ti['nav_layout'])) :
            $riwa_header_layout = $redux_ti['nav_layout'];
        else :
            $riwa_header_layout = '01';
        endif;
        do_action( 'riwa_header', $riwa_header_layout);
    ?>

</header>
<?php 
	// Sidebar Menu
	do_action( 'riwa_side_panel');
	
	// Sub headers
	$riwa_selected_sub_header = '01';
	do_action( 'riwa_subheader', $riwa_selected_sub_header);
?>

<div class="container">