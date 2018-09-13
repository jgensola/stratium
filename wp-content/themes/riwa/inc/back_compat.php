<?php
/**
 * Themes Industry back compat functionality
 *
 * Prevents Themes Industry from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 */
 
/**
 * Prevent switching to Themes Industry on old versions of WordPress.
 */
function riwa_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'riwa_upgrade_notice' );
}
add_action( 'after_switch_theme', 'riwa_switch_theme' );

/** 
 * Adds a message for unsuccessful theme switch.
 * Prints an update nag after an unsuccessful attempt to switch to
 * Themes Industry on WordPress versions prior to 4.4.
 */
function riwa_upgrade_notice() {
	$message = sprintf( esc_html__( 'Themes Industry requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'riwa' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 */
function riwa_customize() {
	wp_die( sprintf( esc_html__( 'Themes Industry requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'riwa' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'riwa_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 */
function riwa_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Themes Industry requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'riwa' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'riwa_preview' );
