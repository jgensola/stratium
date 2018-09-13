<?php
if ( ! function_exists( 'riwa_fonts_url' ) ) :
// Register Google fonts for Themes Industry.
function riwa_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Roboto Condensed font: on or off', 'riwa' ) ) {
		$fonts[] = 'Roboto Condensed:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'riwa' ) ) {
		$fonts[] = 'Open Sans:400,600,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;