<?php

add_action('init', 'riwa_extend_vc');

function riwa_extend_vc() {

	/* EXTEND VC */
	if( class_exists( 'WPBakeryShortCode' ) ) {

		//vc_disable_frontend();

		require 'vc-shortcodes/vc-icon-section.php';
		require 'vc-shortcodes/vc-progress.php';
		require 'vc-shortcodes/vc-quote.php';
		require 'vc-shortcodes/vc-tabbed.php';
		require 'vc-shortcodes/vc-counter.php';
		require 'vc-shortcodes/vc-team.php';
		require 'vc-shortcodes/vc-blog.php';
		require 'vc-shortcodes/vc-custom-heading.php';
		require 'vc-shortcodes/vc-portfolio.php';
		require 'vc-shortcodes/vc-contact-info.php';
        require 'vc-shortcodes/vc-pricing.php';
        require 'vc-shortcodes/vc-testimonials.php';

		/*** Removing shortcodes ***/
		if (function_exists('vc_remove_element')) {
		
		}

	} // End Class Check
} // End Function