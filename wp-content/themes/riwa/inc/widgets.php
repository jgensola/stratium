<?php

// Registers a widget area.

function riwa_widgets_init() {	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'riwa' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'riwa' ),
		'before_widget' => '<div class="sidebar"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4><hr class="heading_space">',
	) ); 

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets - Column 1', 'riwa' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Appears at the bottom of the content on posts and pages.', 'riwa' ),
		'before_widget' => '<div class="col-md-12 col-sm-6 footer_column"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4><hr class="half_space">',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets - Column 2', 'riwa' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Appears at the bottom of the content on posts and pages.', 'riwa' ),
		'before_widget' => '<div class="col-md-12 col-sm-6 footer_column"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4><hr class="half_space">',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets - Column 3', 'riwa' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Appears at the bottom of the content on posts and pages.', 'riwa' ),
		'before_widget' => '<div class="col-md-12 col-sm-6 footer_column"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4><hr class="half_space">',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets - Column 4', 'riwa' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Appears at the bottom of the content on posts and pages.', 'riwa' ),
		'before_widget' => '<div class="col-md-12 col-sm-6 footer_column"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4><hr class="half_space">',
	) );

}
add_action( 'widgets_init', 'riwa_widgets_init' );