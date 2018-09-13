<?php

/* Portfolio  */
if ( ! function_exists( '_portfolio' ) ) {
    add_action('init', '_portfolio');
    function _portfolio() {
        $args = array(
            'label' => esc_html__('Porfolio','riwa'),
            'singular_label' => esc_html__('Portfolio','riwa'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            //'rewrite' => true,	
			'has_archive' => true,
			'menu_icon' => 'dashicons-welcome-widgets-menus',
            'supports' => array('title','editor','thumbnail'),
        );
        register_post_type('_portfolio',$args);
		
		register_taxonomy("_portfolio_category", array("_portfolio"), 
			array(
				"hierarchical" => true, 
				"label" => esc_html__('Categories','riwa'), 
				"singular_label" => esc_html__('Categories','riwa'), 
				"rewrite" => true
			));
	    
	    flush_rewrite_rules();
    }
}

/* Add Team  */
if ( ! function_exists( '_team' ) ) {
    add_action('init', '_team');
    function _team() {
        $args = array(
            'label' => esc_html__('Team','riwa'),
            'singular_label' => esc_html__('Team','riwa'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,	
			'has_archive' => true,
			'menu_icon' => 'dashicons-businessman',
            'supports' => array('title','editor','thumbnail'),
        );
        register_post_type('_team',$args);
    }
}

/* Add Team  */
if ( ! function_exists( '_testimonials' ) ) {
    add_action('init', '_testimonials');
    function _testimonials() {
        $args = array(
            'label' => esc_html__('Testimonials','riwa'),
            'singular_label' => esc_html__('Testimonial','riwa'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,	
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups',
            'supports' => array('title','editor','thumbnail'),
        );
        register_post_type('_testimonials',$args);
    }
}